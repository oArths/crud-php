
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link type="text/css" rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php
            include "conexcao.php";

            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];

            $foto = $_FILES['foto'];
            $nome_foto = mover_foto($foto);
            if($nome_foto == 0){
              $nome_foto = null;
            }

            
            
            $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`) 
            VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento','$nome_foto')";

            if(mysqli_query($conn, $sql)){
              if($nome_foto != null){
                echo"<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
              }
                mensagem( "$nome cadastrado com sucesso!!", 'success');
            }else
            mensagem( "$nome não foi cadastrado !!", 'danger');
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>