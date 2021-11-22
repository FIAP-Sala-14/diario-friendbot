<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Projeto Friendbot</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css" />
  </head>

  <body class="container">
    <header>
      <h1>PIGGY - o porquinho fujão</h1>
      <div>
        <?php
          date_default_timezone_set('America/Sao_Paulo');
          echo date('d/m/Y \à\s H:i:s');
        ?>
      </div>
    </header>

    <nav class="container-fluid">
      <nav class="navbar navbar-expand-sm bg-primary ">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Início</a>
          </li>
          <?php
          include 'conecta_mysql.inc';
          
          $strSQL =  "SELECT id, name ";
          $strSQL .= "FROM post_categories ";
          $strSQL .= "ORDER BY name ";
          $strSQL .= "LIMIT 10";
          
          $categories =  mysqli_query($conexao, $strSQL);

          while (list($id, $name) = mysqli_fetch_array($categories)) {
            echo
              "<li class='nav-item'>
                <a class='nav-link text-white' href='busca.php?category=$id'>$name</a>
              </li>";
            }
          ?>
        </ul>
      </nav>

      <section class="row">
        <?php
          include 'conecta_mysql.inc';
          
          $strSQL = array();
          $strSQL[] = "SELECT id, title, tags, CONCAT('<p>', REPLACE(content,'\\n','</p><p>'), '</p>') as content, photo, status, date_created, author, category";
          $strSQL[] = "FROM posts";
          $strSQL[] = "WHERE id = " . $_GET['post'];
          
          $strSQL = implode(' ', $strSQL);
          
          $resultado =  mysqli_query($conexao, $strSQL);
          list($id, $title, $tags, $content, $photo, $status, $date_created, $author, $category) = mysqli_fetch_array($resultado);

          echo
            "<div>
              <h1><a href='item.php?post=$id'>$title</a></h1>
              <a href='item.php?post=$id'><img src='./imagens/$photo'></a>
              <p>Criado em $date_created por $author. Categoria: $category</p>
            </div>
            <p>$content</p>
            <p>Tags: $tags</p>";
        ?>
      </section>

      <aside class="publicidade">
        <img src="./imagens/publicidade.jpg" alt="foto de um gatinho laranja">
      </aside>

    </div>
  </body>
</html>