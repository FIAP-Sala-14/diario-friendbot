<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <!-- Font Awesome 4.7 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="estilo.css" />
</head>

<body class="container">

    <h1>PIGGY - o porquinho fujão</h1>
    <div>
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo date('d/m/Y \à\s H:i:s');

        ?>
    </div>

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

        <section>
            <form action=""></form>
            <input type="text">
            <button>Busca</button>

        </section>



</body>

</html>