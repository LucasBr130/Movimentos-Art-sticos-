<?php

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Verifica se foi passado o ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Comando SQL pra excluir
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Mostra mensagem de sucesso
        echo "
        <body style='background-color: black; color: yellow; font-family: Arial; text-align: center;'>
            <h2>Usuário excluído com sucesso!</h2>
            <a href='listar_usuarios.php' style='color: white;'>Voltar para a lista</a>
        </body>
        ";
    } else {
        // Mostra erro se der problema
        echo "
        <body style='background-color: black; color: red; font-family: Arial; text-align: center;'>
            <h2>Erro ao excluir usuário.</h2>
            <a href='listar_usuarios.php' style='color: white;'>Voltar</a>
        </body>
        ";
    }
}   else {
    // Mostra erro se nenhum ID foi passado
    echo "
    <body style='background-color: black; color: orange; font-family: Arial; text-align: center;'>
        <h2>Nenhum ID de usuário informado!</h2>
        <a href='listar_usuarios.php' style='color: white;'>Voltar</a>
    </body>
    ";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
