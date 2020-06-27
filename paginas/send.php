<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserted</title>
</head>
	<body>
		<h1>Insertado</h1>
		<button OnClick="location.href ='index.php'"> Regresar</button>	
		<?php
			include_once "modelos/manga.php";
			include_once "bd/base.php";

			$base = new BaseDeDatosConsultas();

			$manga = new Manga();
			$manga->title = $_GET["title"];
			$manga->author = $_GET["author"];
			$manga->genre = $_GET["genre"];
			$manga->chapNumber = $_GET["chapNumber"];

			$base->insertar($manga);
		?>
	</body>
</html>

