<!DOCTYPE html>
<html>
<head>
    <title>Nueva Cotización</title>
</head>
<body>
    <h2>Nueva Cotización</h2>
    <form method="post" action="guardarCotizacion.php">
        <label for="idEmpleado">Nombre Persona:</label>
        <select name="idEmpleado" id="idEmpleado" required>
            <?php
            // Conectar a la base de datos
            $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener los empleados de la base de datos
            $sql = "SELECT id_empleado, nombre FROM empleados";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $idEmpleado = $row["id_empleado"];
                    $nombreEmpleado = $row["nombre"];
                    echo "<option value='$idEmpleado'>$nombreEmpleado</option>";
                }
            }

            $conn->close();
            ?>
        </select><br><br>

        <label for="idConstructora">Nombre Constructora:</label>
        <select name="idConstructora" id="idConstructora" required>
            <?php
            // Conectar a la base de datos
            $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener las constructoras de la base de datos
            $sql = "SELECT id_constructora, nombre FROM constructoras";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $idConstructora = $row["id_constructora"];
                    $nombreConstructora = $row["nombre"];
                    echo "<option value='$idConstructora'>$nombreConstructora</option>";
                }
            }

            $conn->close();
            ?>
        </select><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required><br><br>

        <label for="productos">Productos:</label>
        <select name="productos[]" id="productos" required>
            <?php
            // Conectar a la base de datos
            $conn = new mysqli("localhost", "yisuss", "campus2023", "alquilarartemis");
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener los nombres de productos de la base de datos
            $sql = "SELECT nombre FROM productos";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nombreProducto = $row["nombre"];
                    echo "<option value='$nombreProducto'>$nombreProducto</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <input type="submit" value="Guardar Cotización">
    </form>
    <button><a href="../page/index.php">Volver</a></button>
</body>
</html>
