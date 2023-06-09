<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //obetenr datos
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    // vvalidar
    if (empty($nombre) || empty($usuario) || empty($password)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Conectar a db
        $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");

        // Verificar si hubo un error en la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }
        // Insertar el empleado
        $sql = "INSERT INTO empleados (nombre, usuario, password) VALUES ('$nombre', '$usuario', '$password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../page/index.php");
        } else {
            echo "Error al registrar el empleado: " . $conn->error;
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro dee empleado</title>
</head>
<body>
    <h2>Registro de empleado</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>
