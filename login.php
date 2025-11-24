<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Busca o usuário pelo e-mail
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Verifica a senha
        if ($senha === $usuario["senha"]) {
            echo "OK";
        } else {
            echo "Senha incorreta";
        }
    } else {
        echo "E-mail não encontrado";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>