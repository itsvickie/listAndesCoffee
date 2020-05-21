<?php require_once("./conexao/conexao.php"); 

    //Consulta a tabela de transportadoras
    $tr = "SELECT * FROM transportadoras ";
    if (isset($_GET["codigo"])){
        $id = $_GET["codigo"];
        $tr .= "WHERE transportadoraID = {$id}";
    }

    //Conexão ao Banco
    $con_transportadora = mysqli_query($conecta, $tr);

    if(!$con_transportadora){
        die("Erro na consulta!");
    }

    //Retorno do Array
    $info_transportadora = mysqli_fetch_assoc($con_transportadora);

    //Consultando os Estados
    $estados = "SELECT * FROM estados ";
    $lista_estados = mysqli_query($conecta, $estados);

    if (!$lista_estados){
        die("Erro ao consultar os estados!");
    }
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
                <form action="exclusao2.php" method="post">
                    <h2>Exclusão de Transportadora</h2>

                    <label for="nometransportadora">Nome da Transportadora</label>
                    <input id="nometransportadora" type="text" value="<?php echo $info_transportadora['nometransportadora']?>" name="nometransportadora">
                    
                    <label for="endereco">Endereço</label>
                    <input type="text" value="<?php echo $info_transportadora['endereco']; ?>" name="endereco" id="endereco">
                    
                    <label for="cidade">Cidade</label>
                    <input type="text" value="<?php echo $info_transportadora['cidade']; ?>" name="cidade" id="cidade">
                    
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado">
                        <?php 
                            $estado = $info_transportadora["estadoID"];
                            while($linha = mysqli_fetch_assoc($lista_estados)){
                                $estado_atual = $linha["estadoID"];
                                if ($estado == $estado_atual){    
                        ?>
                            <option value="<?php echo $linha["estadoID"]?>" selected>
                                <?php echo $linha["nome"] ?>
                            </option>

                        <?php 
                                } else {
                        ?>
                            <option value="<?php echo $linha["estadoID"]?>">
                                <?php echo $linha["nome"] ?>
                            </option>
                        <?php 
                                }
                            }                       
                        ?>
                    </select>
                    <input type="hidden" value="<?php echo $info_transportadora['transportadoraID']?>" name="transportadoraID">
                    
                    <input type="submit" value="Excluir">  
                </form>
            </div>
        </main>
        <?php include_once("_incluir/rodape.php"); ?>
</body>
</html>