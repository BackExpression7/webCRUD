    <?php
        include_once "bd/base.php";
        $base = new BaseDeDatosConsultas();
        $usuario =$_GET['var'];
        $user = $base->getUserID($usuario);
    ?>

<html>
    <head>
        <title>ReadingHeaven</title>
        <link rel="shortcut icon" href="imagenes/logo3.png">
        <link rel="stylesheet" href="css/desing.css">
        <link rel="stylesheet" href="css/modal.css">
        <script>
            function clicked(){
                sessionStorage.setItem('autosave', 'true');
                var value = sessionStorage.getItem('autosave');
            }

            function loaded() {
                if(sessionStorage.getItem("autosave"))
                document.getElementById('modal1').style.display ='block';
            }
            
    </script>
        <script src="js/modal.js"></script>
    </head>
    <body style=" background-color: rgb(226, 130, 21)" onload="loaded()">
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
		<li><a href="principal.php?var=<?php echo $usuario ?>">Tus Guardados</a></li>
        <li><a href="index.php">Leidos</a></li>
        <li><a href="index.php">Configuracion</a></li>
        <li><a href="../index.php">Log out</a></li>
      </ul>
      </nav>

    <div>
        <table align="center">
           
           <?php 
           $datos = $base->readMangas($user);
           foreach($datos as $manga){ 
               echo "<td><span class='tit'>{$manga->title}</span> <br />";
               echo "Author: <span class='tit'>{$manga->author}</span> <br />";
               echo "Genero: <span class='tit'>{$manga->genre}</span> <br />";
               echo "Calificacion: <span class='tit'>{$manga->score} Estrellas ☆ </span> <br />";
               echo "Capitulos leidos: <span id='autor'>{$manga->chapTally}</span> <br />"; 
               echo "<hr> </td>"; 
               $mangaid = $manga->manga_id;
               echo '<td> <a href="leidos.php?mangaid='.$mangaid.'&var='.$usuario.'" button onclick="clicked()"> <img src="imagenes/menu.png" alt="añadir" class="bts"> </a> </td>';
               echo "</tr>";
           }
           ?>
         </table> 
    </div>
    
   
    <div id="modal1" class="modal">
            <div class="flex" id="flex">
                <div class="contenido-modal">
                    <div class="modal-header">
                        <h2 align="center">Actualizar</h2>
                    </div>
                    <div class="modal-body" align="center">
                    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
                    <form method="POST" target="dummyframe" action="backstage/updatescore.php">
                        Calificacion :<input type="text" name="score" id="n1"><br/>
                        <input type="hidden" name="user" id="hiddenField" value="<?php echo $_GET['var']; ?>" />
                        <input type="hidden" name="manga" id="hiddenField" value="<?php echo $_GET['mangaid']; ?>" />
                        <input type="submit" class="enviar">
                    </form>
                    <button>Eliminar de leidos</button>
                    </div>
                    <div class="footer">
                    <input type="submit" class="close" id="close1" value="Cancelar" onclick="cerrar()">
                    </div>
                    </div>
                </div>
            </div>  
        <div>
 
    </body>
</html>
