@extends('layouts.main')

@section('title', 'Home')

@section('content')
{{-- @php
date_default_timezone_set("America/Bahia");
$echo =date('Y-m-d H:i:s', strtotime('+5 minute'));
echo $echo-date('2022-05-28 21:37:00');
@endphp --}}
<div id="divIndex" class="container-fluid">
      <!-- slider -->
      <div id="mainSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
          <li data-target="#mainSlider" data-slide-to="1"></li>
          <li data-target="#mainSlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="https://www.metadados.com.br/storage/blog-posts/March2022/11e1c0C50OWar0YY1bIP-banner.webp" class="d-block w-100" alt="Engenharia de software">
              <div class="carousel-caption d-md-block">
                  <h2>Quer regitrar o seu horário?</h5>
                    <p>Clique no botão abaixo para entrar no relógio.</p>
                    <a href="/ponto" class="main-btn">Relógio de Ponto</a>
                </div>
            </div>
            <div class="carousel-item">
              <img src="https://viqua.com.br/sites/default/files/2018-08/iStock-663106086_0.jpg" class="d-block w-100" alt="Projetos de e-commerce">
            <div class="carousel-caption d-md-block">
              <h2>Quer gerenciar o estoque?</h5>
              <p>Clique no botão abaixo para entrar no estoque.</p>
              <a href="/estoque" class="main-btn">Gerenciamento Estoque</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://static.consolidesuamarca.com.br/assets/base/2db/f21/633/checklist-blogpost.jpg" class="d-block w-100" alt="Manutenção em software">
            <div class="carousel-caption d-md-block">
              <h2>Quer fazer o checklist agora?</h5>
              <p>Clique no botão abaixo para começar o cheklist de hoje.</p>
              <a href="/checkin" class="main-btn">Checklist</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#mainSlider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mainSlider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>
@endsection