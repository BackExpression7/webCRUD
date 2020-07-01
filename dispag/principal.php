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
$consultaco = mysqli_query($conexion,"select reading.current_chapter,reading.score, reading.read_status,manga.manga_title,manga.manga_author,manga.manga_genre,manga.manga_chapter_tally FROM reading INNER JOIN manga ON reading.manga_id=manga.manga_id WHERE reading.user_id = $id_user ORDER BY manga.manga_title ASC;") or die ("fallo en la consulta"); 
?>
<html>
    <head>
        <title>ReadingHeaven</title>
        <link rel="shortcut icon" href="imagenes/logo3.png">
        <link rel="stylesheet" href="css/desing.css">
        <link rel="stylesheet" href="css/modal.css">
        <script src="js/modal.js"></script>
    </head>
    <body style=" background-color: rgb(226, 130, 21)">
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
        <li><a href="leidos.php?var=<?php echo $usuario ?>">Leidos</a></li>
        <li><a href="index.?var=<?php echo $usuario ?>">Configuracion</a></li>
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
                    <form action="send.php?var=<?php echo $usuario?>" method="post">
                        Titulo :<input type="text" name="n1" id="n1"></br>
                        Autor :<input type="text" name="n2" id="n2"></br>
                        Genero:<input type="text" name="n3" id="n3"></br>
                        Numero de capitulos: <input type="text" name="n4" id="n4"></br>
                        Capitulo actual:<input type="text" name="n5" id="n5"></br>
                       Calificacion:<SELECT name="n6" id="n6"> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </SELECT></br>
                        Estatus de la lectura: <input type="n7" name="n7" id="n7"></br></br>   
                        <input type="submit" class="enviar" >
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
               
           <?php
           while($document = $consulta2->fetch_assoc())
                {?>
               <td><?php echo  "<span class='tit'>{$document['manga_title']}</span>";?><br/>
                   Autor: <?php echo  "<span id='autor'>{$document['manga_author']}</span>";?><br/>
                   Genero: <?php echo  "<span id='autor''>{$document['manga_genre']}</span>";?><br/>
                   Total de capitulos: <?php echo  "<span id='autor''>{$document['manga_chapter_tally']}</span>";?><br/>
                   Capitulos leidos: <?php echo  "<span id='autor''>{$document['current_chapter']}</span>";?><br/>
                   Calificacion: <?php echo  "<span id='autor''>{$document['score']}";?> Estrellas ☆</span><br/>
                   Estado de  lectura: <?php echo  "<span id='autor''>{$document['read_status']}</span>";?>
                   </td>
               <td>
                   <a href="#" onclick="opciones()"><img src="imagenes/menu.png" alt="opciones" class="bts" ></a>
                   <div id="modal2" class="modal2">
            
            <div class="contenido-modal2">
            <div class="modal-body2" align="center">
                <a href="send.php?var=<?php echo $usuario?>&var1=<?php echo $document['manga_title']?>&var2=1" class="opis" style="background-color: #A50202;">Borrar</a><br/><br/>
                <a href="#" onclick="modalactual()" class="opis" style="background-color: #3EA8BD;">Editar</a>
            </div>
            </div>
        </div>
            </td>
           </tr>
           <?php } ?>
   </table> 
</div>
<div id="modalactual" class="modal">
            <div class="flex" id="flex">
                <div class="contenido-modal">
                    <div class="modal-header">
                        <h2 align="center">Edite su libro seleccionado</h2>
                    </div>
                    <div class="modal-body" align="center">
                    <form action="send.php?var=<?php echo $usuario?>&var1=<?php echo $document['manga_title']?>&var2=1" method="post">
                        Nuevo Titulo :<input type="text" name="n1" id="n1"></br>
                        Nuevo Autor :<input type="text" name="n2" id="n2"></br>
                        Nuevo Genero:<input type="text" name="n3" id="n3"></br>
                        Nuevo Numero de capitulos: <input type="text" name="n4" id="n4"></br>
                        Nuevo Capitulo actual:<input type="text" name="n5" id="n5"></br>
                        Nuevo Calificacion:<SELECT name="n6" id="n6"> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </SELECT></br>
                        Nuevo Estatus de la lectura: <input type="n7" name="n7" id="n7"></br></br>   
                        <input type="submit" class="enviar" >
                    </form>
                    </div>
                    <div class="footer">
                    <input type="submit" class="close" id="close1" value="Cancelar" onclick="cerrar()">
                    </div>
                </div>
            </div>
        </div>               
          
</body>
</html>
