<HTML>
	<HEAD> <TITLE> UPDATE </TITLE> </HEAD>
	</BODY>
		<?php
		 $ID=$_POST['ID'];
		 $genre=$_POST['genre'];
		 $prix=$_POST['prix'];
		 include "../bddConnect.php";
		 
		 // Vérification de la connexion
		 if(!$con)
		 {
			die("La connexion à la base de données a échoué:" .mysqli_connect_error());
		 }
		 else
		 {
			$sql= "UPDATE genre
				   JOIN prix ON genre.id_genre = prix.id_genre
				   SET genre.nom_genre = '$genre', prix.prix = '$prix'
                   WHERE genre.id_genre='$ID' AND prix.id_genre='$ID' ";
			mysqli_query($con, $sql);
			header("Location: acceuilAdmin.php");
		 }
		 mysqli_close($con);
		?>
	</BODY>
</HTML>