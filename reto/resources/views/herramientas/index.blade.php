@extends('layouts.base')

@section('content')
    <p>El Tornillo es la ferretería de barrio donde encontrás tornillos, pinturas y herramientas para cualquier arreglo de la casa.</p>

    <p>Hay {{ count($herramientas) }} herramientas en el inventario.</p>

    <ul>
        @foreach ($herramientas as $herramienta)
            <li>{{ $herramienta->nombre }} - Bs {{ $herramienta->precio }}</li>
        @endforeach
    </ul>

    <p>Inventario atendido por Madai Alejandra Monrroy Vega</p>

    <a href="/herramientas/nuevo">Registrar nueva herramienta</a>
@endsection