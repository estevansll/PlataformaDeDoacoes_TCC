<?php
session_start();
  
    include_once('../php/php_config/config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location:tela_login.php');
    }
    $autenticado = $_SESSION['email'];

    $sql = "SELECT * FROM produto ORDER BY nome DESC";

    $sqlNome = "SELECT nome FROM doador WHERE email LIKE '$autenticado'";

    $query = mysqli_query($conexao, $sqlNome);
    $nome = mysqli_fetch_array($query);

    //echo "Bem vindo, ". $nome['nome'] ;

    $result = $conexao->query($sql);

    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/tela_menu.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="../imgs/LOGO_SEM_NOME-removebg-preview-_1_.ico"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Dótis - Menu - Doador</title>
  </head>
  <body>
    <style>
      td, th{
        padding: .7em;
        margin: 0;
        border: 1px solid #ccc;
        text-align:center;
      }
      
      table{
        width: 100%;
        margin-bottom: .5em;
        text-align: center;
        color: rgb(146, 19, 146);
        padding: 20px;
        padding-left: 100px;
        padding-right: 100px;
      }
      h2{
        text-align: center;
        color: rgb(146, 19, 146);
      }
      h4{
        text-align: left;
        padding-left: 5px;
      }
    </style>
    <header>
      <h1>Dótis - Plataforma de auxílio em doações</h1>
    </header>
      <nav>
          <ul>
                <li><a href = "logout.php">Sair</a></li>
                <li><a href = "tela_cadastroProduto.php">Cadstrar Produto</a></li>
      </nav>
    <br>
    <?php
        echo "<h4>Bem vindo, ". $nome['nome'] . "</h4>" ;
    ?>
    <h2 >Produtos</h2>
    <br>
    <div>
      <table class = table>
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Tipo</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                      echo "<tr color='black'>";
                      echo "<td>".$user_data['nome']."</td>";
                      
                      echo "<td>".$user_data['estado']."</td>";
                      echo "<td>".$user_data['cidade']."</td>";
                      echo "<td>".$user_data['tipo']."</td>";
                      echo "</tr>";
                    }
                ?>
              </tbody>
      </table>
    </div>
    <script src="" crossorigin="anonyumous"></script>
    <footer>
      <li><a href="../php/excluir_conta_doador.php"><u>Excluir Conta</u></a></li>
    </footer>
  </body>
</html>
