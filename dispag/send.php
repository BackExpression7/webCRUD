<?php
/*verificaciones*/
$usuario=$_GET['var'];
$manga_title=$_GET['var1'];
$conexion= mysqli_connect ("localhost","root","")or die("no se puede conectar al servidor");
mysqli_select_db($conexion,"manga_db")or die ("No se puede ajjaja");
$consulta1 =mysqli_query($conexion,"select * from users") or die ("fallo en la consulta");
$consulta2 =mysqli_query($conexion,"select * from manga") or die ("fallo en la consulta");
while($users = $consulta1->fetch_assoc())
			{
				if ($users['user_name']==$usuario)
				{
					$id_user=$users['user_id'];
                }	 
            } 
while($document = $consulta2->fetch_assoc())
                {
                if ($document['manga_title']==$manga_title)
                {
                    $id_manga=$document['manga_id'];
                }	 
			} 
			
/*  borrar mangas */ 
if ($_GET['var2']==1) {
    $consulta2 = mysqli_query($conexion,"DELETE FROM reading WHERE user_id = $id_user AND manga_id = $id_manga")or die ("fallo en la subida de datos");
    $consulta2 = mysqli_query($conexion,"DELETE FROM manga WHERE manga_id = $id_manga")or die ("fallo en la subida de datos");
}/*  agregar mangas de bibioteca */ 
elseif ($_GET['var2']==3) {
	$n5 = $_POST['n5'];
				$n6 = $_POST['n6'];
				$n7 = $_POST['n7'];
	$consu = mysqli_query($conexion,"INSERT INTO reading(user_id, manga_id, current_chapter, score, read_status) VALUES ('$id_user', '$id_manga', '$n5', '$n6', '$n7')")or die ("fallo en la subida de datos");

}
/* Agregar nuevos mangas */ 
if (isset($_POST['n1']))
        {	
				$n1 = $_POST['n1'];
				$n2 = $_POST['n2'];
				$n3 = $_POST['n3'];
				$n4 = $_POST['n4'];
				$n5 = $_POST['n5'];
				$n6 = $_POST['n6'];
				$n7 = $_POST['n7'];
				/* editar mangas */ 
 if ($_GET['var2']==2) {
	$consulta2 = mysqli_query($conexion,"UPDATE manga SET manga_title = $n1, manga_author = $n2,manga_genre=$n3,manga_chapter_tally=$n4 WHERE manga_id = $id_manga");
	$consulta2 = mysqli_query($conexion,"UPDATE manga SET current_chapter=$n5, score=$n6, read_status=$n7 WHERE manga_id = $id_manga AND user_id=$id_user");
}
					if($n1==NULL||$n2==NULL||$n3==NULL||$n4==NULL||$n5==NULL||$n6==NULL||$n7==NULL){
						?>
						  <p style="color:#ffffff";><?php echo "No debe dejar datos sin rellenar"; ?></p>
						  <?php
					}else{
				$consulta1 = mysqli_query($conexion,"INSERT INTO manga(manga_title,manga_author,manga_genre,manga_chapter_tally) VALUES ('$n1','$n2','$n3','$n4')") or die ("fallo en la subida de datos");
                $consulta3 =mysqli_query($conexion,"select * from manga") or die ("fallo en la consulta");
                while($document = $consulta3->fetch_assoc())
							{
							if ($document['manga_title']==$n1)
							{
								$id_manga=$document['manga_id'];
							}	 
						} 
				$consulta2 = mysqli_query($conexion,"INSERT INTO reading(user_id, manga_id, current_chapter, score, read_status) VALUES ('$id_user', '$id_manga', '$n5', '$n6', '$n7')")or die ("fallo en la subida de datos");
            }
        }
        header("Location: principal.php?var=$usuario");
?>