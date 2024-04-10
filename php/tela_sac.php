<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/tela_sac.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="../imgs/LOGO_SEM_NOME-removebg-preview-_1_.ico"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Dótis - Formulário de Contato</title>
</head>
<header>
  <h1>Dótis - Plataforma de auxílio em doações</h1>
</header>
<nav>
  <ul>
    <li><a href="./tela_inicial1.php">Menu Inicial</a></li>
</nav>
<section>
  <div class="container">
    <div class="header">
      <h2>Formulário de Contato</h2>
    </div>

    <form id="form" class="form" action="https://formsubmit.co/contato.dotis@gmail.com"
    method="POST">
      <div class="form-control">
        <label for="name">Nome</label>
        <input
          type="text"
          name="nome"
          placeholder="Digite seu nome..."
          maxlength="45"
          required
        />
      </div>

      <div class="form-control">
        <label for="email">Email</label>
        <input
          type="email"
          name="email"
          placeholder="Digite o email..."
          maxlength="70"
          required
        />
      </div>

      <div class="form-control">
        <label for="message">Mensagem</label>
        <textarea
          name="message"
          placeholder="Digite o email..."
          maxlength="500"
          required
        ></textarea>
      </div>
      <input type="hidden" name="_captcha" value="true">
      <input
          type="hidden"
          name="_next"
          value="http://localhost/TccBeta/php/tela_inicial1.php"
        />
      <button type="submit">Enviar</button>
    </form>
  </div>
</section>
<footer>
  <li><a href="../php/tela_sac.php"><u>Contate-nos!</u></a></li>
</footer>