<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los empleados de la base de datos
$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Imprimir los datos de los empleados
    while ($row = $result->fetch_assoc()) {
        echo "ID Empleado: " . $row["id_empleado"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Usuario: " . $row["usuario"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron empleados en la base de datos.";
}

$conn->close();
?>
