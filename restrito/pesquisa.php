<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/estilo.css">
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
              <div class="container-fluid">
            <form class="d-flex" action="pesquisa.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            </div>
            </nav>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Foto</th>
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
                       $foto =  $linha['foto'];
                       if(!$foto == null){
                        $mostra_foto = "<img src='img/$foto' class='lista_foto'>";
                      }else{
                        $mostra_foto = '';
                      }


                       echo " <tr>
                       <th>$mostra_foto</th>
                       <th scope='row'>$nome</th>
                       <td>$endereco</td>
                       <td>$telefone</td>
                       <td>$email</td>
                       <td>$data_nascimento</td>
                       <td>
                       <a href='cadastro_edit.php? id=$cod_pessoa'  class='btn btn-success'>Editar</a>
                       <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirma'
                       onClick=" . '"' . "pegar_dados($cod_pessoa, '$nome')" . '"' . "
                       >Excluir</a>

                       
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
    <!-- Modal -->
        <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de Exclusão</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form  action="excluir_script.php" method="POST">
                <P>Deseja realmente exlcuir <b id="nome_pessoa">Nome da pessoaaaaa </b>?</P>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Não</button>
                <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                <input type="hidden" name="id" id="cod_pessoa" value="">
                <input type="submit" class="btn btn-danger"value="Sim"/>
                </form>
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          function pegar_dados(id, nome){
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('nome_pessoa_1').value = nome;
            document.getElementById('cod_pessoa').value = id;
          }

        </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>