<?php
session_start();
include "conexao.php";
$conectar = conectar();

$id = $_SESSION['id_usuario'];

$sql = "DELETE FROM usuario where id_usuario = $id";


$deletador = mysqli_query($conectar,$sql);
session_destroy();

header("location:login.php");
?>