
<?php
$server = "localhost";
$user = "root";
$password = "";
$bd = "empresa";


if($conn = mysqli_connect($server, $user, $password, $bd)){
    // echo"Conectado";
} else
    echo"Erro!";

    function mensagem ($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
            $texto 
            </div>";
    }

    function mostar_data($data){
        $d = explode('-', $data);
        $escreve = $d[2]. "/" .$d[1] ."/" .$d[0];
        return $escreve;
    }
    function mover_foto($vector_foto){
        $vtipo = explode('/', $vector_foto['type']);
        $tipo = $vtipo[0] ?? '';
        $extensao = "." .$vtipo[1] ?? '';

        if(!$vector_foto['error'] and ($vector_foto['size'] <= 500000) and ($tipo == "image")){
            $nome_arquivo = date('Ymdhms') .$extensao;
            move_uploaded_file($vector_foto['tmp_name'], "img/" .$nome_arquivo);
            return $nome_arquivo;
        }else{
            return 0;
        }
    }
?>