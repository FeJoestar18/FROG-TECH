<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "frog";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

/*echo "Conexão bem-sucedida!";
$mysqli->close();*/
?>
