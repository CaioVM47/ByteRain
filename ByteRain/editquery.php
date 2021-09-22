<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'nId', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'txtNome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_EMAIL);
$tel = filter_input(INPUT_POST, 'txtTel', FILTER_SANITIZE_NUMBER_INT);

$result_contatoedit = "UPDATE `contacts` SET `name`='$nome',`email`='$email',`tel`='$tel' WHERE id ='$id'";
mysqli_query($conn, $result_contatoedit);

if(mysqli_query($conn, $result_contatoedit)){
    $_SESSION['msg'] = "<p style='color:green;'>Editado com Sucesso!</p>";
    header("Location: edit.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao Editar!</p>";
    header("Location: edit.php");
}
mysqli_close($conn);
?>