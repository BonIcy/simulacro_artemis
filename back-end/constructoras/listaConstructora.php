<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener las constructoras de la base de datos
$sql = "SELECT * FROM constructoras";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Imprimir los datos de las constructoras
    while ($row = $result->fetch_assoc()) {
        echo "ID Constructora: " . $row["id_constructora"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Dirección: " . $row["direccion"] . "<br>";
        echo "<br> <br>";
    }
} else {
    echo "No se encontraron constructoras en la base de datos.";
}

$conn->close();
?>
