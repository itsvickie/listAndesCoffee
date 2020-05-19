<?php require_once("./conexao/conexao.php"); ?>

<?php
    //iniciar sessão
    session_start();

    $_SESSION["usuario"] = "Gabriel";
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
                if(isset($_SESSION)){
                    echo $_SESSION["usuario"];
                }
            ?>
            <p><a href="pagina2.php">Página 2</a></p>
           
        </main>
    </body>
    <?php include_once("_incluir/rodape.php"); ?>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>