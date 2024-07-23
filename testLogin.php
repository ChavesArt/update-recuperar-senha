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
   
    
    
    if (mysqli_num_rows($result) < 1) {
        // se não existir no banco de dados destroi a sessão
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);
        header('Location:login.php');
    } else {
        $_SESSION['id_usuario'] = $email;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['nome'] = $nome;
        // print_r($_SESSION);
        header('location:index.php');
        // die();
    }
} else {
    header('location:login.php');
}



?>