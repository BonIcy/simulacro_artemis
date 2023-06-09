<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idEmpleado = $_POST["idEmpleado"];
    $idConstructora = $_POST["idConstructora"];
    $fecha = $_POST["fecha"];
    $productos = $_POST["productos"]; // Un array con los IDs de los productos seleccionados

    // Conectar a la base de datos
    $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar la cotización en la base de datos
    $sql = "INSERT INTO cotizaciones (id_empleado, id_constructora, fecha, total) VALUES ('$idEmpleado', '$idConstructora', '$fecha', 0)";
    if ($conn->query($sql) === TRUE) {
        // Obtener el ID de la cotización recién insertada
        $idCotizacion = $conn->insert_id;

        // Calcular el total de la cotización
        $total = 0;
        foreach ($productos as $idProducto) {
            // Obtener el precio del producto de la base de datos
            $sql = "SELECT precio_dia FROM productos WHERE id_producto = '$idProducto'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $precioDia = $row["precio_dia"];

                // Calcular el total sumando el precio del producto por la duración del alquiler
                $total += $precioDia * $duracion;
            }
        }

        // Actualizar el total de la cotización en la base de datos
        $sql = "UPDATE cotizaciones SET total = '$total' WHERE id_cotizacion = '$idCotizacion'";
        if ($conn->query($sql) === TRUE) {
            echo "Cotización generada exitosamente. ID de cotización: $idCotizacion";
        } else {
            echo "Error al actualizar el total de la cotización: " . $conn->error;
        }
    } else {
        echo "Error al generar la cotización: " . $conn->error;
    }

    $conn->close();
}
?>
