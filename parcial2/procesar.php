<!DOCTYPE html>
<html lang="es">
<body>

<h1><?php echo "Cita reservada en Óptica Mirasol"; ?></h1>

<p><strong>Nombre:</strong> <?php echo htmlspecialchars($_POST["nombre"]); ?></p>
<p><strong>Correo:</strong> <?php echo htmlspecialchars($_POST["correo"]); ?></p>
<p><strong>Consulta:</strong> <?php echo htmlspecialchars($_POST["consulta"]); ?></p>

<h2>Servicios disponibles</h2>

<ul>
<?php
$servicios = [
    "Examen de vista - Bs 50",
    "Armazón clásico - Bs 180",
    "Lentes de sol - Bs 120"
];

foreach ($servicios as $servicio) {
    echo "<li>" . $servicio . "</li>";
}
?>
</ul>

<p><?php echo "Te atiende Madai Alejandra Monrroy Vega"; ?></p>

</body>
</html>