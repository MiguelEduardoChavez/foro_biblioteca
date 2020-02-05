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
                <li class="dropdown active">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar Libros<b class=" caret careta"></b></a>
                  <ul class="dropdown-menu app-drop-down">
                   <li><a href="agregarLibro.php">Agregar Libro</a></li>
                   <li><a href="adminLibros.php">Lista de Libros</a></li>
                  </ul>
                </li>
                <li><a href="adminComentarios.php">Administrar Comentarios</a></li>
                <li><a href="inicio.php">Biblioteca</a></li>
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
       <h1 class="titulos-admin">Tabla de Libros</h1>
         <hr>
    <div class="row col-md-8 col-md-offset-2 table-responsive custyle">
    <table class="table  table-striped custab">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Categoria</th>
            <th># Páginas</th>
            <th>Idioma</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    
     <?php 
		   $consulta = "SELECT * FROM libro";
		 $resultadoLibro = mysql_query($consulta);
		 
		 while($row = mysql_fetch_array($resultadoLibro))
		{
	?>
            <tr>
                <td><?php echo $row["idLibro"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["autor"]; ?></td>
                <td><?php echo $row["editorial"]; ?></td>
                <td><?php echo $row["categoria"]; ?></td>
                <td><?php echo $row["numeroPaginas"]; ?></td>
                <td><?php echo $row["idioma"]; ?></td>
                <td class="text-center">
                
                
                <button class='btn btn-info btn-xs' data-toggle="modal"  data-target="#modal1"><span class="glyphicon glyphicon-edit"></span> Actualizar</button>
                <form class="navbar-form" role="search" action="eliminarLibro.php?idLibro=<?php echo $row["idLibro"]; ?> " method="post">
                	<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>Borrar</button>
                </form>
                
                 </td>
            </tr>
			
	 <?php }?>
           
    </table>
    </div>
</div>
          <!--termina Cuerpo-->

           <!-- line modal -->
              <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span>
                   </button>
                  <h3 class="modal-title" id="lineModalLabel">Editar</h3>
                 </div>
                 <div class="modal-cuerpo">
                         <form class="form-horizontal">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinputitulo">Titulo:</label>  
  <div class="input-group col-md-5">
  <input id="textinputitulo" name="textinputitulo" type="text" placeholder="Ingrese el titulo del libro" class="form-control" required>
  <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="autor">Autor:</label>  
  <div class="input-group col-md-5">
  <input id="autor" name="autor" type="text" placeholder="Ingrese el autor del libro" class="form-control input-md" required>
            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="editorial">Editorial:</label>  
  <div class="input-group col-md-5">
  <input id="editorial" name="editorial" type="text" placeholder="Ingrese la editorial del libro" class="form-control input-md" required>
            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 col-xs-12 col-sm-10 control-label" for="categorias">Categoría:</label>
  <div class="col-md-4">
    <select id="categorias" name="categorias" class="form-control">
      <option value="1">Historia</option>
      <option value="2">Cultura</option>
    </select>
  </div>
  <div class="col-md-1 col-sm-2">
    <button data-toggle="modal"  data-target="#modal1" class="btn btn-antemodal center-block">Agregar</button>
  </div>
</div>
 <!-- line modal -->
              <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span>
                   </button>
                  <h3 class="modal-title" id="lineModalLabel">Agregar Categoria</h3>
                 </div>
                 <div class="modal-cuerpo">
  <input id="agregar-categoria" name="agregar-categoria" type="text" placeholder="Ingrese la editorial del libro" class="form-control input-md" required>
                    
                 </div>
                 <div class="modal-footer">
                  <div class="btn-group btn-group-center" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                     <button type="button" class="btn btn-modal" role="button">Guardar</button>
                    </div>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-modal" data-dismiss="modal"  role="button">Cerrar</button>
                  </div>
                 </div>
                </div>
                </div>
               </div>
              </div><!-- end modal -->
<!-- etiquetas -->
 <!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="etiquetas">Etiquetas:</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="etiquetas-0">
      <input type="checkbox" name="etiquetas" id="etiquetas-0" value="1">
      Historia
    </label>
  </div>
  <div class="checkbox">
    <label for="etiquetas-1">
      <input type="checkbox" name="etiquetas" id="etiquetas-1" value="2">
      Cultura
    </label>
  </div>
  </div>
</div>
<!-- Text input-->
    <div class="form-group">
              <label class="col-md-4 control-label" for="validate-number" >Numero de Páginas:</label>
          <div class="input-group col-md-5" data-validate="number">
            <input type="text" class="form-control input-md" name="validate-number" id="validate-number" placeholder="Ingrese el numero de páginas del libro" required>
            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
          </div>
        </div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="idioma">Idioma:</label>  
  <div class="input-group col-md-5">
  <input id="idioma" name="idioma" type="text" placeholder="Ingrese el Idioma" class="form-control input-md">
    
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sinopsis">Sinopsis:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="sinopsis" name="sinopsis"></textarea>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="link">Link:</label>  
  <div class="input-group col-md-5">
  <input id="link" name="link" type="text" placeholder="Ingrese el link" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
 <!-- image-preview-filename input [CUT FROM HERE]-->
 <div class="form-group">
  <label class="col-md-4 control-label" for="archivo">Seleccionar Portada:</label>
    <div class="col-md-5 input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Borrar
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Abrir</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                    </div>
                </span>
            </div> 
 </div><!-- /input-group image-preview [TO HERE]-->
           
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="archivo">Seleccionar Archivo</label>
  <div class="col-md-4">
    <input id="archivo" name="archivo" class="input-file" type="file">
  </div>
</div>

</fieldset>
</form>
                 </div>
                 <div class="modal-footer">
                  <div class="btn-group btn-group-center" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                     <button type="button" class="btn btn-modal" role="button">Aceptar</button>
                    </div>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-modal" data-dismiss="modal"  role="button">Cancelar</button>
                  </div>
                 </div>
                </div>
                </div>
               </div>
              </div><!-- end modal -->
        
       

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
