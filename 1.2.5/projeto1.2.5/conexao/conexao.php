<?php

$host = 'localhost';
$dbname = 'frog';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}


/*// Parâmetros de conexão
$server = "localhost";
$user = "root";
$pass = "";
$database = "frog";

// Cria a conexão (orientado a objetos)
$conn = new mysqli($server, $user, $pass, $database);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}*/
?>