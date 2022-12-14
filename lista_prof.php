<?php

session_start();
include_once 'conexao.php';

if(!empty($_GET['search'])){

  $search = $_GET['search'];
  $sql = "SELECT * FROM professores WHERE nome LIKE '%$search%' ORDER BY nome ASC";

}else{

$sql="SELECT * FROM professores ORDER BY nome ASC";

}
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
      color: white;
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

    .table{
      color: white;

    }

    .btn-search{
      background: goldenrod;
      border-radius: 5px;
      grid-row: auto;
    }
  </style>
</head>

<body class="bg-primary bg-gradient text-white">
  <header class="navbar bg-dark navbar-dark topo">
    <a href="index.html"><img src="/vitor/imagens/icons8-hulk.svg" alt="home"></a>
    <h1>SISTEMA DE CADASTRO ESCOLAR - 2022 <br> </h1>

    <form class="form-inline" action="lista_prof.php" method="$_GET">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn-search" type="submit" name="submit">Search</button>
  </form>

    <a href="sair.php"><button class="btn btn-danger">SAIR</button></a>



  </header>

  <main>
    <section class="box">
    <table class="table">
  <thead class="thead-white">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">N??vel</th>
      <th scope="col">Admiss??o</th>
      <th scope="col">G??nero</th>
      <th scope="col">Disciplina</th>
    </tr>
  </thead>
  <tbody>
    <?php

      while($professores = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>".ucfirst($professores['nome'])."</td>";
        echo "<td>".$professores['nivel']."</td>";
        echo "<td>".$professores['admissao']."</td>";
        echo "<td>".$professores['genero']."</td>";
        echo "<td>".$professores['disciplina']."</td>";
        echo "</tr>";

      }

    ?>
  </tbody>
</table>


    </section>
  </main>
</body>

</html>