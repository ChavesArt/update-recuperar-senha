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
    $id = mysqli_fetch_assoc($result);
    $id = $id['id_usuario'];
    
    
    if (mysqli_num_rows($result) < 1) {
        // se não existir no banco de dados destroi a sessão
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);
        header('Location:login.php');
    } else {
        $_SESSION['id_usuario'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['nome'] = $nome;
        header('location:index.php');
    }
} else {
    header('location:login.php');
}



?>