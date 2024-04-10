<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){

        include_once('../php/php_config/config.php');

        $email = $_POST['email'];
        $senha = $_POST['password'];

        $sql1 = "SELECT * FROM doador WHERE email = '$email' AND senha = '$senha'";
        $sql2 = "SELECT * FROM instituicao WHERE email = '$email' AND senha = '$senha'";

        $result1 = $conexao->query($sql1);
        $result2 = $conexao->query($sql2);

        if(mysqli_num_rows($result1) < 1){
            if(mysqli_num_rows($result2) < 1){
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location:tela_login.php');
            }
            else{
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location:tela_menuInst.php');
            }
        }
        else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location:tela_menuDoador.php');
        }
    }
    else{
        header('Location:tela_login.php');
    }
?>