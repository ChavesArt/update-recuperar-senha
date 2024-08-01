<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
}

  include "conexao.php";
  $conexao = conectar();
  $email = $_SESSION['email'];
  $sql ="SELECT * FROM  usuario where email = '$email'";
  $arquivos = executarSQL($conexao,$sql); 

  $dados = mysqli_fetch_assoc($arquivos);

  if ($dados == null){
    header ("location: login.php");
  }

  
                $arq = $dados['arquivo'];
                $nome = $dados['nome'];
                $id = $dados['id_usuario'];
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
                    <h6>Nome</h6>
                    <?php 
              echo "$nome";
            
              ?>
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
                    <h6>Sair</h6>
                    <a href="logout.php">DESLOGAR-SE</a>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>DELETAR PERFIL</h6>
                   <?php echo "<a href='deletar_perfil.php'>DELETAR PERFIL?</a>"; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>