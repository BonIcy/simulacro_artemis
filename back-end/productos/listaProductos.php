<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lista de Productos</h2>
    <?php
    // Conectar a la base de datos
    $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los productos de la base de datos
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID Producto</th><th>Nombre</th><th>Precio por Día</th></tr>";

        while ($row = $result->fetch_assoc()) {
            $idProducto = $row["id_producto"];
            $nombre = $row["nombre"];
            $precioDia = $row["precio_dia"];

            echo "<tr>";
            echo "<td>$idProducto</td>";
            echo "<td>$nombre</td>";
            echo "<td>$precioDia</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron productos.";
    }

    $conn->close();
    ?>
</body>
</html>
