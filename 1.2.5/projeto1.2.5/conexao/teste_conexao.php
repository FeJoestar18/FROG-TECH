<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "frogtech";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

/*echo "Conexão bem-sucedida!";
$mysqli->close();*/
?>
