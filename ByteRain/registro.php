<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'txtNome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_EMAIL);
$tel = filter_input(INPUT_POST, 'txtTel', FILTER_SANITIZE_NUMBER_INT);

$result_contatoreg = "insert into contacts (name, email, tel) values('$nome','$email','$tel')";
mysqli_query($conn, $result_contatoreg);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Contato Cadastrado!</p>";
    header("Location: index.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Erro no Cadastro!</p>";
    header("Location: index.php");
}
mysqli_close($conn);
?>