<?php

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Verifica se foi passado o ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Busca os dados atuais do usuário
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Armazena os dados do usuário em um array associativo
        $usuario = $result->fetch_assoc();
    } else {

        // Mostra botão de voltar para a lista se o ID de usuário não existir
        echo "<body style='background-color: black; color: orange; font-family: Arial; text-align: center;'>
                <h2>Usuário não encontrado!</h2>
                <a href='listar_usuarios.php' style='color: white;'>Voltar</a>
              </body>";
        exit;
    }
} else {
  
    // Mostra mensagem de erro se nenhum ID for passado
    echo "<body style='background-color: black; color: orange; font-family: Arial; text-align: center;'>
            <h2>Nenhum ID informado!</h2>
            <a href='listar_usuarios.php' style='color: white;'>Voltar</a>
          </body>";
    exit;
}

// Atualiza quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novo_nome = $_POST['nome'];
    $novo_email = $_POST['email'];

    // Atualiza os dados no banco
    $sql_update = "UPDATE usuarios SET nome='$novo_nome', email='$novo_email' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {

        // Mostra mensagem de sucesso
        echo "<body style='background-color: black; color: yellow; font-family: Arial; text-align: center;'>
                <h2>Usuário atualizado com sucesso!</h2>
                <a href='listar_usuarios.php' style='color: white;'>Voltar à lista</a>
              </body>";
        exit;
    } else {

        // Mostra mensagem de erro se der problema
        echo "<body style='background-color: black; color: red; font-family: Arial; text-align: center;'>
                <h2>Erro ao atualizar usuário.</h2>
                <a href='listar_usuarios.php' style='color: white;'>Voltar</a>
              </body>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuário</title>
</head>
<body style="background-color: black; color: white; font-family: Arial; text-align: center;">

  <h2>Editar Usuário</h2>

  <form method="POST">
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required><br><br>

    <label for="email">E-mail:</label><br>
    <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br><br>

    <button type="submit">Salvar Alterações</button>
  </form>

  <br><a href="listar_usuarios.php" style="color: white;">Cancelar</a>

</body>
</html>

<?php

// Fecha a conexão com o banco de dados
 $conn->close(); 
 ?>