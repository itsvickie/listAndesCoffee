<?php 
    require_once("./conexao/conexao.php");
    
    session_start();
    if (!isset($_SESSION["user_portal"])){
        header("location:login.php");
    }

    if (isset($_GET["codigo"])){
        $produto_id = $_GET["codigo"];
    } else {
        Header("Location: inicial.php");
    }

    $consulta = "SELECT * FROM produtos WHERE produtoID = {$produto_id}";
    $detalhe = mysqli_query($conecta, $consulta);

    if (!$detalhe){
        die("Falha no Banco de Dados!");
    } else {
        $dados_detalhe  = mysqli_fetch_assoc($detalhe);
        $produtoID      = $dados_detalhe["produtoID"];
        $nomeproduto    = $dados_detalhe["nomeproduto"];
        $descricao      = $dados_detalhe["descricao"];
        $codigobarra    = $dados_detalhe["codigobarra"];
        $tempoentrega   = $dados_detalhe["tempoentrega"];
        $precorevenda   = $dados_detalhe["precorevenda"];
        $precounitario  = $dados_detalhe["precounitario"];
        $estoque        = $dados_detalhe["estoque"];
        $imagemgrande   = $dados_detalhe["imagemgrande"];
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ANDES COFFEE</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        <main>
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem"><img src="<?php echo $imagemgrande?>"></li>
                    <li><h2><?php echo $nomeproduto?></li></h2>
                    <li><b>Descrição: </b><?php echo $descricao?></li>
                    <li><b>Código de Barra: </b><?php echo $codigobarra?></li>
                    <li><b>Tempo de Entrega: </b><?php echo $tempoentrega?></li>
                    <li><b>Preço de Revenda: </b><?php echo "R$ " . number_format($precorevenda, 2, ",", ".")?></li>
                    <li><b>Preço Unitário: </b><?php echo "R$ " . number_format($precounitario, 2, ",", ".")?></li>
                    <li><b>Estoque: </b><?php echo $estoque?></li>
                </ul>
            </div>
        </main>
    </body>
    <?php include_once("_incluir/rodape.php"); ?>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>