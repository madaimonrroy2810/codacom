<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('titulo', 'CodaCom - Vende sin tienda física')</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>

<header>

    <div class="logo">Coda<span>Com</span></div>

    <nav class="nav">
        <ul class="nav-menu">
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('inicio') }}#problema">Nosotros</a></li>
            <li><a href="{{ route('inicio') }}#caracteristicas">Características</a></li>
            <li><a href="{{ route('inicio') }}#como-funciona">Cómo funciona</a></li>
            <li><a href="{{ route('inicio') }}#testimonios">Testimonios</a></li>
            <li><a href="{{ route('contacto') }}">Contacto</a></li>
            <li><a href="{{ route('registro') }}">Quiero vender</a></li>
        </ul>
    </nav>

    <button id="btn-tema" class="boton-tema">
        <i id="icono-tema" class="fa-solid fa-moon"></i>
    </button>

</header>

<main>
@yield('contenido')
</main>

<footer>
<p>&copy; 2026 CodaCom</p>
</footer>

<script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>