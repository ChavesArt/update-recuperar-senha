<?php

session_start();
if (!empty($_POST['email']) and !empty($_POST['senha'])) {
    include('conexao.php');
    $conecta = conectar();
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conecta, $sql);
    $dado = mysqli_fetch_assoc($result);
    $_SESSION['id_usuario'] = $dado['nome'];

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);
        header('Location:login.php');
    } else {
        header('location:index.php');
        die();
    }
} else {
    header('location:login.php');
}



?>