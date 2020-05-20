<?php 
    require_once("./conexao/conexao.php"); 

    $tr = "SELECT * FROM transportadoras ";
    $lista_estados = "SELECT estadoID, nome FROM estados";

    if (isset($_GET["codigo"])){
        $id = $_GET["codigo"];
        $tr .= "WHERE transportadoraID = {$id}";
    } else {
        header("location:listagemTransportadoras.php");
    }

    $estados_query = mysqli_query($conecta, $lista_estados);
    $con_transportadora = mysqli_query($conecta, $tr);

    if(!$con_transportadora){
        die("Erro ao consultar!");
    }

    $info_transportadora = mysqli_fetch_assoc($con_transportadora);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>
    <body>
        <?php include_once("_incluir/topo.php"); ?>

        <main>
            <div id="janela_formulario">
                <form action="alteracao.php" method="post">
                    <h2>Alteração de Transportadora</h2>

                    <label for="nometransportadora">Nome da Transportadora</label>
                    <input type="text" value="<?php echo $info_transportadora['nometransportadora']?>" name="nometransportadora" id="nometransportadora">
                    <label for="endereco">Endereço</label>
                    <input type="text" value="<?php echo $info_transportadora['endereco']; ?>" name="endereco" id="endereco">
                    <label for="cidade">Cidade</label>
                    <input type="text" value="<?php echo $info_transportadora['cidade']; ?>" name="cidade" id="cidade">
                    <label for="estado">Estado</label>
                    <select id="estado">
                        <?php 
                            while ($estado = mysqli_fetch_assoc($estados_query)){
                        ?>
                            <option value="<?php echo $estado["estadoID"]?>"> <?php echo $estado["nome"]?> </option>
                        <?php
                            }
                        ?>
                    </select>
                    <label for="cep">CEP</label>
                    <input type="text" value="<?php echo $info_transportadora["cep"]?>" name="cep" id="cep">
                    <label for="telefone">Telefone</label>
                    <input type="text" value="<?php echo $info_transportadora['telefone']?>" name="telefone" id="telefone">
                    <input type="submit" value="Alterar">  
                </form>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>