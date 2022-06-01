@extends('layouts.main')

@section('title', 'Folha de Ponto')

@section('content')

<div id="ponto-img" class="col-md-6">
  <img class="img-fluid" src="https://gizmodo.uol.com.br/wp-content/blogs.dir/8/files/2018/01/relogios-ap-e1516725530455.jpg">
</div>
<div id="ponto-main" class="col-md-6">
  <h3 class="tituloPonto">Registre ou veja o seu ponto agora</h3>
  <p>Passe o seu crachá em frente ao scanner.</p>
  <p>Após a leitura o leitor de código de barras emitirá um beep sonoro e você será direcionado </p>
  <p>para a sua página pessoal onde verá todo o histórico das sua batidas no mês corrente.</p>
  <p>QUANDO VOCÊ PODE REGISTRAR SEU PONTO? VEJA ABAIXO:</p>
  <ul id="listaPonto">
    <li><i class="fas fa-check"></i> Após colocar a farda e tomar café</li>
    <li><i class="fas fa-check"></i> Antes de ir almoçar</li>
    <li><i class="fas fa-check"></i> Após retornar do intervalo do almoço</li>
    <li><i class="fas fa-check"></i> Antes de se trocar para o fim de expediente</li>
    <li><i class="fas fa-check"></i> Sempre que SAIR a rua durante o expediente</li>
    <li><i class="fas fa-check"></i> Sempre que VOLTAR da rua e retornar as atividades</li>
    <form action="/ponto/ver" id="form" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="inputTransparente">
        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario">
      </div>
    </form>
  </ul>
</div>
<div class="col-md-7 offset-md-5" id="clockPonto">
  <div id="clock"></div>
</div>
  <!-- Scripts do projeto -->
<script src="js/ponto/clock.js"></script>
@endsection