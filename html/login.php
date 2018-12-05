
<?php
	session_start();

	if(isset($_SESSION["id_usuario"])){
		header("Location: index.html");
	}
	if(!empty($_POST))
		{
		$usuario = "francisco.alvarez@alumnos.udg.mx";
		$contrasena = "Frank123";
		$error = "";
		if(($_POST['usuario'] == $usuario) && ($_POST['password'] == $contrasena))
		{
			header("location: index.html");
		}
		else 
		{
			$error = "Correo o contraseña incorrectos";
		}
	}

?>

<!DOCTYPE html>
<html lang ="es">
<head>
	<meta charset="utf-8">
	<title>Trébol Negro  &#9752; | Login</title>
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
	<section class = "main row ">

		
		<!--Formulario-->
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Iniciar Sesi&oacute;n</div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="usuario o email" required>                                        
							</div>
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password" type="password" class="form-control" name="password" placeholder="password" required>
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesi&oacute;n</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tienes una cuenta! <a href="register.php">Registrate aquí</a>
									</div>
								</div>
							</div> 
							<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
			   
						</form>
					</div>                     
				</div>  
			</div>
		</div>
			<!--
			<form action="<?php #$_SERVER['PHP_SELF']; ?>" method="POST" > 
				<br />

				<div><label>Correo:</label><br />

					<div style = "color:#000;"><input id="usuario" name="usuario" type="text" ></div></div>
				<br />
				<div>
					<div style = "color:#000;"><label>Contraseña:</label><input id="password" name="password" type="password"></div>
				</div>
				<br />
				<div><input name="login" type="submit" value="Ingresar"></div> 
			</form> 
			<div style = "font-size:16px; color:#cc0000;"><?php #echo isset($error) ? utf8_decode($error) : '' ; ?></div>
			-->
			<!---
			<form action="<?php #$_SERVER['PHP_SELF']; ?>" method="POST" > 
				<div class="form-group">
					<input class="form-control" type="text" id="correo" placeholder="Correo">
				</div>
				<div class="form-group">
					<input class="form-control" type="text" id="pass" placeholder="Contraseña">
				</div>
				<button class="btn btn-primary" name="login" type="submit" value="login">Iniciar Sesión</button>
			</form>
		-->
		</div>

	</section>
	<script src =  "js/jquery.js"> </script>
	<script src =  "js/bootstrap.min.js"> </script>
</body>
</html>