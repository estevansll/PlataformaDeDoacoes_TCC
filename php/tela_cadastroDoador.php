<?php

    if(isset($_POST['submit'])){

      include_once('../php/php_config/config.php');

      $nome = $_POST['username'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];
      $senha = $_POST['password'];
      $confirmacao = $_POST['password-confirmation'];

      $sqlNome = "SELECT * FROM doador WHERE nome = '$nome'";
      $sqlCpf = "SELECT * FROM doador WHERE cpf = '$cpf'";
      $sqlEmail = "SELECT * FROM doador WHERE email = '$email'";
    
      $resultNome = $conexao->query($sqlNome);
      $resultCpf = $conexao->query($sqlCpf);
      $resultEmail = $conexao->query($sqlEmail);

      if(mysqli_num_rows($resultNome) > 0 
        || mysqli_num_rows($resultCpf) > 0 
        || mysqli_num_rows($resultEmail) > 0){
        
          header('Location:tela_login.php');

      }
      else
        if($senha == $confirmacao){
          $result = mysqli_query($conexao, "INSERT INTO doador(nome, cpf, email, senha) 
          VALUES('$nome', '$cpf', '$email', '$senha')");

          header('Location:tela_menuDoador.php');
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/tela_cadastro.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="../imgs/LOGO_SEM_NOME-removebg-preview-_1_.ico"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Dótis - Cadastro de Doador</title>
    <style>

      form #submit{
      border: 0;
      padding: 10px 50px;
      border-radius: 5px;
      cursor: pointer;
      letter-spacing: 1px;
      font-size: 1rem;
      font-weight: bold;
      position: relative;
      text-transform: uppercase;
      transition: all 0.5s;
      width: 300px;
      margin-left: 30px;
      margin-right: 30px;
      background-color: #eee;
      }

      form #submit:hover{
      box-shadow: 1px 1px 0, 2px 2px 0, 3px 3px 0, 4px 4px 0, 5px 5px 0, 6px 6px 0;
      background-color: white;
      color: rgb(146, 19, 146);
      }

    </style>
  </head>
  <body>
    <header>
      <h1>Dótis - Plataforma de auxílio em doações</h1>
    </header>
    <nav>
      <ul>
        <li><a href="../php/tela_inicial1.php">Menu Inicial</a></li>
    </nav>
    <section>
      <div class="container">
        <div class="header">
          <h2>Criar uma Conta</h2>
        </div>
  
        <form action="tela_cadastroDoador.php" method="POST" id="form" class="form">
          <div class="form-control">
            <label for="username">Nome de Usuário</label>
            <input
              name="username"
              type="text"
              id="username"
              placeholder="Digite seu nome de usuário..."
              maxlength="45"
              required
            />
          </div>
  
          <div class="form-control">
            <label for="cpf">Cpf</label>
            <input
              name="cpf" 
              type="text" 
              id="cpf" 
              placeholder="Digite seu cpf..."
              maxlength="11"
              required
              />
          </div>

          <div class="form-control">
            <label for="email">Email</label>
            <input
              name="email" 
              type="email" 
              id="email" 
              placeholder="Digite seu email..." 
              maxlength="70"
              required
              />
          </div>
  
          <div class="form-control">
            <label for="password">Senha</label>
            <input 
              name="password"
              type="password" 
              id="password" 
              placeholder="Digite sua senha..." 
              maxlength="45"
              required
              />
          </div>
  
          <div class="form-control">
            <label for="password-confirmation">Confirmação</label>
            <input
              name="password-confirmation"
              type="password"
              id="password-confirmation"
              placeholder="Digite sua senha..."
              maxlength="45"
              required
            />
          </div>
  
          <input type="submit" id="submit" name="submit">
        </form>
      </div>
    </section>
    
    <footer>
      <li><a href="../php/tela_sac.php"><u>Contate-nos!</u></a></li>
    </footer>
  </body>
</html>
