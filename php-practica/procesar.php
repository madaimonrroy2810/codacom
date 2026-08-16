<?php

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$negocio = $_POST["negocio"];
$mensaje = $_POST["mensaje"];
echo "<h2> Mensaje recibido </h1>";
echo "<p>Nombre:  $nombre </p>";
echo "<p>Correo: $email </p>";
echo "<p>Vende: $negocio </p>";
echo "<p>Mensaje: $mensaje </p>";

?>