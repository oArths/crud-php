<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
   
     $pesquisa = $_POST['busca'] ?? '';
    

    include "conexcao.php";
    $sql =  "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conn, $sql);

   
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
            <h1>Cadastro!</h1>
            <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="pesquisa.php" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            </nav>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Funções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     while($linha = mysqli_fetch_assoc($dados)){
                       $cod_pessoa =  $linha['cod_pessoa'];
                       $nome =  $linha['nome'];
                       $endereco =  $linha['endereco'];
                       $telefone =  $linha['telefone'];
                       $email =  $linha['email'];
                       $data_nascimento =  $linha['data_nascimento'];
                       $data_nascimento =  mostar_data($data_nascimento);

                       echo " <tr>
                       <th scope='row'>$nome</th>
                       <td>$endereco</td>
                       <td>$telefone</td>
                       <td>$email</td>
                       <td>$data_nascimento</td>
                       <td>
                       <a href='cadastro_edit.php? id=$cod_pessoa'  class='btn btn-danger'>Editar</a>
                       <a href='cadastro_edit.php? id=$cod_pessoa' class='btn btn-success'>Excluir</a>
                       
                       </td>
                       </tr>";
                
                    }
                    ?>
                   
                </tbody>
                </table>
            <a class="btn btn-info" href="index.php"  role="button">voltar para o inicio</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>