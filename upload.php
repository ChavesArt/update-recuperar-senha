<?php
$pastaDestino = "/uploads/";
include "conexao.php";
// verificar se o tamanho do arquivo é maior que 2 MB
if ($_FILES['arquivo']['size'] > 2000000) {  // condição de guarda 👮
    echo "O tamanho do arquivo é maior que o limite permitido. Limite máximo: 2 MB.";
    die();
}

// verificar se o arquivo é uma imagem
$extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));

if (
    $extensao != "png" && $extensao != "jpg" &&
    $extensao != "jpeg" && $extensao != "gif" &&
    $extensao != "jfif" && $extensao != "svg"
) { // condição de guarda 👮
    echo "O arquivo não é uma imagem! Apenas selecione arquivos 
    com extensão png, jpg, jpeg, gif, jfif ou svg.";
    die();
}

// verificar se é uma imagem de fato
if (getimagesize($_FILES['arquivo']['tmp_name']) === false) {
    echo "Problemas ao enviar a imagem. Tente novamente.";
    die();
}

$nomeArquivo = uniqid();

        // se for uma alteração de arquivo
        if (isset($_POST['arquivo'])) {
            $arqNovo = $_POST['arquivo'];
            $id_usuario = $_SESSION['id_usuario'];
            $sql5="INSERT INTO usuario set arquivo='$arqNovo' WHERE id_usuario = '$id_usuario'";
            $apagou = unlink(__DIR__ . $pastaDestino . $_POST['arquivo']);
            if ($apagou == true) {
                $sql = "DELETE FROM usuario WHERE id_usuario='" 
                        . $_SESSION['id_usuario'] . "'";
                $resultado2 = mysqli_query($conexao, $sql);
                if ($resultado2 == false) {
                    echo "Erro ao apagar o arquivo do banco de dados.";
                    die();
                }
            } else {
                echo "Erro ao apagar o arquivo antigo.";
                die();
            }
        }
        header("Location: index.php");
     
