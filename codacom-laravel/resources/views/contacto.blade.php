@extends('layouts.app')

@section('titulo', 'Contacto - CodaCom')

@section('contenido')

<section id="formulario-contacto">

    <h2>Hablemos</h2>

    @if (session('exito'))
        <p class="exito" style="text-align:center; margin-bottom: 20px;">{{ session('exito') }}</p>
    @endif

    <form id="form-contacto" novalidate method="POST" action="{{ route('contacto.enviar') }}">
        @csrf

        <div class="campo">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="campo">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="campo">
            <label for="negocio">¿Qué vendes?</label>

            <select id="negocio" name="negocio">

                <option value="">Selecciona una opción</option>
                <option {{ old('negocio') == 'Comida' ? 'selected' : '' }}>Comida</option>
                <option {{ old('negocio') == 'Ropa' ? 'selected' : '' }}>Ropa</option>
                <option {{ old('negocio') == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                <option {{ old('negocio') == 'Servicios' ? 'selected' : '' }}>Servicios</option>
                <option {{ old('negocio') == 'Otro' ? 'selected' : '' }}>Otro</option>

            </select>
        </div>

        <div class="campo">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" required>{{ old('mensaje') }}</textarea>
            @error('mensaje')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="boton">Enviar mensaje</button>

        <p id="error-formulario"></p>

    </form>

</section>

@endsection