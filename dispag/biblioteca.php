<?php
$usuario=$_GET['var'];
$edtiyulo=NULL;
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
$consultaco = mysqli_query($conexion, "SELECT * FROM manga ORDER BY manga_title DESC;") or die ("kappa");
?>

<html>
    <head>
        <title>ReadingHeaven</title>
        <link rel="shortcut icon" href="imagenes/logo3.png">
        <link rel="stylesheet" href="css/desing.css">
        <link rel="stylesheet" href="css/modal.css">
        <script src="js/modal.js"></script>
    </head>
    <body style="background-color: #E28215">
    <input type="checkbox" id="btn-nav" class="checkbox" style="display: none;">
        <header>
            <label for="btn-nav" class="btn-label">
            <div class="header-button"></div>
            </label>
            <h1 style="font-size:1.5cm;"><img src="imagenes/logo3.png" alt="logo" style="width: 5rem;">ReadingHeaven</h1>
           <span><a href="#" onclick="modal3()"><img src="imagenes/buscar.png" class="bts">
           <a href="biblioteca.php?var=<?php echo $usuario?>&az=1" class="bts">AZ^</a></span>
           <?php echo " <p class='us'>Bienvenido: <br/> $usuario</p>"; ?>
        </header>
        <nav class="menu">
      <ul><br/><br/><br/><br/>
		<li><a href="principal.php?var=<?php echo $usuario ?>">Tus Guardados</a></li>
        <li><a href="leidos.php?var=<?php echo $usuario ?>">Leidos</a></li>
        <li><a href="#">Configuracion</a></li>
        <li><a href="../index.php">Log out</a></li>
      </ul>      
        
    </nav>
    <div id="modal3" class="modal3">
                    <div class="contenido-modal3">
                    <div class="modal-body3" align="center">
                    <form action="biblioteca.php?var=<?php echo $usuario?>" method="post">
                    <input type="text" name="busqueda" id="busqueda">
                        <input type="submit" class="opis"  style="background-color: #3EA8BD;" value="buscar">
                    </form>
                    </div>
                    </div>
                </div>

<div>
   <table align="center">
           <tr>
           <?php
           if (isset($_GET['az'])) {
            $consulta2=$consultaco;
           }else if (isset($_POST['busqueda'])) {
            $busca=$_POST['busqueda'];
         $busqueda =mysqli_query($conexion, "SELECT * FROM manga WHERE manga_title LIKE '$busca'") or die ("kappa");
        $consulta2=$busqueda;
     }
            while($document = $consulta2->fetch_assoc())
                {?>
               <td>Titilo <?php echo  "<span id='tit'>{$document['manga_title']}</span>";?><br/>
                   Autor: <?php echo  "<span id='autor'>{$document['manga_author']}</span>";?><br/>
                   Genero: <?php echo  "<span id='autor''>{$document['manga_genre']}</span>";?><br/>
                   Total de capitulos: <?php echo  "<span id='autor''>{$document['manga_chapter_tally']}</span>";?><br/>
                   <hr>
                </td>
                <td><div id="modal2" class="modal2">
                    <div class="contenido-modal2">
                    <div class="modal-body2" align="center">
                        <a href="biblioteca.php?var=<?php echo $usuario?>&edtiyulo=<?php echo $document['manga_title']?>&vared=1" class="opis" style="background-color: #54DCC1;">agregar</a><br/><br/>
                    </div>
                    </div>
                </div></td>
           </tr>
           <?php } ?>
   </table> 
</div>

<div id="modalbiblioteca" class="modal">
            <div class="flex" id="flex">
                <div class="contenido-modal">
                    <div class="modal-header">
                    <?php
                        if (isset($_GET['vared'])) {
                            ?><script>modalbiblioteca();</script><?php
                            $edtiyulo=$_GET['edtiyulo'];
                        }?>
                        <h2 align="center">acabe de agregar su libro</h2>
                    </div>
                    <div class="modal-body" align="center">
                    <form action="send.php?var=<?php echo $usuario?>&var1=<?php echo $edtiyulo?>&var2=3" method="post">
                        Capitulo actual:<input type="text" name="n5" id="n5"></br>
                        Calificacion:<SELECT name="n6" id="n6"> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </SELECT></br>
                        Estatus de la lectura: <SELECT name="n7" id="n7"> 
                            <option value="En Proceso">En Proceso</option>
                            <option value="Leido">Leido</option>
                        </SELECT></br></br></br>   
                        <input type="submit" class="enviar" >
                    </form>
                    </div>
                    <div class="footer">
                    <input type="submit" class="close" id="close1" value="Cancelar" onclick="cerrar2()">
                    </div>
                </div>
            </div>
        </div>              
    </body>
</html>


