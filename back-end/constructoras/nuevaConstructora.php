<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idConstructora = $_POST["id_constructora"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];

    // Validar los datos del formulario
    if (empty($idConstructora) || empty($nombre)) {
        echo "Por favor, complete todos los campos obligatorios.";
    } else {
        // Conectar a la base de datos
        $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Insertar la constructora en la base de datos
        $sql = "INSERT INTO constructoras (id_constructora, nombre, direccion) VALUES ('$idConstructora', '$nombre', '$direccion')";
        if ($conn->query($sql) === TRUE) {
            echo "Constructora agregada exitosamente.";
        } else {
            echo "Error al agregar la constructora: " . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Constructora</title>
</head>
<body>
    <h2>Agregar Constructora</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="idConstructora">ID Constructora:</label>
        <input type="number" name="id_constructora" id="idConstructora" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion"><br><br>

        <input type="submit" value="Agregar Constructora"><br> <br> <br>

    </form>
    <button><a href="../page/index.php">Volver</a></button>
</body>
</html>
