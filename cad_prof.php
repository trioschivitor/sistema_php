<?php

if(isset($_POST["submit"])){
  include_once("conexao.php");

  $nome = $_POST["nome"];
  $nivel = $_POST["nivel"];
  $admissao = $_POST["admissao"];
  $genero = $_POST["genero"];
  $disciplina = $_POST["disciplina"];

  $sql = "INSERT INTO professores (nome,nivel,admissao,genero,disciplina) VALUES ('$nome','$nivel','$admissao','$genero','$disciplina')";

  $resultado = $conexao->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body{
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    .titulo{
      color: blue;
  display: block;

     font-size: 40px;
     font-weight:700;
    }

    .form{
      color: red;
      background: lightgoldenrodyellow;
      border-radius: 3%;
      font-size: 20px;
    }

  </style>
</head>
<body>

<h1 class="titulo">Cadastro de Professores</h1>
<br>

<a href="lista_prof.php"><button>Lista de Professores</button></a>

<form class="form" action="cad_prof.php" method="POST">
    <br><br>
<div><label for="nome">Nome</label><br>
<input type="text" name="nome" id="nome" value="nome">
</div>
<br><br>
<label for="nivel">Nível</label><br>
<input type="text" name="nivel" id="nivel" value="nivel">
<br><br>
<label for="admissao">Data de Admissão</label><br>
<input type="date" name="admissao" id="admissao" value="admissao">
<br><br>
<label for="genero">Gênero</label><br>

<input type="radio" name="genero" id="m" value="m">
<label for="m">Masculino</label><br>

<input type="radio" name="genero" id="f" value="f">
<label for="f">Feminino</label><br>

<input type="radio" name="genero" id="o" value="o">
<label for="o">Outros</label><br>
<br>
<label for="disciplina">Disciplina</label><br>
<select name="disciplina" id="disciplina">
  <option value="null">Escolha</option>
  <option value="matematica">Matemática</option>
  <option value="portugues">Português</option>
  <option value="biologia">Biologia</option>
  <option value="fisica">Fisica</option>
</select>
<br><br>
<button type="submit" name="submit">Cadastro</button>

<?php
  if(!empty($resultado)){
    echo "Seus dados foram salvos com sucesso!";
  }
  ?>

</form>

  
</body>
</html>