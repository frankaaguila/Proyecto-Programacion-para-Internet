<?php
	require('conection.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: index.html");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$error = '';
		
		$sha1_pass = sha1($password);
		echo $sha1_pass;
		
		$sql = "SELECT password FROM usuarios WHERE correo = '$usuario' AND password = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['id'];
			
			header("location: index.html");
			} else {
			$error = "Correo o contrasena incorrectos";
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

		<br>
		<br>
		<div class="col-md-3 col-md-offset-5">
			<h2>Ingresa tus datos</h2>
		</div>
		<!--Formulario-->
		<div class="col-md-2 col-md-offset-5">

			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
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
			<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
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
		<br>
		<br>
		<div class="col-md-2 col-md-offset-5">
			<a href="register.php">Registrarse<i class="home">
		</div>

	</section>
	<script src =  "js/jquery.js"> </script>
	<script src =  "js/bootstrap.min.js"> </script>
</body>
</html>