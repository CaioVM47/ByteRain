<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Teste ByteRain</title>
</head>
<body>
    <nav>
        <ul class="menu">
          <li><a href="index.php">Cadastrar</a></li>
          <li><a href="edit.php">Editar</a></li>
          <li><a href="delete.php">Deletar</a></li>
        </ul>
      </nav>
      <fieldset>
        <legend>Formulário de Contato</legend>
        <form name="frmContato" method="post" action="editquery.php">
        <p>
        <label for="ID">ID</label>
        <input type="number" name="nId" id="nId" placeholder="Digite o ID" required>
        </p>
        <p>
        <label for="Nome">Nome</label>
        <input type="text" name="txtNome" id="txtNome" placeholder="Digite o Nome" required>
        </p>
        <p>
        <label for="Email">Email</label>
        <input type="text" name="txtEmail" id="txtEmail" placeholder="Digite o Email" required>
        </p>
        <p>
        <label for="Telefone">Telefone</label>
        <input type="text" name="txtTel" id="txtTel" placeholder="0000-0000" required>
        </p>
        <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
        <p>
        <input type="submit" name="Editar" id="Submit" value="Editar">
        </p>
        </form>
        </fieldset>
        <div class="container">
        <?php
include_once("conexao.php");   
$result_contatosel = mysqli_query($conn,"SELECT * FROM contacts");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>
</tr>";

if ($result_contatosel->num_rows > 0) {
  while($row = $result_contatosel->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['tel'] . "</td>";  
echo "</tr>";
} 
}else {
  echo "0 results";
}
echo "</table>";

mysqli_close($conn);
?>
        </div>
</body>
</html>