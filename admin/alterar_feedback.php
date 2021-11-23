<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Alterar Post</title>
    <link rel="stylesheet" href="../estilo.css"/>
  </head>
  <body>
    <?php include '../conecta_mysql.inc'; ?>  

    <h1><a href='listar.php'>Retornar</a></h1>

    <?php
      $id =           $_REQUEST['id'];
      $new_title =    $_REQUEST['title'];
      $new_tags =     $_REQUEST['tags'];
      $new_content =  $_REQUEST['content'];
      $new_photo =    $_REQUEST['photo'];
      $new_category = $_REQUEST['category'];

      $strSQL = array();
      $strSQL[] = "UPDATE posts";
      $strSQL[] = "SET title = '$new_title', tags = '$new_tags', content = '$new_content', photo = '$new_photo', category = $new_category";
      $strSQL[] = "WHERE id = $id";
      $strSQL = implode(' ', $strSQL);

      $resultado =  mysqli_query($conexao, $strSQL);
      
      if ($resultado==1) echo "<h1>Post [$id] '$new_title' alterado com sucesso!</h1>";
      else echo "<h1>Houve um erro ao executar consulta.</h1><p>String SQL: '$strSQL'</p><p>Retorno: '$resultado'</p>";
    ?>
  </body>
</html>