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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
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
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2>Estás a punto de hacer la mejor compra del día!</h2>
            <div class="subheading">Éste libro puede cambiar tu vida</div>            
          </div>
        </div>
      </div>
    </div>
  </header>

    <?php
        include('model/conexion.php');

        $idLibro = $_REQUEST['libroAComprar'];
        $carreras = getCarreras();
        $libros = getBookById($idLibro);
    ?>

  <!-- Main Content -->
  <div class="container" id="ventanaCompra">
    <div class="row">
        <!-- Div para mostar tarjeta del libro -->
        <div class="col-lg-5 col-md-4">
            <div class="container">
                <div class="row">
                    <?php foreach($libros as $libro):?>
                    <div class="card-deck" id="books">
                        <div class="card">
                            <img src="img/<?php echo $libro['foto'] ?>" class="card-img-top" alt="<?php echo $libro['foto'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $libro['titulo'] ?></h5>
                                <p class="card-text"><b>Area:</b> <?php echo $libro['Area'] ?></p>
                                <p class="card-text"><b>Estado:</b> <?php echo $libro['Estado'] ?></p>
                                <p class="card-text"><b>Descripción:</b> <?php echo $libro['descripcion'] ?></p>
                                <p class="card-text"><b>Precio:</b> $ <?php echo $libro['precio'] ?> MXN</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <!-- Div formulario para compra -->
      <div class="col-lg-7 col-md-8 my-auto" id="datosCompra">        
        <form id="buyForm" method="POST" novalidate>
            <!-- Libro -->
            <input type="hidden" name="libro" value="<?php echo $idLibro; ?>">
            <!-- Matricula -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Matricula</label>
                    <input type="text" class="form-control" placeholder="Matricula" name="matricula" id="matricula" required data-validation-required-message="Ingresa tu matricula.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <!-- Carrera -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Carrera</label>
                    <select class="form-control col-lg-8" name="carrera" id="carrera" required>
                        <option value="">Carrera...</option>
                        <?php foreach($carreras as $carrera): ?>
                        <option value="<?php echo $carrera['idCarrera'] ?>"><?php echo $carrera['carrera'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <input type="hidden" name="google-response-token" id="google-response-token">
            <!-- Telefono -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Telefono</label>
                    <input type="text" class="form-control col-lg-4" placeholder="Número de telefono" name="telefono" id="telefono" required data-validation-required-message="Ingresa tu número de telefono.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <!-- Email -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required data-validation-required-message="Ingresa tu email.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="button" class="btn btn-primary ml-auto" id="comprarLibro" onclick="comprar()">Comprar Libro</button>
          </div>
        </form>
      </div>
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

  <!-- Llamamos a nuestro archivo javascript -->
  <script src="js/BookStore.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <!-- <script src="js/contact_me.js"></script> -->

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
