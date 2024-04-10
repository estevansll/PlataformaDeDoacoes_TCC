<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/tela_login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="../imgs/LOGO_SEM_NOME-removebg-preview-_1_.ico"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Dótis - Login</title>
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
      a{
        padding: 15px;
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
            <h2>Entre na sua Conta</h2>
          </div>
    
          <form id="form" class="form" action="../php/autenticaLogin.php" method="POST">

            <div class="form-control">
              <label for="email">Email</label>
              <input
               name="email"
               type="text" 
               id="email" 
               placeholder="Digite seu email..."
               maxlength="45"
               required
              />
            </div>
    
            <div class="form-control">
              <label for="password">Senha</label>
              <input
              name="password" 
              type="password" 
              id="password" 
              placeholder="Digite sua senha..." ]
              maxlength="45"
              required
              />
            </div>
    
            <a href="../php/tela_escolha.php"><u>Ainda não tem uma conta? Cadastre-se</u></a>
            <br><br>

            <input type="submit" name = "submit" id="submit">
          </form>
        </div>
      </section>
      
      <footer>
        <li><a href="../php/tela_sac.php"><u>Contate-nos!</u></a></li>
      </footer>
    </body>
  </html>
  
</body>
</html>