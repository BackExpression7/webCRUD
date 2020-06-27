<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar haHAA</title>
    <script>
        function cargado(){
            document.getElementById("n1").value = ""
            document.getElementById("n2").value = ""
            document.getElementById("n3").value = ""
            document.getElementById("n4").value = ""
        }
    </script>
</head>
<body onload="cargado()">
    <form action="paginas/send.php" method="GET">
        Titulo :<input type="text" name="title" id="n1">
        Autor :<input type="text" name="author" id="n2">
        Genero:<input type="text" name="genre" id="n3">
        Numero de capitulos <input type="text" name="chapNumber" id="n4">
        <input type="submit">
    </form>
</body>
</html>