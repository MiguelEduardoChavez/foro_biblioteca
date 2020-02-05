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
        <title>leyendo | BPC</title>
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
                <li><a href="nosotrosAutentificado.php">¿Quienes Somos?</a></li>
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
              
              <ul class="nav navbar-nav navbar-right nav-personalizado"><!--
              <li>
              	<a href="configuracionUsuario.html">Configuración</a>
              </li> -->
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
        
        <?php 
		  $consulta = "SELECT  libro.* FROM libro WHERE libro.idLibro = ".$_REQUEST["idLibro"];
		 $resultadoLibro = mysql_query($consulta);
		 $fila = mysql_fetch_row($resultadoLibro);
		 ?>
     
       <!--inicia Cuerpo-->
<!--Descripción de el libro-->
<section class="container panel-shadow ">
 <div class="row">
   <div class="col-xs-12">
     <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
       <a href="#">
        <img class="img-responsive app-img-centrar" data-toggle="tooltip" data-placement="bootom" title="" src="<?php echo $fila[8]?>" alt="libro">
       </a>
       
       
       <div class="col-xs-12 col-md-12 col-lg-12 btn-relleno">
       <form class="navbar-form" role="search" action="<?php echo $fila[10]?>" method="post">
          <button class="btn btn-antemodal center-block gly glyphicon glyphicon-book"> LEER</button>
          </form>
       </div>
     </div>
     <?php
		 
		  $consultaGusta = "SELECT count(*) as megusta, libro.* FROM libro, gusta WHERE  gusta.idLibro = libro.idLibro and libro.idLibro = ".$_REQUEST["idLibro"];
		 $resultadoGusta = mysql_query($consultaGusta);
		 $rowGusta = mysql_fetch_array($resultadoGusta);
		 
		 $consultaComentario = "select COUNT(*) as comentarios from comentario, libro where comentario.idLibro = libro.idLibro and libro.idLibro = ".$_REQUEST["idLibro"]." ORDER by libro.idLibro;";
		 $resultadoComentario = mysql_query($consultaComentario);
		 $rowComentario = mysql_fetch_array($resultadoComentario);
		 ?>
     <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 descripcion-libro">
       <p><span class="app-label"><strong class="descripcion-libro">Titulo:</strong> </span><?php echo $fila[1]; ?></p>
       <p><span class="app-label"><strong class="descripcion-libro">Clasificación:</strong> </span><?php echo $fila[6]; ?></p>
       <p><span class="app-label"><strong class="descripcion-libro">Autor:</strong></span><?php echo $fila[2]; ?></p>
       <p><span class="app-label"><strong class="descripcion-libro">Puntos: </strong></span><?php echo $rowGusta["megusta"] ?><span class="glyphicon glyphicon-ok"></span></p>
       <p><span class="app-label"><strong class="descripcion-libro">Comentarios:</strong></span><?php echo $rowComentario["comentarios"] ?></p>
       <form class="navbar-form" role="search" action="quitarPunto.php?idLibro=<?php echo $_REQUEST["idLibro"]; ?> " method="post">
       <p><button class="btn  pull-left boton-comentar"  type="submit">Quitar Punto</button></p>
       
       </form>
       
       <form class="navbar-form" role="search" action="darPunto.php?idLibro=<?php echo $_REQUEST["idLibro"]; ?> " method="post">
       <p><button class="btn  pull-left boton-comentar"  type="submit">Dar Punto</button></p>
       </form>
     </div>
   </div>
   <hr>
 </div>
 <br>
   <!--Sinopsis-->
   <div class="container">
     <div class="row">
       <div class="col-md-12 cuadro-sinopsis">
         <p><?php echo $fila[7]; ?></p>
       </div>
     </div>
   </div>
</section>
<!--Termina descripción de el libro-->
<hr>
<section>
<!-- COMENTARIO -->
  <div class="container">
        <div class="row">
         <div class="col-lg-12">
           <div class="well well-lg">
              <div class="media1">
                <div class="media-body">                                
                  <div class="form-group comentario">
                  <form class="navbar-form" role="search" action="comentario.php?idLibro=<?php echo $_REQUEST["idLibro"]; ?> " method="post">
                    <textarea class="form-control animated" placeholder="Escribe un comentario" name="comentario"></textarea>
                    <button class="btn  pull-right boton-comentar"  type="submit">Comentar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
    </div>
    <!-- Termina el Comentario -->
    <?php 
		   $consulta = "SELECT comentario.descripcion, comentario.fecha, usuario.nombre, usuario.imagen FROM libro, usuario,".
		   " comentario WHERE comentario.idUsuario = usuario.idUsuario and libro.idLibro = comentario.idLibro and libro.idLibro = ".$_REQUEST["idLibro"].";";
		 $resultadoLibro = mysql_query($consulta);
		 
		 while($row = mysql_fetch_array($resultadoLibro))
		{
		 ?>
         
    <div class="col-sm-12">
            <div class="panel panel-white post panel-shadow ">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="<?php echo $row["imagen"] ?>" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <b><?php echo $row["nombre"] ?></b>
                        </div>
                        <h6 class="text-muted time"><?php echo $row["fecha"] ?></h6>
                    </div>
                </div> 
                <div class="post-description"> 
                	<br><br>
                    <p><?php echo $row["descripcion"] ?></p>
                   
                </div>
            </div>
    </div>
    <?php } ?>
    
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
