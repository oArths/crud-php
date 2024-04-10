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
?>