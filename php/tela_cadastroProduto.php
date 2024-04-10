<?php
    session_start();
    
    include_once('../php/php_config/config.php');
    
        if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
          unset($_SESSION['email']);
          unset($_SESSION['senha']);
          header('Location:tela_login.php');
        }


    if(isset($_POST['submit'])){

      include_once('../php/php_config/config.php');

      $nome = $_POST['nomeProduto'];
      $descricao = $_POST['descricao'];
      $estado = $_POST['estado'];
      $cidade = $_POST['cidade'];
      $tipo = $_POST['tipo'];
      $contatos = $_POST['contatos'];

      $result = mysqli_query($conexao, "INSERT INTO produto(nome, descricao, estado, cidade, tipo, contatos)
      VALUES ('$nome', '$descricao', '$estado', '$cidade', '$tipo', '$contatos')");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/tela_produto.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="../imgs/LOGO_SEM_NOME-removebg-preview-_1_.ico"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Dótis - Cadastro de Produto</title>
    <style>
      #submit{
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

      #submit:hover{
      box-shadow: 1px 1px 0, 2px 2px 0, 3px 3px 0, 4px 4px 0, 5px 5px 0, 6px 6px 0;
      background-color: white;
      color: rgb(146, 19, 146);
      }
      
    </style>
</head>
<header>
  <h1>Dótis - Plataforma de auxílio em doações</h1>
</header>
<nav>
  <ul>
    <li><a href="../php/tela_menuDoador.php">Menu</a></li>
</nav>
<section>
  <div class="container">
    <div class="header">
      <h2>Cadastrar Produto</h2>
    </div>

    <form id="form" class="form" method="POST">
      <div class="form-control">
        <label for="nomeProduto">Nome de Produto</label>
        <input
          name="nomeProduto"
          type="text"
          id="nomeProduto"
          placeholder="Digite o nome do produto..."
          maxlength="45"
          required
        />
      </div>

      <div class="form-control">
        <label for="descricao">Descrição</label>
        <textarea 
            type="text" 
            name="descricao" 
            id="descricao" 
            placeholder="Digite sobre o produto..." 
            maxlength="1000" 
            required
        ></textarea>
      </div>

      <div class="form-control">
        <label for="estado">Estado</label>
        <br>
        <select name = "estado" id = "estado" required>
            <option value="nd"></option>
            <option value="Acre">Acre</option>
            <option value="Alagoas">Alagoas</option>
            <option value="Amapá">Amapá</option>
            <option value="Amazonas">Amazonas</option>
            <option value="Bahia">Bahia</option>
            <option value="Ceará">Ceará</option>
            <option value="Distrito Federal">Distrito Federal</option>
            <option value="Espírito Santo">Espírito Santo</option>
            <option value="Goiás">Goiás</option>
            <option value="Maranhão">Maranhão</option>
            <option value="Mato Grosso">Mato Grosso</option>
            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
            <option value="Minas Gerais">Minas Gerais</option>
            <option value="Pará">Pará</option>
            <option value="Paraíba">Paraíba</option>
            <option value="Paraná">Paraná</option>
            <option value="Pernambuco">Pernambuco</option>
            <option value="Piauí">Piauí</option>
            <option value="Rio de Janeiro">Rio de Janeiro</option>
            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
            <option value="Rondônia">Rondônia</option>
            <option value="Roraima">Roraima</option>
            <option value="Santa Catarina">Santa Catarina</option>
            <option value="São Paulo">São Paulo</option>
            <option value="Sergipe">Sergipe</option>
            <option value="Tocantins">Tocantins</option>
        </select>   
      </div>
      
      <div class="form-control">
        <label for="cidade">Cidade</label>
        <input
          name="cidade"
          type="text"
          id="cidade"
          placeholder="Digite a sua cidade..."
          maxlength="45"
          required
        />
      </div>

      <div class="radio">
                <label for="tipo">Tipo do Produto</label><br>
                <input class = "rb" type="radio" id="roupa" name="tipo" value="Roupa" required>
                <label for="roupa">Roupa</label><br>
                <input class = "rb" type="radio" id="sapato" name="tipo" value="Sapato" required>
                <label for="sapato">Sapato</label><br>
                <input class = "rb" type="radio" id="eletro" name="tipo" value="Eletrodoméstico" required>
                <label for="eletro">Eletrodoméstico</label><br>
                <input class = "rb" type="radio" id="brinquedo" name="tipo" value="Brinquedo" required>
                <label for="brinquedo">Brinquedo</label><br>
                <input class = "rb" type="radio" id="material" name="tipo" value="Material" required>
                <label for="material">Material Escolar</label>
      </div>
      <br>
      <div class="form-control">
        <label for="descricao">Contatos</label>
        <textarea 
            type="text" 
            name="contatos" 
            id="contatos" 
            placeholder="Digite meios de contato(Ex.: telefone, email, etc...)" 
            maxlength="1000" 
            required
        ></textarea>
      </div>
      <input type="submit" name="submit" id="submit">
    </form>
  </div>
</section>

<footer>
  <li><a href=""><u></u></a></li>
</footer>