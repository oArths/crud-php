<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php
            include "conexcao.php";
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];

            // $sql = "INSERT INTO `pessoas`( `nome`, `endereco`, `telefone`, `email`, `data_nascimento`) 
            // VALUES ('$nome','$endereco','$telefone ','$email','$data_nascimento')";
            $sql = "UPDATE `pessoas` SET  `nome`= '$nome', '$endereco' = `endereco`, `$telefone` = `telefone`, `$email`= `email`, `$data_nascimento` = `data_nascimento`) WHERE cod_pessoa = $id ";

            
            if(mysqli_query($conn, $sql)){
                mensagem( "$nome alterado com sucesso!!", 'success');
            }else
            mensagem( "$nome não foi alterado !!", 'danger');
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>