<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    // Validar
    if (empty($usuario) || empty($password)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Conectar a la base de datos
        $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");

        // verificar si hubo un error en la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }
        // consultar el empleado en la base de datos
        $sql = "SELECT * FROM empleados WHERE usuario='$usuario' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // guardar datos en la sesion
            $row = $result->fetch_assoc();
            $_SESSION["id_empleado"] = $row["id_empleado"];
            $_SESSION["nombre_empleado"] = $row["nombre"];

            // redireccionar a inciio
            header("Location: ../page/index.php");
            exit();
        } else {
            echo "No tienes permisos. Por favor, intente nuevamente.";
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesion</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
