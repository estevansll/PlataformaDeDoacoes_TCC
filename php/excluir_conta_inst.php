<?php
    session_start();

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'dotis_database';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    $email = $_SESSION['email'];

    $result = "DELETE FROM instituicao WHERE email = '$email'";

    $result = mysqli_query($conexao, "DELETE FROM instituicao WHERE email = '$email'");

    header("Location:tela_login.php");
?>