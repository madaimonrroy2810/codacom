@extends('layouts.app')

@section('titulo', 'Regístrate como vendedor - CodaCom')

@section('contenido')

<section id="formulario-contacto">

    <h2>Regístrate como vendedor verificado</h2>
    <p class="subtitulo">Te pediremos 3 fotos en vivo (frente, lado izquierdo, lado derecho) para verificar tu identidad</p>

    @if (session('exito'))
        <p class="exito" style="text-align:center; margin-bottom: 20px;">{{ session('exito') }}</p>
    @endif

    <form id="form-registro" novalidate method="POST" action="{{ route('vendedor.registrar') }}">
        @csrf

        <div class="campo">
            <label for="nombre_completo">Nombre completo</label>
            <input type="text" id="nombre_completo" name="nombre_completo" value="{{ old('nombre_completo') }}" required>
            @error('nombre_completo') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="campo">
            <label for="ci">Carnet de identidad</label>
            <input type="text" id="ci" name="ci" value="{{ old('ci') }}" required>
            @error('ci') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="campo">
            <label for="telefono">WhatsApp</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
            @error('telefono') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="campo">
            <label for="nombre_negocio">Nombre de tu negocio</label>
            <input type="text" id="nombre_negocio" name="nombre_negocio" value="{{ old('nombre_negocio') }}" required>
            @error('nombre_negocio') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="campo">
            <label for="tipo_producto">¿Qué vendes?</label>
            <select id="tipo_producto" name="tipo_producto" required>
                <option value="">Selecciona una opción</option>
                <option {{ old('tipo_producto') == 'Comida' ? 'selected' : '' }}>Comida</option>
                <option {{ old('tipo_producto') == 'Ropa' ? 'selected' : '' }}>Ropa</option>
                <option {{ old('tipo_producto') == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                <option {{ old('tipo_producto') == 'Servicios' ? 'selected' : '' }}>Servicios</option>
                <option {{ old('tipo_producto') == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('tipo_producto') <small class="error">{{ $message }}</small> @enderror
        </div>
      

        <div class="campo">
            <label for="stock">Stock disponible</label>
            <input type="number" id="stock" name="stock" min="0" value="{{ old('stock') }}" required>
            @error('stock') <small class="error">{{ $message }}</small> @enderror
        </div>
        <!-- CAPTURA DE FOTOS EN VIVO -->
<div class="campo">
    <label>Verificación con cámara</label>

    <video id="video" autoplay playsinline style="width:100%; border-radius:8px; margin-bottom:10px;"></video>
    <canvas id="canvas" style="display:none;"></canvas>

    <p id="instruccion" style="font-weight:600; margin-bottom:10px;">Paso 1 de 4: muestra tu carnet frente a la cámara</p>

    <div style="display:flex; gap:10px; margin-bottom:10px;">
        <img id="preview-carnet" style="width:60px; height:60px; object-fit:cover; border-radius:6px; display:none;">
        <img id="preview-frente" style="width:60px; height:60px; object-fit:cover; border-radius:6px; display:none;">
        <img id="preview-izquierda" style="width:60px; height:60px; object-fit:cover; border-radius:6px; display:none;">
        <img id="preview-derecha" style="width:60px; height:60px; object-fit:cover; border-radius:6px; display:none;">
    </div>

    <button type="button" id="btn-capturar" class="boton">Capturar foto</button>

    <input type="hidden" name="foto_carnet" id="foto_carnet">
    <input type="hidden" name="foto_frente" id="foto_frente">
    <input type="hidden" name="foto_izquierda" id="foto_izquierda">
    <input type="hidden" name="foto_derecha" id="foto_derecha">

    @error('foto_carnet') <small class="error">{{ $message }}</small> @enderror
</div>

        <button type="submit" class="boton">Solicitar verificación</button>

        <p id="error-formulario"></p>

    </form>

</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/registro.js') }}"></script>
@endpush