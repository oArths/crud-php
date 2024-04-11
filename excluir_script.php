<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusão de Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php
            include "conexcao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];
        

            $sql = "DELETE FROM  `pessoas` WHERE cod_pessoa = $id ";

            
            if(mysqli_query($conn, $sql)){
                mensagem( "$nome excluido com sucesso!!", 'success');
            }else
            mensagem( "$nome não foi excluido !!", 'danger');
            ?>
            <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>