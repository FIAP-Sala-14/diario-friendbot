<?php
// obtém os valores digitados
$username = $_REQUEST["username"];
$senha = md5($_REQUEST["senha"]);

// acesso ao banco de dados
include "../conecta_mysql.inc";
$consulta = "SELECT username, password FROM usuario where username='$username'";
$resultado = mysqli_query($conexao,$consulta);
$linhas = mysqli_num_rows($resultado);
if($linhas==0)  // testa se a consulta retornou algum registro
{
	echo "<html><body>";
	echo "<p align=\"center\">Usuário não encontrado!</p>";
	echo "<p align=\"center\"><a href=\"index.html\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
	//echo "SELECT username, password FROM usuario where username='$username' AND password='$senha'";
	$resultado = mysqli_query($conexao,"SELECT username, password FROM usuario where username='$username' AND password='$senha'");	
	list($usuario, $pass) = mysqli_fetch_row($resultado);
	//echo "aqui $usuario, $pass";
   	if ($senha != $pass) // confere senha
	{
		echo "<html><body>";
		echo "<p align=\"center\">A senha está incorreta!</p>";
		echo "<p align=\"center\"><a href=\"index.html\">Voltar</a></p>";
		echo "</body></html>";
	}
	else   // usuario e senha corretos. Vamos criar os cookies
    {
        setcookie("nome_usuario", $username);
        setcookie("senha_usuario", $senha);
        // direciona para a pagina inicial dos usuarios cadastrados
        header ("Location: listar.php");
    }
}
mysqli_close($conexao);
?>

