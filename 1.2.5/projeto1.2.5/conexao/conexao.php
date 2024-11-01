<?php
// Parâmetros de conexão
$server = "localhost";
$user = "root";
$pass = "";
$database = "frog";

// Cria a conexão (orientado a objetos)
$conn = new mysqli($server, $user, $pass, $database);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>