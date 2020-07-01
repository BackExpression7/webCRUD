<?php
$usuario=$_GET['var'];
$conexion= mysqli_connect ("localhost","root","")or die("no se puede conectar al servidor");
mysqli_select_db($conexion,"manga_db")or die ("No se puede ajjaja");
$consulta1 =mysqli_query($conexion,"select * from users") or die ("fallo en la consulta");
while($users = $consulta1->fetch_assoc())
			{
				if ($users['user_name']==$usuario)
				{
					$id_user=$users['user_id'];
                }	 
            } 
$consulta2 = mysqli_query($conexion, "SELECT * FROM manga") or die ("kappa");
?>

<html>
    <head>
        <title>ReadingHeaven</title>
        <link rel="shortcut icon" href="imagenes/logo3.png">
        <link rel="stylesheet" href="css/desing.css">
        <link rel="stylesheet" href="css/modal.css">
        <script src="js/modal.js"></script>
    </head>
    <body style=" background-color: rgb(226, 130, 21)" onload="cargado()">
    <input type="checkbox" id="btn-nav" class="checkbox" style="display: none;">
        <header>
            <label for="btn-nav" class="btn-label">
            <div class="header-button"></div>
            </label>
            <h1 style="font-size:1.5cm;"><img src="imagenes/logo3.png" alt="logo" style="width: 5rem;">ReadingHeaven</h1>
           <span><img src="imagenes/buscar.png" class="bts">
            <input type ="submit" value="AZ" class="bts"></span>
           <?php echo " <p class='us'>Bienvenido: <br/> $usuario</p>"; ?>
        </header>
        <nav class="menu">
      <ul><br/><br/><br/><br/>
		<li><a href="biblioteca.php?var=<?php echo $usuario ?>">Biblioteca</a></li>
        <li><a href="index.php">Leidos</a></li>
        <li><a href="index.php">Configuracion</a></li>
        <li><a href="../index.php">Log out</a></li>
      </ul>      
        
    </nav>


<div>
   <table align="center">
           <tr>
           <?php while($document = $consulta2->fetch_assoc())
                {?>
               <td>Titilo <?php echo  "<span class='tit'>{$document['manga_title']}</span>";?><br/>
                   Autor: <?php echo  "<span id='autor'>{$document['manga_author']}</span>";?><br/>
                   Genero: <?php echo  "<span id='autor''>{$document['manga_genre']}</span>";?><br/>
                   Total de capitulos: <?php echo  "<span id='autor''>{$document['manga_chapter_tally']}</span>";?><br/>
                   <hr>
                </td>
           </tr>
           <?php } ?>
   </table> 
</div>
    </body>
</html>

?>
