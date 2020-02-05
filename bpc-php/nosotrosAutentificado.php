<?php 
	require("lib/database.php");
	connect_db();
	session_start();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Nosotros | BPC</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon.ico">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       <nav class="navbar navbar-personalizado">
          <div class="container">
            <div class="navbar-header">
              <button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar app-bar"></span>
                <span class="icon-bar app-bar"></span>
                <span class="icon-bar app-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-lefth nav-personalizado ">
                <li><a href="inicioAutentificado.php">Inicio</a></li>
                <li class="active"><a href="nosotrosAutentificado.php">¿Quienes Somos?</a></li>
            </ul>
            <div class="col-sm-3 col-md-3">
            <form class="navbar-form" role="search" action="busquedaAutentificado.php" method="post">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar: Titulo, Autor" name="buscar" id="buscar">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                </div>
               </form>
              </div>
              
              
              
              <ul class="nav navbar-nav navbar-right nav-personalizado">
              <li>
              
              
                <div class="app-userActive">
                  <figure class="app-activado">
                    <img src= "<?php echo $_SESSION["imagen"]; ?>" alt="Administrador" class="img img-responsive">
                  </figure>
                  <span><?php echo $_SESSION["usuarioactual"]; ?></span>
                </div>
              </li>
              <li><a href="cerrarSesion.php">Cerrar Sessión</a></li>
            </ul>
              
            </div>
          </div>
        </nav>
       <section class="app-principal">
        <div class="container app-img-principal">
            <img clas="img-responsive" src="img/logo-header.png" alt="BPC">
            <p class="app-desc">Biblioteca Pública Central Estatal "Margarita Maza de Juarez"</p>
        </div>
        <div class="container-fluid app-navegacion">
          <span><ul>
            <li><a href="#">Navegación</a></li>
          </ul></span>
        </div>
       </section>
       <!--inicia Cuerpo-->
       <section class="container">
        <h1>Misión</h1>
        <p>
          Proporciona a la comunidad en general recurso documentales y servicios de información de manera eficiente, libre, gratuita y oportuna, que permita apoyar las tareas sustantivas de docencia, investigación, difusión y extensión del conocimiento y la cultura, así como hacer extensivos estos beneficios a otras bibliotecas de la red estatal
        </p>
        <h1>Visión</h1>
        <p>
          Consolidar la biblioteca pública central como lugar de encuentro y difusión para todas las actividades inherentes a la vida en comunidad, forjando desde allí las herramientas necesarias para la convivencia igualitaria, inclusiva, pacífica  y progresista, fundamentada en el conocimiento para transformar nuestra realidad social con base en un servicio de calidad e eficiencia.
        </p>
        <h1>Objetivo</h1>
        <p>
          Que todos los grupos de población, sin excepción de personas, razas, condición social, física o económica, siempre que lo requieran, y de acuerdo con las necesidades de nuestro entorno, pueden cubrir sus necesidades de lectura, información y recreación a través de un servicio profesional y de calidad, poniendo para ello a su disposición los recursos humanos, materiales, financieros, instalaciones, equipo, colecciones, actividades y talleres con que cuenta la institución.
        </p>
       </section>
       <!--termina Cuerpo-->
        
       

       <footer class="app-footer">
         <div class="container">
           <p>Biblioteca Pública Central Estatal "Margarita Maza De Juarez"</p>
         </div>
       </footer>

 
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script-->
    </body>
</html>
