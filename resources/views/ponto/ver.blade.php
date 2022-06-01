@extends('layouts.main')

@section('title', 'Folha de Ponto')

@section('content')

<div class="col-md-3 offset-md-1">
  <img class="img-fluid" src="{{URL::asset('img/verPonto.jpeg')}}">
  <div class="col-md-10 offset-md-2" id="clockVerPonto">
    <div id="clock">wwwwwww</div>
  </div>
</div>
<div class="col-md-6">
  {{-- <img class="img-fluid" src="https://www.promath.com.br/wp-content/uploads/2010/03/mural-de-recados.gif"> --}}
  <div class="col-md-12" id="verPonto">
    @if (@$funcionario)
    <br>
      {{$saudacao.$funcionario['name']}}
    @endif
    @php
      setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');
      echo "!<br>Hoje é ". strftime("%A, %d de %B de %Y", strtotime('NOW'))."<br>";
    @endphp
      
    <p>Veja suas batidas de {!! strftime('%B', strtotime("NOW")) !!}</p>
    @if (@$funcionarioBatidas)
      @php
        $data=null;
        $a=1;
      @endphp
      @foreach ($funcionarioBatidas as $funcionarioBatida )
        @php
        if (@$data != date("d/m/Y", strtotime($funcionarioBatida['batidas']))){
          if(@!$data){
            echo'';
          }else {
            $a++;
            echo '<br><br>';
          }
          $data=date('d/m/Y', strtotime($funcionarioBatida['batidas']));
          echo $data.' ( '.
          strftime("%A", strtotime($funcionarioBatida['batidas'])).
          ' )'.
          '<br><i class="fas fa-check"></i>  ';
          echo date('H:i:s', strtotime($funcionarioBatida['batidas']));
        }else{
          echo '<br><i class="fas fa-check"></i>  ';
          echo date('H:i:s', strtotime($funcionarioBatida['batidas']));
        } 
        @endphp
      @endforeach
    @endif
  </div>
  <form onSubmit="se0Iguala1();" id="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="inputTransparente">
      <input type="number" name="idFuncionario"  id="idFuncionario" class="form-control">
      <input type="hidden" name="idFuncionario1" id="idFuncionario1" value="{{$funcionario['id']}}">
    </div>
  </form>
</div>
<!-- Scripts do projeto -->
<script src="{{URL::asset('./js/ponto/clock.js')}}"></script>
@endsection