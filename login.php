<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça login</title>
    <?php include ("links.php"); ?>
</head>
<body>
<form action="testLogin.php" method="post">
    <div class="container">
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
        </div>
        <p>Ainda não é cadastrado?<a href="formcad.php">Cadastrar-se</a></p>
        <a href="recuperar_senha.php">Esqueceu a senha?</a> <br>
        <input type="submit" class="btn btn-primary" value ="Logar">
    </div>
    </form>
</body>
</html>