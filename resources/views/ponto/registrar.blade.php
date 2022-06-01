@extends('layouts.main')

@section('title', 'Ponto Registrado')

@section('content')


<div id="clockRegistrarPonto" class="col-md-7 offset-md-5">
  <div id="clock">wwwwwww</div>
</div>

<div id="registrarPontoFuncionarioImg" class="col-md-2 offset-md-4">
  <img src="{{URL::asset('img/funcionario.jpeg')}}" onerror="this.src='{{URL::asset('img/avatar.jpeg')}}'" alt="">
</div>

<div id="registrarPontoFuncionarioVer" class="col-md-6">
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
      @endphp
      @foreach ($funcionarioBatidas as $funcionarioBatida )
        @php
        if (@$data != date("d/m/Y", strtotime($funcionarioBatida['batidas']))){
          if(@!$data){
            echo'';
          }else {
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
  <form action="/ponto/ver" id="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" id="idFuncionario" name="idFuncionario">
    </div>
  </form>
</div>
<!-- Scripts do projeto -->
<script src="{{URL::asset('./js/ponto/clock.js')}}"></script>
@endsection