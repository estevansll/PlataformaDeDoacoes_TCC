<?php
session_start();
    
include_once('../php/php_config/config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location:tela_login.php');
    }
    $autenticado = $_SESSION['email'];

    if(!empty($_GET['search'])){
      $data = $_GET['search'];
      $sql = "SELECT * FROM produto WHERE 
      nome LIKE '%$data' 
      or estado LIKE '%$data' 
      or cidade LIKE '%$data'
      or tipo LIKE '%$data' ORDER BY nome ASC";
    }
    else{
      $sql = "SELECT * FROM produto ORDER BY nome ASC";
    }

    $sqlNome = "SELECT nome FROM instituicao WHERE email LIKE '$autenticado'";

    $query = mysqli_query($conexao, $sqlNome);
    $nome = mysqli_fetch_array($query);

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
    
    <title>Dótis - Menu - Instituição</title>
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
      .box-search {
      justify-content: center;
      display: inline-block;
      gap: 1%;
      text-align: center;
      }
.box-search.pesquisar {
  text-align: center;
}
  </style>
    <header>
      <h1>Dótis - Plataforma de auxílio em doações</h1>
    </header>
    <nav>
      <ul>
        <li><a href = "logout.php">Sair</a></li>
    </nav>
    <br>
    <?php
      echo "<h4>Bem vindo, ". $nome['nome'] . "</h4>";
    ?>
    <h2 >Produtos</h2>
    <br>
    <div class="box-search">
        <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
        <button onclick = "searchData()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
    </button>
    </div>
      <div>
        <table class = table>
          <thead>
            <tr>
              <th scope="col">Nome</th>
          
              <th scope="col">Estado</th>
              <th scope="col">Cidade</th>
              <th scope="col">Tipo</th>
              <th scope="col">---</th>
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
                    echo "<td>
                        <a class='btn btn-primary' href='produto.php?nome=$user_data[nome]'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-square' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z'/>
                          </svg>
                        </a>
                          </td>";
                  echo "</tr>";
                    }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="" crossorigin="anonyumous"></script>
    <footer>
      <li><a href="../php/excluir_conta_inst.php"><u>Excluir Conta</u></a></li>
    </footer>
  </body>
  <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
      if(event.key === "Enter"){
        searchData();
      }

    });

    function searchData(){
      window.location = 'tela_menuInst.php?search='+search.value;
    }
  </script>
</html>
