<?php
	require 'conection.php';
	include 'funcs.php';

	$errors = array();
	
	if(!empty($_POST))
	{
		$nombre = $mysqli->real_escape_string($_POST['nombre']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$con_password = $mysqli->real_escape_string($_POST['con_password']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$activo = 0;
		
		if(isNull($nombre, $password, $con_password, $email))
		{
			$errors[] = "Debe llenar todos los campos";
		}
		
		if(!isEmail($email))
		{
			$errors[] = "Dirección de correo inválida";
		}
		
		if(!validaPassword($password, $con_password))
		{
			$errors[] = "Las contraseñas no coinciden";
		}		
				
		if(emailExiste($email))
		{
			$errors[] = "El correo electronico $email ya existe";
		}
		
		if(count($errors) == 0)
		{
			$sha1_pass = sha1($_POST['password']);
			$db = "tienda";
			$con = mysqli_connect("localhost","root","") or die("Problemas al conectar");
			mysqli_select_db($con, $db)or die("Problemas al conectar la bd");
			mysqli_query($con,"INSERT INTO usuario (nombre, correo, password) VALUES('$_POST[nombre]' ,'$_POST[email]','$sha1_pass')");
			header("location: login.php");
		}
	}
?>

<!DOCTYPE html>
<html lang ="es">
<head>
	<meta charset="utf-8">
	<title>Trébol Negro  &#9752; | Registro</title>
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="shortcut icon" href="images/trebol.ico" />

</head>
<body>
	<!--
	Medidas				Dispositivos
	============================================================
	xs - Extra Small 	Telefonos y MENOS de 768px
	sm - Small 			Tablets y MAS de 768px
	md - Medium			Computadoras y MAS de 992px
	lg - Large			Computadoras, Pantallas y MAS de 1200px
	-->
	<!-- Menú de navegación -->
	<nav class = "navbar navbar-fixed-top navbar-default">
		<div class = "container">
			<div class = "logo col-xs-3 col-xs-offset-3 col-sm-2 col-xs-offset-0 col-md-1 col-md-offset-0">
				<a href="index.html"><img class = "img-responsive" src = "images/logo2.png" alt = ""></a>
			</div>
			
			
			<!-- Header del menú -->
			<div class = "navbar-header">
				<button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#navbar1">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>			
			</div>

			<div class = "menu col-md-6">
				<!-- Links del Menu -->
				<div class = "collapse navbar-collapse" id = "navbar1">
					<ul class="nav navbar-nav">
						<li><a href="index.html">Inicio<i class="home"></i></a></li>
						<li><a href="gallery.html">Fotos<i class="images"></i></a></li>
						<li><a href="videos.html">Videos<i class="videos"></i></a></li>
						<li><a href="music.html">Música<i class="music"></i></a></li>
						<li><a href="shop.html">Productos<i class="shop"></i></a></li>						
					</ul>
				</div>
			</div>
			<div class = "login col-md-2 col-md-offset-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="login.php">Log in<i class="home"></i></a></li>				
				</ul>
			</div>
		</div>
	</nav>

	<!-- Main Body -->
	<div class="container">
			<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Reg&iacute;strate</div>
						<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php">Iniciar Sesi&oacute;n</a></div>
					</div>  
					
					<div class="panel-body" >
						
						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</section>
	<script src =  "js/jquery.js"> </script>
	<script src =  "js/bootstrap.min.js"> </script>
</body>
</html>