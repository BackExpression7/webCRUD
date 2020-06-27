<?php
    include_once "modelos/manga.php";

    class BaseDeDatosConsultas
    {
        private $conexion;
        
        public function __construct()
        {
            $this->conexion = new PDO ("mysql:host=localhost;dbname=webCRUD","root","");
        }

        public function insertar($manga)
        {
            $sql = $this->conexion->prepare("INSERT INTO manga (manga_title, manga_author, manga_genre, manga_chapter_tally)
             VALUES (?,?,?,?); ");
            $sql->bindParam(1,$manga->title, PDO::PARAM_STR);
            $sql->bindParam(2,$manga->author, PDO::PARAM_STR);
            $sql->bindParam(3,$manga->genre, PDO::PARAM_STR);
            $sql->bindParam(4,$manga->chapNumber, PDO::PARAM_STR);
            $sql->execute();
        }
    }

?>