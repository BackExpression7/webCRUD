<?php
$usuario=$_GET['var'];
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
      <ul>
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
                    <form action="principal.php" method="GET">
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

    </body>
</html>