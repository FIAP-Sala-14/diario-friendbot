<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>CONSULTA AO BANCO</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<!-- Font Awesome 4.7 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="estilo.css"/>
</head>
<body>
    <h1>CONSULTA</h1>

    <div class="container-fluid">

    <!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-primary ">  
<ul class="navbar-nav"> 
<li class="nav-item">      
		<a class="nav-link text-white" href="index.php">Início</a>    
	</li>    
	<li class="nav-item">      
		<a class="nav-link text-white" href="index.php?categoria=desktop">DESKTOP</a>    
	</li>   
	<li class="nav-item">      
		<a class="nav-link text-white" href="index.php?categoria=teclado">TECLADO</a>    
	</li>    
	 
</ul>
</nav>
<Ddiv 

<div class="row">
<?php
include 'conecta_mysql.inc';
//pegar o valor da categoria na url
 
if(isset($_REQUEST['categoria'])) $where = " WHERE categoria = '".$_REQUEST['categoria']."' ";
else $where = '';
//PASSO 2 - MONTAR A CONSULTA
$consulta = "SELECT id_produto,nome_produto,descricao_produto, imagem_produto, categoria,preco  FROM produto $where LIMIT 0,6";
//PASSO 3- EXECUTAR A CONSULTA
$resultado =  mysqli_query($conexao,$consulta);
//PASSO 4 - EXIBIR O RESULTADO
while (list($id_produto,$nome_produto,$descricao_produto,$imagem_produto,$categoria,$preco) = mysqli_fetch_array($resultado)) {
    echo "<div class=\"col-sm-6\"><div class=\"produto\"><h1>$id_produto, $nome_produto</h1> <img src=\"$imagem_produto\" alt=\"$nome_produto\"><p>$descricao_produto</p> <p class=\"preco\">$preco</p></div></div>\n";
} 


?>
 
  
    
 
  </div>
</div>

</body>
</html>