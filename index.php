<!DOCTYPE html>
<html class="gt-ie8 gt-ie9 not-ie"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SGI Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link rel="icon" href="assets/images/celular.png" type="images/png"/>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

	<!-- Pixel Admin's stylesheets -->
	<link href="assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
	<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->

	<style>
		#signin-demo img { cursor: pointer; height: 40px; }
		#signin-demo img:hover { opacity: .5; }
		#signin-demo div { color: #fff;	font-size: 10px; font-weight: 600; padding-bottom: 6px;	}
	</style>

</head>

<body class="theme-default page-signin">
	
	<div id="page-signin-bg">		
		<div class="overlay"></div>		
		<img src="assets/demo/signin-bg-1.jpg" alt="">
	</div>

	<div class="signin-container">	
		<div class="signin-info">
			<div class="logo">
				<img src="assets/demo/logo-big.png" alt="" style="margin-top: -5px;">&nbsp; SGI Admin
			</div>
			<div class="slogan">
				Sistema de Gestión de Inventario
			</div> 
			<ul>
				<li><i class="fa fa-sitemap signin-icon"></i> Registro de Productos</li>
				<li><i class="fa fa-file-text-o signin-icon"></i> Registro de Salidas</li>
				<li><i class="fa fa-outdent signin-icon"></i> Reportes dinámicos</li>				
			</ul> 
		</div>

		<div class="signin-form">			
			<form action="POST" id="form-login">
				<div class="signin-text">
					<span>Iniciar Sesión</span>
				</div> 
				<div class="form-group w-icon">
					<input type="text" name="usuario" id="usuario" class="form-control input-lg" placeholder="Email" autocomplete="off">
					<span class="fa fa-user signin-form-icon"></span>
				</div> 
				<div class="form-group w-icon">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña">
					<span class="fa fa-lock signin-form-icon"></span>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-block btn-primary" style="padding: 10px 0 10px 0;">
						INGRESAR <span><i class="fa fa-sign-in" style="margin-left: 10px;"></i></span>
					</button>
				</div> 
			</form>				
		</div>		
	</div>

	<div class="not-a-member">
		SGI Admin &copy; Systems 2016 
		<p class="text-center" style="font-size:12px;">Contacto: #938254410 | ealfarogo@gmail.com</p>		
	</div>

<!-- Pixel Admin's javascripts -->
	<script src="assets/javascripts/jquery.min.js"></script>
	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>
	<script src="assets/javascripts/jquery.noty.js"></script>
	<script src="assets/javascripts/bootstrapValidator.min.js"></script>
	<script src="assets/javascripts/validarLogin.js" ></script>

</body>
</html>
