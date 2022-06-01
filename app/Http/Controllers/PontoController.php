<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ponto;
use PhpParser\Node\Stmt\TryCatch;

class PontoController extends Controller
{

    public function ativo($idFuncionario)
    {
        $funcionario  = User::findOrFail($idFuncionario);
        $ativo = $funcionario->ativo;
        if ($ativo == 1) {
            //echo "<br>if" . $funcionario->ativo;
            return true;
        } else {
            //echo "else" . $funcionario->ativo;
            return false;
        }
    }

    public function saudacao()
    {
        $saudacao = '';
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('H');
        if ($hora >= 6 && $hora <= 12) {
            $saudacao = 'Bom dia, ';
        } else if ($hora > 12 && $hora <= 18) {
            $saudacao = 'Boa tarde, ';
        } else {
            $saudacao = 'Boa noite, ';
        }
        return $saudacao;
    }

    public function index()
    {
        return view('ponto.ponto');
    }

    public function pontoVer(Request $request)
    {
        $idFuncionario = $request->idFuncionario;

        //verifico se o id do funcionario existe ou se está inativo
        try {
            $funcionario    = User::findOrFail($idFuncionario)->get()->toArray();
        } catch (\Exception $e) {
            return redirect('/ponto')->with('msg', 'funcionario não localizado ou inativo...');
        }

        if (!$this->ativo($idFuncionario)) {
            return redirect('/ponto')->with('msg', 'Você não pode bater ponto. Procure o RH para regularizar a sua situação.');
        }


        $funcionario = User::findOrFail($idFuncionario);

        $funcionarioBatidas = Ponto::select('batidas', 'justificativa')
            ->where([
                ['user_id', $idFuncionario],
                ['batidas', '>=', date('Y-m-1')]
            ])
            ->orderBy('batidas', 'desc')
            ->get()
            ->toArray();

        return view(
            'ponto.ver',
            [
                'funcionario'        => $funcionario,
                'funcionarioBatidas' => $funcionarioBatidas,
                'saudacao'           => $this->saudacao()
            ]
        );
    }

    public function pontoRegistrar(Request $request)
    {

        //verifico se o id do funcionario existe ou se está inativo
        try {
            $funcionario    = User::findOrFail($request->idFuncionario)->first()->toArray();
        } catch (\Exception $e) {
            return redirect('/ponto')->with('msg', 'funcionario não localizado ou inativo...');
        }
        //verifico se o id do funcionario registrou ponto a menos de 5 minutos
        $funcionarioBatidas = Ponto::select('batidas')
            ->where([['user_id', $request->idFuncionario]])
            ->orderBy('batidas', 'desc')
            ->take(1)
            ->get()
            ->toArray();
        if (@$funcionarioBatidas[0]['batidas']) {
            date_default_timezone_set("America/Bahia");
            $data_inicial = $funcionarioBatidas[0]['batidas'];
            $data_final = date('Y-m-d H:i:s');

            // Calcula a diferença em minutos entre as datas
            $diferenca = strtotime($data_final) - strtotime($data_inicial);
            if (floor($diferenca / (60)) < 5) {
                return redirect('/ponto')->with('msg', 'Seu ponto foi registrado a menos de 5 minutos');
            }
        }

        $registrar = new Ponto;
        $registrar->user_id = $request->idFuncionario;
        $registrar->save();

        $funcionarioBatidas = Ponto::select('batidas', 'justificativa')
            ->where([
                ['user_id', $request->idFuncionario],
                ['batidas', '>=', date('Y-m-1')]
            ])
            ->orderBy('batidas', 'desc')
            ->get()
            ->toArray();

        return view(
            'ponto.registrar',
            [
                'funcionario'        => $funcionario,
                'funcionarioBatidas' => $funcionarioBatidas,
                'saudacao'           => $this->saudacao()
            ]
        )
            ->with('msg', 'Ponto registrado com sucesso!!!');
    }

    public function foto()
    {
        return view('funcionario.foto');
    }
}
