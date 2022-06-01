<!DOCTYPE html>
<html lang="pt-BR">{{-- {{ str_replace('_', '-', app()->getLocale()) }}"> --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand navbar-light">
          <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
              <img src="/img/logo.png" alt="HDC Events">
            </a>
            <div id="clock" class="col-md-6 offset-md-3"></div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="/" class="nav-link">Início</a>
              </li>
              <li class="nav-item">
                <a href="/ponto" class="nav-link">Ponto</a>
              </li>
              <li class="nav-item">
                <a href="/events/create" class="nav-link">Etiqueta</a>
              </li>
              @auth
              <li class="nav-item">
                <a href="/events/create" class="nav-link">Estoque</a>
              </li>
              <li class="nav-item">
                <a href="/chekin" class="nav-link">Checkin</a>
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
      </header>
      <main>
        <div class="container-fluid">
          <div class="row">
            @if(session('msg'))
              <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
          </div>
        </div>
      </main>
      <footer>
        <p>Darly Alimentos Ltda &copy;2022</p>
      </footer>
      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>