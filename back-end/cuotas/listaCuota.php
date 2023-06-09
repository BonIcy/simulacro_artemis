<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// Obtener las cotizaciones de la base de datos
$sql = "SELECT * FROM cotizaciones";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<h2>Lista de Cotizaciones</h2>";
    echo "<table>";
    echo "<tr><th>ID Cotización</th><th>ID Persona</th><th>ID Constructora</th><th>Fecha</th><th>Total</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $idCotizacion = $row["id_cotizacion"];
        $idEmpleado = $row["id_empleado"];
        $idConstructora = $row["id_constructora"];
        $fecha = $row["fecha"];
        $total = $row["total"];

        echo "<tr><td>$idCotizacion</td><td>$idEmpleado</td><td>$idConstructora</td><td>$fecha</td><td>$total</td></tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron cotizaciones.";
}
$conn->close();
?>
