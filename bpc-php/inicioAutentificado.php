<?php 
	require("lib/database.php");
	session_start();
	connect_db();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>inicio | BPC</title>
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
                <li class="active"><a href="inicioAutentificado.php">Inicio</a></li>
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
      <!-- Seccion de libros-->
       <section class="container">
         <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 app-panel">
           
           <?php 
		   $consulta = "SELECT count(*) as megusta, libro.* FROM libro, gusta WHERE libro.idLibro = gusta.idLibro GROUP BY libro.idLibro ";
		 $resultadoLibro = mysql_query($consulta);
		  $conta = 0;
		 
		 while($row = mysql_fetch_array($resultadoLibro))
		{
			 $conta = $conta +1;
			$consultaComentario = "select COUNT(*) as comentarios from comentario, libro where comentario.idLibro = libro.idLibro and libro.idLibro = ".$row["idLibro"]." ORDER by libro.idLibro;";
			$resultadoComentario = mysql_query($consultaComentario);
			$rowComentario = mysql_fetch_array($resultadoComentario);
			
			$consultaEtiqueta = "SELECT etiqueta.nombre from reletiquetalibro, libro, etiqueta WHERE etiqueta.idEtiqueta = reletiquetalibro.idEtiqueta and reletiquetalibro.idLibro = libro.idLibro and reletiquetalibro.idLibro =".$row["idLibro"].";";
			$resultadoEtiqueta = mysql_query($consultaEtiqueta);
		   ?>
           
           <!-- inicia seccion de 1 libro -->
           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 app-grupo">
             <div class="col-xs-12 col-sm-6 col-md-6 app-figura">
               <a href="lecturaAutentificado.php?idLibro=<?php echo $row["idLibro"] ?>">
                 <img class="img-responsive app-img-centrar" data-toggle="tooltip" data-placement="bootom" title="" src=<?php echo $row["portada"] ?> alt="libro">
               </a>
               <div class="col-xs-12 col-md-12 col-lg-12 btn-relleno">
                 <button data-toggle="modal"  data-target="#modal<?php echo $conta; ?>" class="btn btn-antemodal center-block">Sinopsis</button>
               </div>
             </div>
             <div class="hidden-xs col-sm-6 col-md-6 app-grupo-et">
               <p><span class="app-label"><strong>Titulo:</strong> </span><?php echo $row["nombre"] ?></p>
               <p><span class="app-label"><strong>Clasificación:</strong> </span><?php echo $row["categoria"] ?></p>
               <p><span class="app-label"><strong>Autor:</strong></span><?php echo $row["autor"] ?></p>
               <p><span class="app-label"><strong>Puntos:</strong></span><?php echo $row["megusta"] ?></p>
               <p><span class="app-label"><strong>Comentarios:</strong></span><?php echo $rowComentario["comentarios"] ?></p>
             </div>
             <div class="hidden-xs col-sm-11 app-etiquetas">
                <?php
			   while($row2 = mysql_fetch_array($resultadoEtiqueta))
				{
			   ?>
               <span class="label label-etiquetas"><?php echo $row2["nombre"] ?></span>
               
               <?php
				}
			   ?>
             </div>
           </div>
           
              
         
           <!-- line modal -->
              <div class="modal fade" id="modal<?php echo $conta; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span>
                   </button>
                  <h3 class="modal-title" id="lineModalLabel">Sinopsis</h3>
                 </div>
                 <div class="modal-cuerpo">
                    <p><?php echo $row["descripcion"]; ?></p>
                 </div>
                 <div class="modal-footer">
                  <div class="btn-group btn-group-center" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                    <form method="post" action="lecturaAutentificado.php?idLibro=<?php echo $row["idLibro"]; ?>">
                     <button type="submit" class="btn btn-modal" role="button" >Leer</button>
                     </form>
                    </div>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-modal" data-dismiss="modal"  role="button">Cerrar</button>
                  </div>
                 </div>
                </div>
                </div>
               </div>
              </div><!-- end modal -->
           <!-- termina secion de 1 libro -->
             <?php
		}
		?>
           
           </div>
           <!-- lista de etquetas -->
           <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
               <div class="list-group">
               <div class="cont-1">
                 <label class="etiqueta-etiqueta" for="">Etiquetas</label>
               </div>
               <?php
			$consulta = "select * from etiqueta";
		 	$resultadoEtiqueta = mysql_query($consulta);
			
			while($row = mysql_fetch_array($resultadoEtiqueta))
		{
		 ?>
              
              <a href="etiquetaAutentificado.php?nombre=<?php echo $row["nombre"] ?>" class="list-group-item hover-list-group"><?php echo $row["nombre"] ?></a>
              
              <?php
		}
			  ?>
            </div>
            </div>
           <!-- termina lista de etquetas -->
           </div>
         </div>
       </section>
      <!-- Termina Seccion de libros-->

       

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
