<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Criar Post</title>
    <link rel="stylesheet" href="../estilo.css"/>
  </head>
  <body>
    <?php include '../conecta_mysql.inc'; ?>  

    <h1><a href='listar.php'>Retornar</a></h1>

    <?php
    
      $title =          $_REQUEST['title'];
      $tags =           $_REQUEST['tags'];
      $content =        $_REQUEST['content'];
      $photo =          $_REQUEST['photo'];
      $status =         $_REQUEST['status'];
      $date_created =   $_REQUEST['date_created'];
      $author =         $_REQUEST['author'];
      $category =       $_REQUEST['category'];

      $strSQL = array();
      $strSQL[] = "INSERT INTO posts(title, tags, content, photo, status, date_created, author, category)";
      $strSQL[] = "VALUES('$title', '$tags', '$content', '$photo', '$status', '$date_created', '$author', '$category')";
      $strSQL = implode(' ', $strSQL);

      $resultado =  mysqli_query($conexao, $strSQL);
      
      if ($resultado==1) echo "<h1>Post '$title' criado com sucesso!</h1>";
      else echo "<h1>Houve um erro ao executar consulta.</h1><p>String SQL: '$strSQL'</p><p>Retorno: '$resultado'</p>";
    ?>
  </body>
</html>