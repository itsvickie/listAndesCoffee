<?php
    require_once("./conexao/conexao.php");

    //Dados Transportadora
    if (isset($_POST["transportadoraID"])){
        $id = $_POST["transportadoraID"];
    }
    
    $delete = "DELETE FROM transportadoras WHERE transportadoraID = {$id}";

    $delete_query = mysqli_query($conecta, $delete);

    $delete_query ? header("location:listagemTransportadoras.php") : die("Ups!");
?>