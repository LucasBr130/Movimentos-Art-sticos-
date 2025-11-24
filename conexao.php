<?php
// Dados da conexão com o MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "movart_db";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica se deu certo
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>