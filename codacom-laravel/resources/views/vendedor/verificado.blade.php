@extends('layouts.app')

@section('titulo', $vendedor->nombre_negocio . ' - Vendedor verificado')

@section('contenido')

<section id="hero">
    <h1> Vendedor verificado por CodaCom</h1>
    <p><strong>{{ $vendedor->nombre_negocio }}</strong></p>
    <p>Atendido por: {{ $vendedor->nombre_completo }}</p>
    <p>Código: #{{ $vendedor->codigo_verificacion }}</p>
</section>

@endsection