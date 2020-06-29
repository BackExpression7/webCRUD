<html>
    <head>
	<link rel="stylesheet" href="css/disindex.css">
			<title>ReadingHeaven.com</title>
			<link rel="shortcut icon" href="imagenes/logo3.png">
    </head>
    <body background="imagenes/fondo1.jpg">
	<header>
		<a href="../index.php"> <h1 align = "left" style="color:#FFFFFF; font-size:1.5cm;";>  <IMG SRC="imagenes/logo3.png" alt="titulo" width="80" height="80"></a>ReadingHeaven.com </h1>
	</header><br/>
    <div class="log">
	<br/><br/>
    <h1 style="color:#FFFFFF";>Crea tu cuenta</h1>
	<form action="reg_clie.php" method="POST" class="formulario" name="login">
	<p style="color:#FFFFFF";>Usuario: <INPUT TYPE="text" NAME="usuario" id= "usuario"></p>
    <p style="color:#FFFFFF";>Contraseña:<INPUT TYPE="password" NAME="cont1" id= "cont1"></p>
	<p style="color:#FFFFFF";>Confirmar Contraseña:<INPUT TYPE="password" NAME="cont2"></p></tr></td>
	<tr align = center><td align = center>
        <INPUT TYPE="submit" VALUE="Todo Listo" class="bts">
        </form>
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
	$cont2=$_POST['cont2'];
	$advert="las contraseñas no coinciden";
	   if($cont1!=$cont2)
		{	
			?>
			  <p style="color:#FFFFFF";><?php echo $advert; ?></p>
			  <?php
		}else{
		if($usuario==NULL||$cont1==NULL){
			?>
			  <p style="color:#FFFFFF";><?php echo "No debe dejar datos sin rellenar"; ?></p>
			  <?php
		}else{
	$cont1=md5($cont1);
    $consulta1 = mysqli_query($conexion,"INSERT INTO users(user_name ,user_password) VALUES ('$usuario','$cont1')") or die ("fallo en la subida de datos");
	header("Status: 301 Moved Permanently");
	header("Location: ../index.php");
		}
	}
}
?>

