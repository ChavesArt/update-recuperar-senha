<?php
include "conexao.php";
$conexao = conectar();
//recebendo as variáveis do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//inserindo no banco
$sql = "INSERT INTO usuario (nome, email, senha, arquivo) VALUES ('$nome','$email', '$senha', 'user.png')";
$result = mysqli_query($conexao, $sql);

//redirecionando para o login.php
if ($result) {
    header("Location: login.php");
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}
?>