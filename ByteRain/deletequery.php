<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'nId', FILTER_SANITIZE_NUMBER_INT);

$result_contatodel = "DELETE FROM `contacts` WHERE id = $id";
mysqli_query($conn, $result_contatodel);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível Deletar!</p>";
    header("Location: delete.php");
}else{
    $_SESSION['msg'] = "<p style='color:green;'>Contato Deletado!</p>";
    header("Location: delete.php");
}
mysqli_close($conn);
?>