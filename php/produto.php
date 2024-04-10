<?php
    session_start();
  
    include_once('../php/php_config/config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location:tela_login.php');
    }
    if(!empty($_GET['nome'])){

        $dbHost = 'Localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'dotis_database';
    
        $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

        $nome = $_GET['nome'];

        $sql = "SELECT * FROM produto WHERE nome='$nome'";

        $result = $conexao->query($sql);

        if($result->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result)){

              $nome = $user_data['nome'];
              $descricao = $user_data['descricao'];
              $estado = $user_data['estado'];
              $cidade = $user_data['cidade'];
              $tipo = $user_data['tipo'];
              $contatos = $user_data['contatos'];
            }
            
        }
        else{
            header('Location:tela_menuInst.php');
        }



    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/tela_view_produto.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="../imgs/LOGO_SEM_NOME-removebg-preview-_1_.ico"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Dótis - Produto - <?php print_r($nome)?></title>
</head>
<body>
    <header>
        <h1>Dótis - Plataforma de auxílio em doações</h1>
      </header>
      <nav>
        <ul>
          <li><a href="../php/tela_menuInst.php">Menu</a></li>
      </nav>
      <section>
        <div class="container">
          <div class="header">
            <h2>
                <?php
                    print_r($nome);
                ?>
            </h2>
          </div>
    
          <form id="form" class="form">

            <div class="form-control">
                
            <fieldset>
                <legend><b> Descricao </b></legend>
                    <?php
                        print_r($descricao);
                    ?>
            </fieldset>
            <fieldset>
                <legend><b> Estado </b></legend>
                    <?php
                        print_r($estado);
                    ?>
            </fieldset>
            <fieldset>
                <legend><b> Cidade </b></legend>
                    <?php
                        print_r($cidade);
                    ?>
            </fieldset>
            <fieldset>
                <legend><b> Tipo do Produto </b></legend>
                    <?php
                        print_r($tipo);
                    ?>
            </fieldset>
            <fieldset>
                <legend><b> Contatos </b></legend>
                    <?php
                        print_r($contatos)
                    ?>
            </fieldset>
                
            </div>
            
          </form>
        </div>
      </section>
      <footer>
        <li><a href=""><u></u></a></li>
      </footer>
    </body>
  </html>
  
</body>
</html>