<?php
    require_once("./conexao/conexao.php");

    //Dados Transportadora
    $id = $_POST["transportadoraID"];
    $nome = $_POST["nometransportadora"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $cnpj = $_POST["cnpj"];
    $telefone = $_POST["telefone"];

    //Comando SQL Update Transportadoras
    $update = "UPDATE transportadoras SET nometransportadora = '{$nome}', endereco = '{$endereco}', cidade = '{$cidade}', estadoID = '{$estado}', cep = '{$cep}', cnpj = '{$cnpj}', telefone = '{$telefone}' WHERE transportadoraID = {$id}";

    //Atualizar BD
    $update_query = mysqli_query($conecta, $update); 

    //Troca de tela
    $update_query ? header("location:listagemTransportadoras.php"): die("Ups!");
?>