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
$consulta2 =mysqli_query($conexion,"select reading.current_chapter,reading.score, reading.read_status,manga.manga_title,manga.manga_author,manga.manga_genre,manga.manga_chapter_tally FROM reading INNER JOIN manga ON reading.manga_id=manga.manga_id WHERE reading.user_id =$id_user;") or die ("fallo en la consulta");
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
		<li><a href="index.php">biblioteca</a></li>
        <li><a href="index.php">leidos</a></li>
        <li><a href="index.php">configuracion</a></li>
        <li><a href="../index.php">Log out</a></li>
      </ul>      
        
    </nav>
    <a href="#" onclick="modale()"><img src="imagenes/mas.png" alt="añadir" class="mas"></a>

    <div id="modal1" class="modal">
            <div class="flex" id="flex">
                <div class="contenido-modal">
                    <div class="modal-header">
                        <h2 align="center">Ingrese su nuevo libro</h2>
                    </div>
                    <div class="modal-body" align="center">
                    <form method="POST">
                        Titulo :<input type="text" name="title" id="n1"></br>
                        Autor :<input type="text" name="author" id="n2"></br>
                        Genero:<input type="text" name="genre" id="n3"></br>
                        Numero de capitulos <input type="text" name="chapNumber" id="n4"></br></br> 
                        <input type="submit" class="enviar">
                    </form>
                    </div>
                    <div class="footer">
                    <input type="submit" class="close" id="close1" value="Cancelar" onclick="cerrar()">
                    </div>
                </div>
            </div>
        </div>
<div>
   <table align="center">
           <tr>
           <?php while($document = $consulta2->fetch_assoc())
                {?>
               <td><?php echo  "<span class='tit'>{$document['manga_title']}</span>";?><br/>
                   Autor: <?php echo  "<span id='autor'>{$document['manga_author']}</span>";?><br/>
                   Genero: <?php echo  "<span id='autor''>{$document['manga_genre']}</span>";?><br/>
                   total de capitulos: <?php echo  "<span id='autor''>{$document['manga_chapter_tally']}</span>";?><br/>
                   capitulos leidos: <?php echo  "<span id='autor''>{$document['current_chapter']}</span>";?><br/>
                   calificacion: <?php echo  "<span id='autor''>{$document['score']}";?> Estrellas ☆</span><br/>
                   Estado de  lectura: <?php echo  "<span id='autor''>{$document['read_status']}</span>";?>
                </td>
               <td>
                   <a href="#" onclick="opciones()"><img src="imagenes/menu.png" alt="opciones" class="bts" ></a>
               </td>
           </tr>
           <?php } ?>
   </table> 
</div>
    </body>
</html>



<?php
if (isset($_POST['n1']))
{
	$n1 = $_POST['n1'];
	$n2 = $_POST['n2'];
	$n3 = $_POST['n3'];
	$n4 = $_POST['n3'];
		if($n1==NULL||$n2==NULL||$n3==NULL||$n4==NULL){
			?>
			  <p style="color:#FFFFFF";><?php echo "No debe dejar datos sin rellenar"; ?></p>
			  <?php
		}else{
    $consulta1 = mysqli_query($conexion,"INSERT INTO manga(manga_title,manga_author,manga_genre,manga_chapter_tally) VALUES ('$n1','$n2','$n3','$n4')") or die ("fallo en la subida de datos");
    $consulta2 = mysqli_query($conexion,"INSERT INTO reading (user_id, manga_id, current_chapter, score, read_status) VALUES ('$id_user', '{$document['manga_id']}', '{$document['current_chapter']}', '{$document['score']}', '{$document['read_status']}')")or die ("fallo en la subida de datos");
 	}
}
?>
