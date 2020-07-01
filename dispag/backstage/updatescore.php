<?php
    while (! file_exists('bd') )
    chdir('..');
    include_once "bd/base.php";

    $user = $_POST["user"];
    $score = $_POST["score"];
    $manga_id = $_POST["manga"];

    $base = new BaseDeDatosConsultas();
    $user = $base->getUserID($user);

    echo $user->user_id;
    echo $score;
    echo $manga_id;

    $base->updateScore($score,$user->user_id,$manga_id);

    echo "<script type='text/javascript'>alert('Cambiado');</script>";
?>