<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
}

  include "conexao.php";
  $conexao = conectar();
  $email = $_SESSION['email'];
  $sql ="SELECT * FROM  usuario where email= '$email'";
  $arquivos = executarSQL($conexao,$sql); 
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
    <?php include "links.php"; ?>
</head>

<body>

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
  
        
              <?php 
              $dados = mysqli_fetch_assoc($arquivos);
                $arq = $dados['arquivo'];
        
                echo "<tr>"; // iniciar a linha
                echo "<td><img src='uploads/$arq' width='170px' height='170px'></td>"; // exibe imagem
                echo "</tr>";
            
              ?>
              <h5>Marie Horwitz</h5>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">info@example.com</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"> <?php echo "<a href='alterar.php?arquivo=$arq'>Alterar</a> </p>"; ?>
                  </div>
                </div>
                <h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted">Lorem ipsum</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Most Viewed</h6>
                    <p class="text-muted">Dolor sit amet</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecione o arquivo:
        <input type="file" name="arquivo"><br>
        <input type="submit" value="Enviar">
    </form>
    <br><br>
    <table>
        <thead>
            <tr>
                <th colspan="2">Arquivo</th>
                <th colspan="2">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
           $arq = $arquivo['arquivo'];
                 foreach ($arquivos as $arquivo) {
                echo "<tr>"; // iniciar a linha
                echo "<td><img src='uploads/$arq' width='100px' height='100px'></td>"; // exibe imagem
                echo "<td><a href='uploads/$arq'>$arq</a></td>"; // 1ª coluna com o nome do arquivo
                echo "<td>"; // iniciar a 2ª coluna
                echo "<a "; // abriu o link (abriu a tag a)
                echo "href='alterar.php?arquivo=$arq'>"; // inseriu o link
                echo "Alterar"; // imprimiu o texto da tag a
                echo "</a>"; // fechei a tag a (fechei o link)
                echo "</td>"; // fechei a 2ª coluna
                echo "<td>"; // abri a 3ª coluna
                echo "<button "; // abrir o botão
                echo "onclick="; // criou o atributo onclick
                echo "'excluir(\"$arq\");'>"; // chamamos a função excluir
                echo "Excluir"; // mostrar o texto do botão
                echo "</button>"; // fechar o botão
                echo "</td>"; // fechar a 3ª coluna
                echo "</tr>"; // fechar a linha
            }
            ?>
        </tbody>
    </table>

    <script>
        function excluir(nome_arquivo) {
            let deletar = confirm("Você tem certeza que deseja excluir o arquivo " + nome_arquivo + "?");
            if (deletar == true) {
                window.location.href = "deletar.php?arquivo=" + nome_arquivo;
            }
        }
    </script>
</body>

</html>