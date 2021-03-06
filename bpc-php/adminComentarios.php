<?php 
	require("lib/database.php");
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
        <title>Panel de Control Administrador | BPC</title>
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
                 <li>
                   <div class="app-logo">
                  <figure class="app-activado">
                    <img src="img/logo-header.png" alt="Administrador" class="img img-responsive">
                  </figure>
                </div>
                 </li>
                <li><a href="pAdmin.php">Inicio</a></li>
                <li class="dropdown">
                  <a href="agregar.html" class="dropdown-toggle" data-toggle="dropdown">Administrar Libros<b class=" caret careta"></b></a>
                  <ul class="dropdown-menu app-drop-down">
                   <li><a href="agregarLibro.php">Agregar Libro</a></li>
                   <li><a href="adminLibros.php">Lista de Libros</a></li>
                  </ul>
                </li>
                <li class="active"><a href="adminComentarios.php">Administrar Comentarios</a></li>
                <li><a href="inicio.php">Biblioteca</a></li>
                <!--li><a href="adminLibros.html">Notificaciones</a></li-->
            </ul>
            <ul class="nav navbar-nav navbar-right nav-personalizado">
              <li><a href="#">
                <div class="app-userActive">
                  <figure class="app-activado">
                    <img src="img/usuario1.jpg" alt="Administrador" class="img img-responsive">
                  </figure>
                  <span>Efrain</span>
                </div>
              </a></li>
            </ul>
          </div>
        </nav>

           <!--inicia Cuerpo-->
       <div class="container">
       <h1 class="titulos-admin">Comentarios</h1>
         <hr>
    <div class="row col-md-8 col-md-offset-2 table-responsive custyle">
    <table class="table  table-striped custab">
    
    
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Libro</th>
            <th>Fecha</th>
            <th>Comentario</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    
     <?php 
		   $consulta = "SELECT comentario.idComentario, usuario.nombre as usuario, libro.nombre as libro, comentario.fecha, comentario.descripcion from comentario, usuario, libro".
		   " where comentario.idUsuario = usuario.idUsuario and comentario.idLibro = libro.idLibro ";
		 $resultadoLibro = mysql_query($consulta);
		 
		 while($row = mysql_fetch_array($resultadoLibro))
		{
	?>
            <tr>
                <td><?php echo $row["idComentario"]; ?></td>
                <td><?php echo $row["usuario"]; ?></td>
                <td><?php echo $row["libro"]; ?></td>
                <td><?php echo $row["fecha"]; ?></td>
                <td><?php echo $row["descripcion"]; ?></td>
                <td>
                <form class="navbar-form" role="search" action="borrarComentario.php?idComentario=<?php echo $row["idComentario"]; ?> " method="post">
                <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>Borrar</button>
                 </form>
                 </td>
            </tr>
           
           <?php } ?>
    </table>
    </div>
</div>
          <!--termina Cuerpo-->

        
       

       <!--footer class="app-footer">
         <div class="container">
           <p>Biblioteca Pública Central Estatal "Margarita Maza De Juarez"</p>
         </div>
       </footer-->

 
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
