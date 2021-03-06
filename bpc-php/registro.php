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
        <title>Registro | BPC</title>
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
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="nosotros.php">¿Quienes Somos?</a></li>
            </ul>
            <div class="col-sm-3 col-md-3">
              <form class="navbar-form" role="search" action="busqueda.php" method="post">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar: Titulo, Autor" name="buscar" id="buscar">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                </div>
               </form>
              </div>
             
            </div>
          </div>
        </nav>
       <section class="app-principal">
        <div class="container app-img-principal">
            <img clas="img-responsive" src="img/logo-header.png" alt="BPC">
            <p class="app-desc">Biblioteca Pública Central Estatal "Margarita Maza de Juarez"</p>
        </div>
        <div class="container-fluid app-navegacion">
          <span>
           <ul >
            <h2 class="app-tit-nav">Registrarse</h2>
           </ul>
          </span>
        </div>
       </section>
       <!--inicia Cuerpo-->

       <section class="container">
       <div class="row">
         <div class="col-lg-9 col-md-9">
           <form class="form-horizontal" action="controlUsuario.php" method="post" role="form">
         <fieldset>

         <!-- Form Name -->


        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="nombre">Nombre:</label>  
          <div class="input-group col-md-5">
          <input id="nombre" name="nombre" type="text" placeholder="Escriba aquí su nombre" class="form-control input-md" required><span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
    
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="ap_paterno">Apellido Paterno:</label>  
          <div class="input-group col-md-5">
          <input id="ap_paterno" name="ap_paterno" type="text" placeholder="Escriba aquí su apellido paterno" class="form-control input-md" required><span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
    
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="ap_materno">Apellido Materno:</label>  
          <div class="input-group col-md-5">
          <input id="ap_materno" name="ap_materno" type="text" placeholder="Escriba aquí su apellido materno" class="form-control input-md" required><span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
    
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-4 control-label" for="ap_materno">Perfil:</label>  
          <div class="input-group col-md-5">
          <input id="perfil" name="perfil" type="text" placeholder="Escriba aquí el nombre de perfil que desea" class="form-control input-md" required><span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
    
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="contraseña">Contraseña:</label>
          <div class="col-md-5">
            <input id="contrasenia" name="contrasenia" type="password" placeholder="Escriba aquí una contraseña" class="form-control input-md" required>
            <span class="help-block">La contraseña debe tener mínimo 6 caracteres</span>
          </div>
        </div>
        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="repetir_contrasenia">Confirmar su Contraseña:</label>
          <div class="col-md-5">
            <input id="repetir_contrasenia" name="repetir_contrasenia" type="password" placeholder="Escriba de nuevo su Contraseña" class="form-control input-md" required>
    
          </div>
        </div>
        <div class="form-group">
              <label class="col-md-4 control-label" for="email">Correo Electrónico:</label>
          <div class="col-md-5 input-group" data-validate="email">
            <input type="text" class="form-control" name="email" id="email" placeholder="ingrese su correo electrónico" required>
            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
          </div>
        </div>

                            <!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="dia">Fecha de Nacimiento:</label>
  <div class="col-md-2 separar">
    <select id="dia" name="dia" class="form-control">
      <option value="0">Día</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">...</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
    </select>
  </div>
  <div class="col-md-2 separar">
    <select id="mes" name="mes" class="form-control">
      <option value="1">Enero</option>
      <option value="2">Febrero</option>
      <option value="3">Marzo</option>
      <option value="4">Abril</option>
      <option value="5">Mayo</option>
      <option value="6">Junio</option>
      <option value="7">Julio</option>
      <option value="8">Agosto</option>
      <option value="9">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
    </select>
  </div>
  <div class="col-md-1 separar">
  <input id="anio" name="anio" type="text" placeholder="Año" class="form-control input-md" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="genero">Genero:</label>
  <div class="col-md-2">
    <select id="genero" name="genero" class="form-control">
      <option value="01">Masculino</option>
      <option value="02">Femenino</option>
    </select>
  </div>
</div>
       

        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="boton_registrar"></label>
          <div class="col-md-8">
            <button id="boton_registrar" name="boton_registrar" class="btn btn-registro" type="submit">Registrarse</button>
            <button id="boton_cancelar" name="boton_cancelar" class="btn btn-registro">Cancelar</button>
          </div>
        </div>

        </fieldset>
        </form>
         </div>
         <div class="col-lg-3 col-md-3 hidden-xs">
            <div class="list-group">
               <div class="">
                 <label class="etiqueta-etiqueta" for="">Beneficios</label>
               </div>
               <h4>Descarga de Libros</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat similique accusantium nisi alias eveniet quidem unde sequi vitae, consequatur, veniam aliquam quod, enim beatae labore illo nihil harum inventore quibusdam.</p>
               <h4>Acceso completo a la Biblioteca</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum distinctio dolor ducimus maxime, tenetur quaerat aliquam rem officiis numquam, asperiores ipsa voluptas dicta iusto! Iusto deleniti laborum nesciunt, ut a?</p>
               <h4>Realiza tus comentarios</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus vero magni similique, sed deserunt reiciendis dolores dolorum cumque odio reprehenderit, consectetur, quidem quisquam sunt quas vel. Quis cupiditate recusandae soluta.</p>
            </div>
         </div>
       </div>

        

        
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
