<?php
    // Abrir Conexão com o Banco
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (mysqli_connect_errno()){
        die("Conexão falhou: " . mysqli_connect_errno());
    }
?>