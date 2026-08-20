@extends('layouts.app')

@section('titulo', 'CodaCom - Vende sin tienda física')

@section('contenido')

<section id="hero">
    <h1>Vende en línea de forma simple, segura y centralizada</h1>
    <p>
        CodaCom es una plataforma de comercio inteligente que permite a
        emprendedores y vendedores sin tienda física crear su propia tienda
        en línea, publicar productos, gestionar pedidos y vender todo desde
        un solo sistema verificado y seguro.
    </p>
    <a href="{{ route('contacto') }}" class="boton">Quiero mi tienda</a>
</section>

<section id="problema">
    <h2>El problema que resolvemos</h2>
    <p class="subtitulo">Sobre CodaCom</p>
    <p>
        Muchos emprendedores venden por WhatsApp o redes sociales, pero
        pierden pedidos, mezclan conversaciones de clientes con las
        personales, y no tienen un lugar único donde centralizar ventas,
        atención al cliente y entrega de productos.
    </p>
</section>

<section id="caracteristicas">
    <h2>Características principales</h2>
    <p class="subtitulo">Todo lo que necesitas para vender sin complicarte</p>

    <div class="grid-caracteristicas">

        <article>
            <div class="icono">🛍️</div>
            <h3>Tienda en línea propia</h3>
            <p>Cada vendedor arma su catálogo de productos sin conocimientos técnicos.</p>
        </article>

        <article>
            <div class="icono">💬</div>
            <h3>Integración con WhatsApp</h3>
            <p>Los pedidos y la atención al cliente se centralizan en un solo canal.</p>
        </article>

        <article>
            <div class="icono">🤖</div>
            <h3>Inteligencia artificial</h3>
            <p>Respuestas automáticas para atender clientes incluso fuera de horario.</p>
        </article>

        <article>
            <div class="icono">📍</div>
            <h3>Puntos de entrega</h3>
            <p>Entrega de pedidos sin necesidad de un local físico.</p>
        </article>

    </div>
</section>

<section id="como-funciona">
    <h2>¿Cómo funciona?</h2>

    <ol class="pasos">
        <li>El vendedor se registra.</li>
        <li>Crea su tienda.</li>
        <li>Publica productos.</li>
        <li>Recibe pedidos.</li>
        <li>Realiza la entrega.</li>
    </ol>
</section>

<section id="testimonios">

    <h2>Testimonios</h2>

    <div class="grid-testimonios">

        <article>
            <p>"Antes perdía pedidos. Ahora todo está organizado."</p>
            <h3>María</h3>
        </article>

        <article>
            <p>"Ahora vendo mucho más."</p>
            <h3>Jorge</h3>
        </article>

    </div>

</section>

@endsection