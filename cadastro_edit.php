<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php

    include "conexcao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id"; 

    $dados = mysqli_query($conn, $sql);

    $linha = mysqli_fetch_assoc($dados);

    ?>
    <div class="container">
        <div class="row">
            <div class="col">
            <h1>Alteração de Cadastro!</h1>
            <form action="cadastro_script.php" method="POST">
            <div class="mb-3">
                <label for="nome" >Nome Completo</label>
                <input type="text " class="form-control" name="nome" required value="<?php echo $linha['nome'];?>">
            </div>
            <div class="mb-3">
                <label for="endereco" >Endereço</label>
                <input type="text " class="form-control"  name="endereco" required value="<?php echo $linha['endereco'];?>">
            </div>
            <div class="mb-3">
                <label for="telefone" >Telefone</label>
                <input type="text " class="form-control"  name="telefone" value="<?php echo $linha['telefone'];?>">
            </div>
            <div class="mb-3">
                <label for="email" >Email</label>
                <input type="email " class="form-control"  name="email" value="<?php echo $linha['email'];?>">
            </div>
            <div class="mb-3">
                <label for="data" >Data de Nascimento</label>
                <input type="date" class="form-control"  name="data_nascimento" value="<?php echo $linha['data_nascimento'];?>">
            </div>
            <input type="submit" class="btn btn-success" value="Salvar Alterações">
            <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa'];?>">
            <a class="btn btn-info" href="index.php"  role="button">voltar para o inicio</a>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>