<?php require_once("./conexao/conexao.php"); ?>

<?php
    session_start();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ANDES COFFEE</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        <main>
            <?php
                echo $_SESSION["usuario"];
            ?>
            
            <p><a href="logout.php">Logout</a></p>
        </main>
    </body>
    <?php include_once("_incluir/rodape.php"); ?>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>