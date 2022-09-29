<?php

session_start();
include_once 'conexao.php';

if(isset($_SESSION['login']) and isset($_SESSION['senha'])){

  $login = ucfirst($_SESSION['login']);

}else{
  header('Location:login.php');
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
}

$sql="SELECT * FROM alunos ORDER BY nome ASC";
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    .topo {
      color: white;
      padding: 5px 20px;
    }

    body {
      height: 100vh;

    }

    main {
      height: 80vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .box {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 20px;
      width: auto;
      display: flex;
      justify-content: space-around;
      color: white;
    }
  </style>
</head>

<body class="bg-primary bg-gradient text-white">
  <header class="navbar bg-dark navbar-dark topo">
    <a href="index.html"><img src="/vitor/imagens/icons8-hulk.svg" alt="home"></a>
    <h1>SISTEMA DE CADASTRO ESCOLAR - 2022 <br> <?php
    echo "Bem vindo ".$login;
    ?></h1>
    <a href="sair.php"><button class="btn btn-danger">SAIR</button></a>



  </header>

  <main>
    <section class="box">
    <table class="table">
  <thead class="thead-white">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Serie</th>
      <th scope="col">Matricula</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Escolaridade</th>
      <th scope="col">Telefone</th>
    </tr>
  </thead>
  <tbody>
    <?php

      while($alunos = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>".ucfirst($alunos['nome'])."</td>";
        echo "<td>".$alunos['email']."</td>";
        echo "<td>".$alunos['serie']."</td>";
        echo "<td>".$alunos['matricula']."</td>";
        echo "<td>".$alunos['data_nasc']."</td>";
        echo "<td>".$alunos['escolaridade']."</td>";
        echo "<td>".$alunos['telefone']."</td>";
        echo "</tr>";

      }

    ?>
  </tbody>
</table>


    </section>
  </main>
</body>

</html>