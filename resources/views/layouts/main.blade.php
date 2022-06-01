<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
  <!-- Estilos -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{URL::asset('./css/styles.css')}}" rel="stylesheet" type="text/css">
  <!-- Scripts (jQuery não pode ser o slim que vem do Boostrap) -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
  <!-- Progress Bar -->
  <script src="js/progressbar.min.js"></script>
  <!-- Parallax -->
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
</head>
<body>
  <header>
    <div class="container" id="nav-container">
      <!-- add essa class -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <a class="navbar-brand" href="/">
          <img id="logo" src="{{URL::asset('img/logo.png')}}" alt="Darly Alimentos Ltda."> Darly Alimentos Ltda
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/" class="nav-link">Início</a>
            </li>
            <li class="nav-item">
              <a href="/ponto" class="nav-link">Ponto</a>
            </li>
            <li class="nav-item">
              <a href="/etiqueta" class="nav-link">Etiqueta</a>
            </li>
            @auth
            <li class="nav-item">
              <a href="/estoque" class="nav-link">Estoque</a>
            </li>
            <li class="nav-item">
              <a href="/checkin" class="nav-link">Checkin</a>
            </li>            
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">Funcionário</a>
            </li>
            <li class="nav-item">
              <form action="/logout" method="POST">
                @csrf
                <a href="/logout" 
                  class="nav-link" 
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                  Sair
                </a>
              </form>
            </li>
            <li class="nav-item">
              <a href="/config" class="nav-link"><ion-icon id="config" name="settings-outline"></ion-icon></a>
            </li>  
            @endauth
            @guest
            <li class="nav-item">
              <a href="/login" class="nav-link">Entrar</a>
            </li>
            <li class="nav-item">
              <a href="/register" class="nav-link">Cadastrar</a>
            </li>
            @endguest
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <main>
    <div id="divMain" class="container-fluid">
      <div class="row">
        @if(session('msg'))
        <div id="mensagem" class="container-fluid">
          <p class="msg">{{ session('msg') }}</p>
        </div>
        @endif
        <div class="container-fluid"></div>
        @yield('content')
      </div>
    </div>
  </main>
  <!-- Rodapé -->
  <footer>
    <div id="footer" class="col-md-12">
      <p>Darly Alimentos Ltda &copy;2022</p>
    </div>
  </footer>
  <!-- Scripts do projeto -->
  <script src="js/scripts.js"></script>
</body>
</html>