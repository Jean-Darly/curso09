@extends('layouts.main')

@section('title', 'Config')

@section('content')

  <div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Olá {{$user->name}}! Você está na configuração administrativa</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
          <ion-icon name="eye-outline"></ion-icon>
        </div>
        <h2>Checkin</h2>
        <p>Criação, edição, configuração do checkin. Aqui você pode configurar também a posição de cada item, excluir, pausar, cancelar e muito mais...</p>
        <a href="/config/checkin" class="icon-link d-inline-flex align-items-center">
          Clique aqui para entrar
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
          <ion-icon name="megaphone-outline"></ion-icon>
        </div>
        <h2>Recados</h2>
        <p>Mande mensagem, recado e avisos para um colaborador específico, para alguns ou para todos. Quando o colaborador bater seu ponto recebera o recado.</p>
        <a href="#" class="icon-link d-inline-flex align-items-center">
          Clique aqui para entrar
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3">
          <ion-icon name="layers-outline"></ion-icon>
        </div>
        <h2>Etiquetas</h2>
        <p>Aqui em breve você poderá configurar as etiquetas para rotular produtos com validade entre outros. Poderá configurar também a quantidade de etiqueta por folha. </p>
        <a href="#" class="icon-link d-inline-flex align-items-center">
          Clique aqui para entrar          
        </a>
      </div>
    </div>
  </div>

{{-- <div class="container-fluid" style="border: 1px solid #000">
    <div class="row" style="border: 1px solid rgb(206, 12, 12)">
        <div class="col-md-2 offset-md-3" style="border: 1px solid rgb(10, 119, 6)">1</div>
        <div class="col-md-2 offset-md-1" style="border: 1px solid rgb(12, 25, 206)">2</div>
    </div>
    <div class="row" style="border: 1px solid rgb(206, 12, 12)">
        <div class="col-md-2 offset-md-3" style="border: 1px solid rgb(10, 119, 6)">1</div>
        <div class="col-md-2 offset-md-1" style="border: 1px solid rgb(12, 25, 206)">2</div>
    </div>    
</div> --}}
@endsection