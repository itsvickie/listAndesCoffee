<?php require_once("./conexao/conexao.php"); ?>

<?php
    session_start();

    if (!isset($_SESSION["user_portal"])){
        header("location:login.php");
    }

    setlocale(LC_ALL, 'pt_BR');

    $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $produtos .= "FROM produtos ";
    
    if (isset($_GET["produto"])){
        $nome_produto = $_GET["produto"];
        $produtos .= "WHERE nomeproduto LIKE '%{$nome_produto}%'";
    }

    $resultado = mysqli_query($conecta, $produtos);
    if (!$resultado){
        die("Falha na consulta ao banco!");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ANDES COFFEE</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
        <link href="_css/produto_pesquisa.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        <main>
            <div id="janela_pesquisa">
                <form action="inicial.php" method="get">
                    <input type="text" name="produto" placeholder="Pesquisa">
                    <input type="image" name="pesquisa" src="assets/botao_search.png">
                </form>
            </div>

            <div id="listagem_produtos">
                <?php
                    while($linha = mysqli_fetch_assoc($resultado)){
                ?>
                    <ul>
                        <li class="imagem">
                        <a href="detalhe.php?codigo=<?php echo $linha['produtoID']?>">
                        <img src="<?php echo $linha["imagempequena"]?>"></li>
                        <li><h3><?php echo $linha["nomeproduto"]?></h3></li>
                        <li>Tempo de Entrega: <?php echo $linha["tempoentrega"]?></li>
                        <li>Preço Unitário: R$ <?php echo $linha["precounitario"] ?></li></a>
                    </ul>
                <?php
                    }
                ?>
            </div>
        </main>
    </body>
    <?php include_once("_incluir/rodape.php"); ?>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>