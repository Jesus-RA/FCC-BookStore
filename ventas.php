<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FCC BookStore</title>

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
      <a class="navbar-brand" href="index.php">FCC BookStore</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <?php if($_SESSION['usuario'] == NULL): ?>
            <li class="nav-item">
                <a class="nav-link" href="comprar.php">Comprar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Iniciar Sesión</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Registrarse</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="vender.php">Vender Libro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ventas.php">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo "Bienvenido &nbsp;&nbsp;&nbsp;".$_SESSION['usuario'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Cerrar Sesión</a>
            </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>Gracias por aportar conocimiento a más personas compartiendo la vida de tus libros</h2>
            <span class="subheading"><?php echo $_SESSION['usuario']==NULL ? '!Compra y vende libros ahora¡' : '' ?></span>            
          </div>
        </div>
      </div>
    </div>
  </header>

    <?php 
        include('model/conexion.php');
        if($_SESSION['usuario']){
            $libros = getLibrosVendidos($_SESSION['idUsuario']);
        }
    ?>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
            <?php if($_SESSION['usuario']!=NULL): ?>
                <div class="alert alert-dark col-lg-12 text-center ">Libros vendidos</div>
                <?php foreach($libros as $libro):?>
                <div class="card-deck col-lg-4" id="books">
                    <div class="card" idLibro="<?php echo $libro['idLibro'] ?>">
                        <img src="img/<?php echo $libro['foto'] ?>" class="card-img-top" alt="<?php echo $libro['foto'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $libro['titulo'] ?></h5>
                            <p class="card-text"><b>Area:</b> <?php echo $libro['Area'] ?></p>
                            <p class="card-text"><b>Estado:</b> <?php echo $libro['Estado'] ?></p>
                            <p class="card-text"><b>Descripción:</b> <?php echo $libro['descripcion'] ?></p>
                            <p class="card-text"><b>Precio:</b> $ <?php echo $libro['precio'] ?> MXN</p>
                            <p class="card-text"><b>Estado:</b> <?php echo $libro['vendido']==1 ? 'Vendido' : 'En venta' ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="contactar.php" method="POST">
                              <input type="hidden" class="libroElegido" name="libroVendido">
                              <button type="submit" class="form-control btn-dark editar">Contactar</button>
                            </form>                            
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php if (sizeof($libros)==0):?>
                    <div class="alert alert-warning text-center mx-auto">Aún no has vendido libros.</div>
                <?php endif ?>
            <?php endif ?>
    </div>
  </div>

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
