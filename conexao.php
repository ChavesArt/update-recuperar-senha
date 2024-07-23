<?php

/**
 * Faz uma conexão com o banco de dados MySQL, 
 * na base de dados recuperar-senha.
 * 
 * @return \mysqli retorna uma conexão com a base de dados, ou em caso 
 * de falha, mata a execução e exibe o erro.
 */
function conectar()
{
    include "config.php";
    $conexao = mysqli_connect(
        $config['host'],
        $config['user'],
        $config['pass'],
        $config['db']
    );
    if ($conexao === false) {
        echo "Erro ao conectar à base dados. Nº do erro: " .
            mysqli_connect_errno() . ". " .
            mysqli_connect_error();
        die();
    }
    return $conexao;
}

function executarSQL($conexao, $sql)
{
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado === false) {
        echo "Erro ao executar o comando SQL. " .
            mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
    return $resultado;
}
function logar($email,$senha)
{

        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $result = mysqli_query(conectar(), $sql);
        $dado = mysqli_fetch_assoc($result);   
        header('location:logout.php');
}