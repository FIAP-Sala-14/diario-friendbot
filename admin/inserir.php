<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Page Title</title>
<link rel="stylesheet" href="../estilo.css"/>
</head>
<body>
<?php include 'menu.php'; ?>      
<h1>INSERIR PRODUTO</h1>
<?php
error_reporting(!E_NOTICE);
//se o botão não for clicado, mostrar o form
if(!$_REQUEST['botao']) { 
?>
<form name="form1" id="form1" method="GET" action="inserir.php">
<label for="nome">Nome do Produto:</label>
<input type="text" name="nome" value="" required />
<br/>
<label for="descricao">Descrição do Produto:</label>
<textarea name="descricao" rows="4" cols="20"></textarea>
<br/>
<label for="categoria">Categoria:</label>
<select name="categoria">
    <option value="desktop">DESKTOP</option>
    <option value="teclado">TECLADO</option>
    <option value="mouse">MOUSE</option>
    <option value="notebook">NOTEBOOK</option>
</select>    
<br/>
<label for="preco">Preço:</label>
<input type="number" name="preco" value="" step="any" required />
<br/>
<input type="submit" name="botao" value="INSERIR PRODUTO"/>
</form>
<?php 
}
else { 
    
    $nome_produto           = $_REQUEST['nome'];
    $descricao_produto      = $_REQUEST['descricao'];
    $categoria              = $_REQUEST['categoria'];
    $preco                  = $_REQUEST['preco'];
    //CONEXÃO COM O BANCO DE DADOS
    //PASSO 1
    $conexao = mysqli_connect("localhost","root", "", "informatica") or die ("A conexão não foi executada com sucesso");
    //PASSO 2 - MONTAR A CONSULTA
    echo $consulta = "INSERT INTO produto (nome_produto, descricao_produto, categoria, preco) VALUES ('$nome_produto', '$descricao_produto', '$categoria', $preco);";
    //PASSO 3- EXECUTAR A CONSULTA
    $resultado =  mysqli_query($conexao,$consulta);

    echo "<h2>PRODUTO INSERIDO COM SUCESSO!</h2><br><a href=\"inserir.php\">VOLTAR</a>";
}
?>

</body>
</html>