@extends('layouts.base')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/herramientas/nuevo" method="POST">
        @csrf

        <label for="nombre">Nombre de la herramienta</label>
        <input type="text" id="nombre" name="nombre">

        <label for="precio">Precio en Bs</label>
        <input type="number" id="precio" name="precio">

        <button type="submit">Registrar herramienta</button>
    </form>
@endsection