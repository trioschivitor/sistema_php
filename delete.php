<?php

session_start();
include_once 'conexao.php';

if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM alunos WHERE id='$id'";
  $resultado = $conexao ->query($sql);

  if($resultado ->num_rows>0){
    $sqldelete = "DELETE FROM alunos WHERE id='$id'";
    $resultadodelete = $conexao ->query($sqldelete);
    header('location:sistema.php');
  }

}else{
  header('location:sistema.php');
}


?>
