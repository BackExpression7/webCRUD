<!DOCTYPE html>
<html lang="en">
<head>
<title>ReadingHeaven.com</title>
<link rel="shortcut icon" href="dispag/imagenes/logo3.png">
<link rel="stylesheet" href="dispag/css/disindex.css">
</head>
<body background="dispag/imagenes/fondo1.jpg">
<header>
		<a href="index.php"> <h1 style="color:#FFFFFF; font-size:1.5cm;";>  <IMG SRC="dispag/imagenes/logo3.png" alt="titulo" width="80" height="80"></a>  ReadingHeaven.com </h1>
	</header><br/>
    <div class="log">
	<br/>
    <h1 style="color:#FFFFFF";>Iniciar Sesion</h1>
    <h2 style="color:#FFFFFF";>Ingrese usuario y contraseña</h2>
	<form action="index.php" method="POST" class="formulario" name="login">
    <p style="color:#FFFFFF";>Usuario:<INPUT TYPE="text" NAME="usuario" id="usuario"></p>
    <p style="color:#FFFFFF";>Contraseña:<INPUT TYPE="password" NAME="cont1" id="cont1"></p>
        <INPUT TYPE="submit" VALUE="Entra" class="bts">
        </form>
	<p style="color:#FFFFFF";>¿no tienes cuenta? <a href="dispag/reg_clie.php"> registrarse</a></p>
    </div>
    </body>
</html>
<?php 
	$conexion= mysqli_connect ("localhost","root","")or die("no se puede conectar al servidor");
	mysqli_select_db($conexion,"manga_db")or die ("No se puede ajjaja");
	$consulta1 =mysqli_query($conexion,"select * from users") or die ("fallo en la consulta");
	if (isset($_POST['usuario']))
	{
	$usuario= $_POST['usuario'];
	$cont1= $_POST['cont1'];
	$cont1= md5($cont1);
	$advert="la contraseña o el Usuario no coinciden";
	while($opciones =$consulta1->fetch_assoc())
	{
		if ($opciones['user_name']==$usuario)
		{
			if($opciones['user_password']==$cont1)
			{
				header("Status: 301 Moved Permanently");
				header("Location: dispag/principal.php?var=$usuario");
			}
		}
	}
	?><p style="color:#FFFFFF";><?php echo $advert; ?></p><?php
	}
?>