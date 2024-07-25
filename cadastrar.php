<?php
include "conexao.php";
$conexao = conectar();
//recebendo as variáveis do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$foto = "uploads/user.png";

$pastaDestino = "/uploads/";
// verificar se o arquivo é uma imagem
$extensao = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

$nomeArquivo = uniqid();

// se deu tudo certo até aqui, faz o upload
$fezUpload = move_uploaded_file(
    $foto,
    __DIR__ . $pastaDestino . $nomeArquivo . "." . $extensao
);
if ($fezUpload == true) {
    $sql = "INSERT INTO usuario (arquivo) VALUES ('$nomeArquivo.$extensao')";
    $resultado = mysqli_query($conexao, $sql);
}
//inserindo no banco
$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome','$email', '$senha')";
$result = mysqli_query($conexao, $sql);

//redirecionando para o index.php
if ($result) {
    header("Location: login.php");
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}
?>