<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Alterar Post</title>
    <link rel="stylesheet" href="../estilo.css"/>
  </head>
  <body>
    <?php include '../conecta_mysql.inc'; ?>  
    <h1>Alterar Post</h1>
    <?php
      //se o botão não for clicado, mostrar o form
      if(!isset($_GET['post'])) { 
        echo "Nenhum post selecionado";
      }
      else {
        
        $strSQL = array();
        $strSQL[] = "SELECT id, title, tags, content, photo, status, date_created, author, category";
        $strSQL[] = "FROM posts";
        $strSQL[] = "WHERE id = " . $_GET['post'];
        $strSQL = implode(' ', $strSQL);
        
        $resultado =  mysqli_query($conexao, $strSQL);

        list($id, $title, $tags, $content, $photo, $status, $date_created, $author, $category) = mysqli_fetch_array($resultado);
      }
    ?>

    <form name="change" id="change" method="POST" action="alterar_feedback.php">

      <label for="title">Título:</label>
      <input type="text" name="title" value="<?php echo $title; ?>" required />

      <br/>

      <label for="tags">Tags:</label>
      <input type="text" name="tags" value="<?php echo $tags; ?>" required />

      <br/>

      <label for="content">Conteúdo:</label>
      <textarea name="content" rows="30" cols="80">
        <?php echo $content; ?>
      </textarea>

      <br/>

      <label for="imagem_produto">Imagem:</label>
      <input type="text" name="photo" value="<?php echo $photo; ?>" required width="200" />

      <br/>

      <label for="category">Categoria:</label>
      <select name="category">
        <?php
          $strSQL = array();
          $strSQL[] =  "SELECT id, name";
          $strSQL[] = "FROM post_categories";
          $strSQL[] = "ORDER BY name";
          $strSQL[] = "LIMIT 10";
          $strSQL = implode(' ', $strSQL);
          
          $categories =  mysqli_query($conexao, $strSQL);

          while (list($cat_id, $cat_name) = mysqli_fetch_array($categories)) {
            if ($cat_name == $category) echo "<option value='$cat_id' selected>$cat_name</option>";
            else echo "<option value='$cat_id'>$cat_name</option>";
          }
        ?>
      </select>

      <br/>

      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="submit" name="botao" value="Alterar"/>
    </form>
  </body>
</html>