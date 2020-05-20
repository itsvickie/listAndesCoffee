<?php require_once("./conexao/conexao.php"); ?>

<?php
    if(isset($_POST["nometransportadora"])){
        $nome = $_POST["nometransportadora"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
        $cnpj = $_POST["cnpj"];

        $inserir = "INSERT INTO transportadoras (nometransportadora, endereco, telefone, cidade, estadoID, cep, cnpj) VALUES ('$nome', '$endereco', '$telefone', '$cidade', $estado, '$cep', '$cnpj')";

        $operacao_inserir = mysqli_query($conecta, $inserir);

        if(!$operacao_inserir){
            die("Erro ao inserir!");
        }
    }

    $estados = "SELECT estadoID, nome FROM estados";
    $lista_estados = mysqli_query($conecta, $estados);
    if (!$lista_estados){
        die("Erro no Banco!");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="_css/estilo.css" rel="stylesheet">
    <link href="_css/crud.css" rel="stylesheet">
</head>
<body>
    <?php include_once("_incluir/topo.php"); ?>

    <main>
        <div id="janela_formulario">

            <form action="inserir_transportadoras.php" method="post">
                <input type="text" name="nometransportadora" placeholder="Nome da Transportadora">
                <input type="text" name="endereco" placeholder="Endereço">
                <input type="text" name="telefone" placeholder="Telefone">
                <input type="text" name="cidade" placeholder="Cidade">
                <select name="estado">
                <?php
                        while($linha = mysqli_fetch_assoc($lista_estados)){
                    ?>
                        <option value="<?php echo $linha["estadoID"]?>"> <?php echo $linha["nome"] ?> </option>
                    <?php
                        }
                    ?>
                </select>
                <input type="text" name="cep" placeholder="CEP">
                <input type="text" name="cnpj" placeholder="CNPJ">
                <input type="submit" value="inserir">
            </form>
        </div>
    </main>
</body>
</html>