<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "frogtech"; 

$conn = mysqli_connect($server, $user, $pass, $database); // Renomeie para $conn

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

function mensagem($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>$texto</div>";
}
?>
