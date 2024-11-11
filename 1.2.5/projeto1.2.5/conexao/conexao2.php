<?php 


$server = "localhost";
$user = "root";
$pass = "";
$database = "frog";


$conn = new mysqli($server, $user, $pass, $database);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>