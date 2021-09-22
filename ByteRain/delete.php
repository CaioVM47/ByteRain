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
        <form name="frmContato" method="post" action="deletequery.php"> 
        <p>
        <label for="Id">ID</label>
        <input type="number" name="nId" id="nId" placeholder="Digite o ID" required>
        </p>
        <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
        <p>
        <input type="submit" name="Deletar" id="Submit" value="Deletar">
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

?>
        </div>
</body>
</html>