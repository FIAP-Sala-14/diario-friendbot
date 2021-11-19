<?php
//include "valida_cookies.inc";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>REMOÇÃO DE PRODUTO</title>
<link rel="stylesheet" href="../estilo.css"/>
</head>
<body>
<?php include 'menu.php'; ?>  
<h1>REMOVER PRODUTO</h1>
<?php
//se o botão não for clicado, mostrar o form
if(!isset($_REQUEST['botao'])) { 

 echo "VOCÊ NÃO PODE ACESSAR A PÁGINA DIRETAMENTE";

}
else { 
    
    $id_produto           = $_REQUEST['id_produto'];
    //CONEXÃO COM O BANCO DE DADOS
    //PASSO 1
    $conexao = mysqli_connect("localhost","root", "", "informatica") or die ("A conexão não foi executada com sucesso");
    //PASSO 2 - MONTAR A CONSULTA
    echo $consulta = "DELETE FROM produto WHERE id_produto='$id_produto'";
    //PASSO 3- EXECUTAR A CONSULTA
    $resultado =  mysqli_query($conexao,$consulta) or die('Problema na execução da consulta');

    echo "<h2>PRODUTO REMOVIDO COM SUCESSO!</h2><br><a href=\"index.php\">VOLTAR</a>";
}
?>

</body>
</html>