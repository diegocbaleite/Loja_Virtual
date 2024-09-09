<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "loja_virtual";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
