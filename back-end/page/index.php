<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido, selecciona qué deseas hacer</h1>

        <div>
            <h2>Producto:</h2>
            <a href="../productos/nuevoProducto.php" class="button">Nuevo producto</a>
            <a href="../productos/listaProductos.php" class="button">Lista productos</a>
        </div>

        <div>
            <h2>Persona:</h2>
            <a href="../pers/lista.php" class="button">Lista</a>
        </div>

        <div>
            <h2>Constructora:</h2>
            <a href="../constructoras/nuevaConstructora.php" class="button">Nueva Constructora</a>
            <a href="../constructoras/listaConstructora.php" class="button">Lista Constructoras</a>
        </div>

        <div>
            <h2>Cuotas (Requiere constructora):</h2>
            <a href="../cuotas/nuevaCuota.php" class="button">Nueva Cuota</a>
            <a href="../cuotas/listaCuota.php" class="button">Lista Cuotas</a>
        </div>
    </div>

</body>
</html>
