<?php require_once("./conexao/conexao.php"); ?>

<header>
    <div id="header_central">
        <?php 
            if (isset($_SESSION["user_portal"])){
                $user = $_SESSION["user_portal"];
                $saudacao = "SELECT nomecompleto FROM clientes WHERE clienteID = {$user}";

                $saudacao_login = mysqli_query($conecta, $saudacao);
                if (!$saudacao_login){
                    die("Falha no Banco!");
                }

                $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                $nome = $saudacao_login["nomecompleto"];
         ?>
        <?php
            }
        ?>
        <img src="assets/logo_andes.gif">
        <img src="assets/text_bnwcoffee.gif">
        <div id="header_saudacao"><h5>Bem vindo, <?php echo $nome ?> - <a href="logout.php">Sair</h5></div></a>
    </div>
</header>