<?php
  require_once("db.php");
    
    $servername = "localhost";
    $username = "yisuss";
    $password = "campus2023";
    $database = "alquilarartemis";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
