<?php

// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Pega todos os usuários cadastrados
$sql = "SELECT id, nome, email FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuários Cadastrados</title>
  <style>
    body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
      text-align: center;
    }
    table {
      margin: auto;
      border-collapse: collapse;
      background-color: #1c1c1c;
      color: yellow;
      width: 60%;
    }
    th, td {
      border: 1px solid yellow;
      padding: 8px;
    }
    th {
      background-color: #333;
      color: white;
    }
    a {
      color: yellow;
      text-decoration: none;
      margin: 0 5px;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h2>Usuários Cadastrados</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Ações</th>
    </tr>

    <?php

    // Verifica se a consulta retornou resultados
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        // Mostra cada usuário em uma linha da tabela
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nome"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>
                <a href='editar_usuario.php?id=".$row["id"]."' style='color: cyan;'>Editar</a> |
                <a href='excluir_usuario.php?id=".$row["id"]."' style='color: red;' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>
              </td>";
        echo "</tr>";
      }
    } else {

      // Mostra uma mensagem se não tiver nenhum usuário cadastrado
      echo "<tr><td colspan='4'>Nenhum usuário cadastrado.</td></tr>";
    }
    ?>

  </table>

  <!-- Link para voltar pro cadastro -->
  <br><a href='index.html' style='color: white;'>Voltar</a>

</body>
</html>

<?php

// Fecha a conexão com o banco de dados
$conn->close();
?>
