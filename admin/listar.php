<?php
//include "valida_cookies.inc";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Page Title</title>
<link rel="stylesheet" href="../estilo.css"/>
</head>
<body>
<?php include 'menu.php'; ?>   
<h1>LISTAGEM DE PRODUTOS</h1>
<?php
//CONEXÃO COM O BANCO DE DADOS
include '../conecta_mysql.inc';
//PASSO 2 - MONTAR A CONSULTA
$consulta = "SELECT id_produto,nome_produto,descricao_produto,categoria,preco FROM produto";
//PASSO 3- EXECUTAR A CONSULTA
$resultado =  mysqli_query($conexao,$consulta);
//PASSO 4 - EXIBIR O RESULTADO
            while (list($id_produto,$nome_produto) = mysqli_fetch_array($resultado)) {
    echo "<h2>$id_produto - $nome_produto - <a href=\"alterar.php?id_produto=$id_produto&botao=1\">ALTERAR</a> - <form name=\"form\" method=\"POST\" action=\"remover.php\"><input type=\"hidden\" name=\"id_produto\" value=\"$id_produto\"><input type=\"submit\" name=\"botao\" value=\"REMOVER\"></form></h2><br>\n";
} 

?>
</body>
</html>