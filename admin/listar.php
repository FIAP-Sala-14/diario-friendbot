<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Page Title</title>
    <link rel="stylesheet" href="../estilo.css"/>
  </head>
  <body>
    <?php include 'menu.php'; ?>   
    <h1>Lista de Posts</h1>
    <?php
      include '../conecta_mysql.inc';
      
      $strSQL = array();
      $strSQL[] = "SELECT id, title, date_created, author, category";
      $strSQL[] = "FROM posts";
      $strSQL[] = "ORDER BY date_created desc";
      
      $strSQL = implode(' ', $strSQL);
      
      $resultado =  mysqli_query($conexao, $strSQL);

      while (list($id, $title, $date_created, $author, $category) = mysqli_fetch_array($resultado)) {
        echo
          "<p><a href='../item.php?post=$id'>$date_created, $author [$category]: $title</a>
            <form method='GET' action='alterar.php?post=$id'>
              <button type='submit' name='change'>Alterar</button>
            </form>
            <form method='GET' action='remover.php?post=$id'>
              <button type='submit' name='remove'>Remover</button>
            </form>
          </p>
          <br>";
      }
    ?>
  </body>
</html>