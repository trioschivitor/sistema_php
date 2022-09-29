<?php

session_start();
include_once 'conexao.php';

if(isset($_POST['submit'])and !empty($_POST['login'])and !empty($_POST['senha'])){

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM administradores WHERE login='$login'";
  $resultado = $conexao ->query($sql);
  $usuario = $resultado ->fetch_assoc();

  if(password_verify($senha,$usuario['senha'])){

    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('Location:sistema.php');
  }else{
    header('Location:login.php');
  }

}else{
  $msg = "Senha incorreta!!";
  header('Location:login.php?msg="$msg"');

}


?>