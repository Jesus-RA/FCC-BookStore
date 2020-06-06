<?php
    include ('keys.php');
    session_start();
?>

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
            <a class="nav-link" href="vender.php">Vender Libro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo "Bienvenido &nbsp;&nbsp;&nbsp;".$_SESSION['usuario'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Cerrar Sesión</a>
            </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/register.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h2>Vender Libro</h2>
            <div class="subheading">Tu libro puede cambiar una vida</div>            
          </div>
        </div>
      </div>
    </div>
  </header>

    <?php
        include('model/conexion.php');
        $areas = getAreas();
        $estados = getEstados();
    ?>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form action="addBook.php" id="sellForm" method="POST" enctype="multipart/form-data" novalidate>
            <!-- Titulo -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Titulo</label>
                    <input type="text" class="form-control" placeholder="Titulo" name="titulo" id="titulo" required data-validation-required-message="Ingresa el titulo de tu libro.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <!-- Area -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Area</label>
                    <select class="form-control col-lg-4" name="area" id="area" required>
                        <option value="">Area</option>
                        <?php foreach($areas as $area): ?>
                        <option value="<?php echo $area['idArea'] ?>"><?php echo $area['area'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <!-- Descripción -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" placeholder="Descripción" required data-validation-required-message="Escribe una descripción sobre tu libro."></textarea>
                <p class="help-block text-danger"></p>
                </div>
            </div>

            <input type="hidden" name="google-response-token" id="google-response-token">
            <!-- Precio -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Precio</label>
                    <input type="number" class="form-control col-lg-4" placeholder="Precio del libro" name="precio" id="precio" min="0" required data-validation-required-message="Ingresa el precio del libro.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <!-- Foto -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Foto del libro</label>
                <input type="FILE" class="form-control" placeholder="Foto del libro" name="foto" id="foto" required>
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <!-- Estado -->
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Estado</label>
                <select class="form-control col-lg-4" name="estado" id="estado" required>
                    <option value="">Estado</option>
                    <?php foreach($estados as $estado): ?>
                    <option value="<?php echo $estado['idEstado']; ?>"><?php echo $estado['estado']; ?></option>
                    <?php endforeach ?>
                </select>
                <p class="help-block text-danger"></p>
                </div>
            </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary ml-auto" id="agregarB" onclick="addBook()">Agregar Libro</button>
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

  <script type="text/javascript">

  </script>
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
