<?php
include_once('C:\xampp\htdocs\BytesLab\banco\config.php');

// Função para tratar os dados do formulário
function get_form($key, $type="") {
  return ((isset($_POST[$key])) ? 
    ((is_array($_POST[$key])) ? $_POST[$key] : trim($_POST[$key])) : 
    ((isset($_GET[$key])) ? 
      ((is_array($_GET[$key])) ? $_GET[$key] : trim($_GET[$key])) : 
      ((isset($_FILES[$key])) ? $_FILES[$key] : "" )
    )
  ); 
}

// Obtenção dos valores do formulário
$nome = get_form('nome');
$data_nasc = get_form('data_nasc');
$telefone = get_form('telefone');
$email = get_form('email');
$senha = get_form('senha');
$senha2 = get_form('senha2');

// Inserção dos dados no banco de dados
$qry = "INSERT INTO usuarios (
  nome_completo,
  email,
  telefone,
  senha,
  data_cadastro,
  data_nascimento
)
VALUES (
  '$nome',
  '$email',
  '$telefone',
  '$senha',
  NOW(),
  '$data_nasc'
)";
var_dump($qry);die;

// Execução da consulta SQL
if(mysqli_query($conexao, $sql)) {
  echo "Registro inserido com sucesso.";
} else {
  echo "Erro ao inserir o registro: " . mysqli_error($conexao);
}

// Fechamento da conexão com o banco de dados
mysqli_close($conexao);


?>


<html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro | Joelma Nail Designer</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="formulario.css">
</head>

<body>
  <form class="form" action="<?= $_SERVER["PHP_SELF"];?>" method="post">
  <p class="title">Cadastro</p>
    <p class="message">Cadastre-se para realizar o seu agendamento. </p>
       
    <label>
        <input class="input" type="text" name="nome" id="nome"  required>
        <span>Nome Completo</span>
    </label>
    <label>
        <input class="input" type="date" name="data_nasc" id="data_nasc"  required>
        <span>Data Nascimento</span>
    </label>
    <label>
        <input class="input" type="text" name="telefone" id="telefone"  required>
        <span>Telefone</span>
    </label>     
    <label>
        <input class="input" type="text" name="email" id="email"  required>
        <span>Email</span>
    </label> 
    <label>
        <input class="input" type="password" name="senha" id="senha"  required>
        <span>Senha</span>
    </label>
    <label>
        <input class="input" name="senha2" type="password" id="senha2"  required>
        <span>Confirme a senha</span>
    </label>
    <button class="submit" type="submit" name="submit" id="submit">Cadastrar</button>
    <p class="signin" style="color: #606060; ">Já possui conta? <a href="login.php">Faça o login</a> </p>
</form>
</body>
</html>

