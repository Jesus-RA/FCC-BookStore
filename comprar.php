    <!DOCTYPE html>
    <html lang="en">

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    </head>

    <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
    <a class="navbar-brand" href="index.php">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="comprar.php">Comprar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.html">Iniciar Sesión</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Registrarse</a>
        </li>
        </ul>
    </div>
    </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/books.jpg')">
    <div class="overlay"></div>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
        <div class="site-heading">
            <h2>Encuentra el libro que cambiará tu vida</h2>
        </div>
        </div>
    </div>
    </div>
    </header>

    <?php
        include('model/conexion.php');

        $bd = conectarse();
        $areas = getAreas();
        $libros = getAllBooks();

    ?>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-10 mx-auto form-group" id="areaLibro">
                        <form action="#">
                            <select class="form-control mx-auto col-lg-4" name="area" id="area" class="form-control">
                                <option value="">Area...</option>
                                <?php foreach($areas as $area): ?>
                                <option value="<?php echo $area['idArea'] ?>"><?php echo $area['area'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </form>
                </div>
            </div>
            <div class="row" id="libros">
                
            </div>
        </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p class="copyright text-muted">Copyright &copy; by JRA</p>
        </div>
    </div>
    </div>
    </footer>

    <script src="js/BookStore.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

    </body>

    </html>
