<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Excluir Post</title>
    <link rel="stylesheet" href="../estilo.css"/>
  </head>
  <body>
    <?php include '../conecta_mysql.inc'; ?>  

    <h1><a href='listar.php'>Retornar</a></h1>

    <?php
      if (isset($_REQUEST['botao'])) {
        $id = $_REQUEST['post'];
      
        $strSQL = array();
        $strSQL[] = "DELETE FROM posts";
        $strSQL[] = "WHERE id = $id";
        $strSQL = implode(' ', $strSQL);
      
        $resultado =  mysqli_query($conexao, $strSQL);
            
        if ($resultado==1) echo "<h1>Post [$id] excluido com sucesso!</h1>";
        else echo "<h1>Houve um erro ao executar consulta.</h1><p>String SQL: '$strSQL'</p><p>Retorno: '$resultado'</p>";
      }
    ?>
  </body>
</html>