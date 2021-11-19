<?php
if(isset($_COOKIE["nome_usuario"]))
    $nome_usuario = $_COOKIE["nome_usuario"];
if(isset($_COOKIE["senha_usuario"]))
    $senha_usuario = $_COOKIE["senha_usuario"];

if(!(empty($nome_usuario) OR empty($senha_usuario)))
{
    include "../conecta_mysql.inc";
	$resultado = mysqli_query($conexao, "SELECT username,password FROM usuario WHERE username='$nome_usuario' AND password = '$senha_usuario' ");
	if(mysqli_num_rows($resultado)==1)
	{
        list($usuario, $pass) = mysqli_fetch_row($resultado);
		if($senha_usuario != $pass)
		{   
            //remover os cookies da maquina do usuario
            setcookie("nome_usuario");
            setcookie("senha_usuario");
            echo "Você não efetuou o LOGIN!";
            exit;
        }
    }
    else
    {
        setcookie("nome_usuario");
        setcookie("senha_usuario");
        echo "Você não efetuou o LOGIN!";
        exit;
    }
}
else
{
    echo "Você não efetuou o LOGIN!";
    exit;
}

mysqli_close($conexao);
?>

