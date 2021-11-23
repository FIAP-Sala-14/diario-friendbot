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
    <link rel="stylesheet" href="../estilo.css" />
  </head>

  <body class="container">
    <?php include '../conecta_mysql.inc'; ?>  
    <header>
      <h1>PIGGY - o porquinho fujão</h1>
      <div>
        <?php
          date_default_timezone_set('America/Sao_Paulo');
          echo date('d/m/Y \à\s H:i:s');
        ?>
      </div>
    </header>

    <div class="container-fluid">
      <nav class="navbar navbar-expand-sm bg-primary ">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="../index.php">Blog Homepage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="listar.php">Listar (admin)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="inserir.php">Criar (admin)</a>
          </li>
        </ul>
      </nav>

      <section class="row">
        <?php          
          $strSQL = array();
          $strSQL[] = "SELECT posts.id, posts.title, posts.date_created, posts.author, posts.category as category_id, cat.name as category_name";
          $strSQL[] = "FROM posts as posts";
          $strSQL[] = "LEFT JOIN post_categories as cat";
          $strSQL[] = "ON posts.category = cat.id";
          $strSQL[] = "ORDER BY date_created desc";
          
          $strSQL = implode(' ', $strSQL);
          
          $resultado =  mysqli_query($conexao, $strSQL);

          while (list($id, $title, $date_created, $author, $category_id, $category_name) = mysqli_fetch_array($resultado)) {
              echo
                "<div class='col-sm-6'>
                  <div>
                    <p><a href='../item.php?post=$id'>$date_created, $author [$category_name]: $title</a></p>
                  </div><div>
                    <form method='POST' action='alterar.php?post=$id'>
                      <button type='submit' name='change'>Alterar</button>
                    </form>
                    <form method='POST' action='excluir_feedback.php'>
                      <input type='hidden' name='post' value='$id'>
                      <button type='submit' name='botao'>Excluir</button>
                    </form>
                  </div>
                </div>";
          }
        ?>
      </section>

      <aside class="publicidade">
        <p>Anúncio</p>
        <img src="../imagens/publicidade.jpg" alt="foto de um gatinho laranja">
      </aside>

    </div>
  </body>
</html>