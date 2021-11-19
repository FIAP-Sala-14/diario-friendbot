<?php
//include "valida_cookies.inc";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>ALTERAR PRODUTO</title>
<link rel="stylesheet" href="../estilo.css"/>
</head>
<body>
<?php include 'menu.php'; ?>  
<h1>ALTERAR PRODUTO</h1>
<?php
//se o botão não for clicado, mostrar o form
if(!isset($_REQUEST['botao'])) { 
    echo "VOCÊ NÃO PODE ACESSAR A PÁGINA DIRETAMENTE";

}
else { 
    
    if(!isset($_REQUEST['valida'])) {
            $id_produto = $_REQUEST['id_produto'];
            //PASSO 1
            $conexao = mysqli_connect("localhost","root", "", "informatica") or die ("A conexão não foi executada com sucesso");
            //PASSO 2 - MONTAR A CONSULTA
            echo $consulta = "SELECT id_produto,nome_produto,descricao_produto,imagem_produto,categoria,preco FROM produto WHERE id_produto='$id_produto'";
            //PASSO 3- EXECUTAR A CONSULTA
            $resultado =  mysqli_query($conexao,$consulta);
            list($id_produto,$nome_produto,$descricao_produto,$imagem_produto,$categoria,$preco) = mysqli_fetch_array($resultado);



        ?>

            <form name="form1" id="form1" method="POST" action="alterar.php">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" value="<?php echo $nome_produto; ?>" required />
        <br/>
        <label for="descricao">Descrição do Produto:</label>
        <textarea name="descricao" rows="4" cols="20">
            <?php echo $descricao_produto; ?>
        </textarea>
        <br/>
        <label for="imagem_produto">Imagem do Produto:</label>
        <input type="text" name="imagem_produto" value="<?php echo $imagem_produto; ?>" required width="200" />
        <br/>
        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php echo "<option value=\"$categoria\" selected>$categoria</option>"; ?>
            <option value="desktop">DESKTOP</option>
            <option value="teclado">TECLADO</option>
            <option value="mouse">MOUSE</option>
            <option value="notebook">NOTEBOOK</option>
        </select>    
        <br/>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" value="<?php echo $preco; ?>" step="any" required />
        <br/>
        <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">
        <input type="hidden" name="valida" value="1">
        <input type="submit" name="botao" value="ALTERAR PRODUTO"/>
        </form>

<?php
    }
    else {
        //echo $_SERVER['HTTP_REFERER'];
            //echo "VAMOS AGORA FAZER A VERDADEIRA ATUALIZAÇÃO";
            $id_produto        = $_REQUEST['id_produto'];
            $nome_produto      = $_REQUEST['nome'];
            $descricao_produto = $_REQUEST['descricao'];
            $imagem_produto = $_REQUEST['imagem_produto'];
            $categoria         = $_REQUEST['categoria'];
            $preco             = $_REQUEST['preco'];
            //PASSO 1
            $conexao = mysqli_connect("localhost","root", "", "informatica") or die ("A conexão não foi executada com sucesso");
            //PASSO 2 - MONTAR A CONSULTA
            echo $consulta = "UPDATE produto SET nome_produto = '$nome_produto', descricao_produto = '$descricao_produto', imagem_produto = '$imagem_produto', categoria = '$categoria', preco = $preco WHERE id_produto='$id_produto'";
            //PASSO 3- EXECUTAR A CONSULTA
            $resultado =  mysqli_query($conexao,$consulta);

            echo "<h2>PRODUTO ALTERADO COM SUCESSO!</h2><br><a href=\"listar.php\">VOLTAR</a>";
    }
//fechamento do else
}
?>
</body>
</html>