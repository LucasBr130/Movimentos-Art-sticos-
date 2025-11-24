<?php

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os valores enviados pelo formulário e armazena em variáveis
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verifica se o e-mail já existe
    $verifica = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($verifica);

    // Mostra mensagem se o e-mail já estiver cadastrado
    if ($resultado->num_rows > 0) {
        echo "<span style='color: red;'>Este e-mail já está cadastrado!</span>";
    } else {
        
        // Caso o e-mail não exista, insere os dados no banco
        $sql = "INSERT INTO usuarios (nome, email, senha)
                VALUES ('$nome', '$email', '$senha')";

        // Mostra mensagem de sucesso ou erro
        if ($conn->query($sql) === TRUE) {
            echo "<span style='color: green;'>Cadastro realizado com sucesso!</span>";
        } else {
            echo "<span style='color: red;'>Erro ao cadastrar usuário.</span>";
        }
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
