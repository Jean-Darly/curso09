@extends('layouts.main')

@section('title', 'Chekin')

@section('content')
<div class="col-md-12">
  <p>Checklist - {{$user->name}}</p>
</div>
<div class="col-md-6">
  <a href="/checkin/producao">
  <img class="img-fluid" src="{{URL::asset('./img/producaoRestaurante.jpg')}}">
</a>
<p>checklist área produção</p>
</div>
<div class="col-md-6">
    <a href="/checkin/salao">
    <img class="img-fluid" src="{{URL::asset('./img/salaoRestaurante.png')}}">
  </a>
  <p>checklist área atendimento</p>
</div>
@endsection