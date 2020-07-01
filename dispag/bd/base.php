<?php
    include_once "modelos/manga.php";
    include_once "modelos/reading.php";
    include_once "modelos/users.php";
    include_once "modelos/reading-manga.php";

    class BaseDeDatosConsultas
    {
        private $conexion;
        
        public function __construct()
        {
            $this->conexion = new PDO ("mysql:host=localhost;dbname=manga_db","root","");
        }

        public function insertMangas($manga)
        {
            $sql = $this->conexion->prepare("INSERT INTO manga (manga_title, manga_author, manga_genre, manga_chapter_tally)
             VALUES (?,?,?,?); ");
            $sql->bindParam(1,$manga->title, PDO::PARAM_STR);
            $sql->bindParam(2,$manga->author, PDO::PARAM_STR);
            $sql->bindParam(3,$manga->genre, PDO::PARAM_STR);
            $sql->bindParam(4,$manga->chapNumber, PDO::PARAM_STR);
            $sql->execute();
        }

        public function getUserID($usuario){
            $sql = $this->conexion->prepare("SELECT * FROM users WHERE user_name = ? ");
            $sql->execute(array($usuario));
            $users = $sql->fetchAll(PDO::FETCH_OBJ);
            $user = new Users();
            foreach($users  as $userResult){ 
                 $user->user_id = $userResult->user_id;
                } 
            return $user;
        }

        public function readMangas($user)
        {
            $sql = $this->conexion->prepare("SELECT manga.manga_title, manga.manga_author, manga.manga_genre, manga.manga_chapter_tally, reading.score, manga.manga_id
            FROM reading 
            INNER JOIN manga
            ON reading.manga_id = manga.manga_id WHERE reading.user_id = ? AND reading.read_status = 'read';");
            $sql -> execute(array($user->user_id));
            $readMangas = $sql->fetchAll(PDO::FETCH_OBJ);

            $results = array();
            foreach($readMangas as $manga){
                $mangaReading = new ReadManga();
                $mangaReading->chapTally = $manga->manga_chapter_tally;
                $mangaReading->score = $manga->score;
                $mangaReading->author = $manga->manga_author;
                $mangaReading->genre = $manga->manga_genre;
                $mangaReading->title= $manga->manga_title;
                $mangaReading->manga_id = $manga->manga_id;
                array_push($results,$mangaReading);
            }

            return $results;
        }

        public function updateScore($score, $user, $mangaid){
            $sql = $this->conexion->prepare("UPDATE reading SET score = ? WHERE user_id = ? AND manga_id = ?;");
            $sql->execute(array($score,$user,$mangaid));
            $sql -> execute();
        }
    }

?>