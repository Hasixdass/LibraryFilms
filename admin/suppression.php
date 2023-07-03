<HTML>
	<HEAD> <TITLE> SUPPRESSION </TITLE> </HEAD>
	</BODY>
		<?php
		 $id=$_POST['id'];
		 include "../bddConnect.php";
		 $sql="DELETE genre, prix
			   FROM genre
			   INNER JOIN prix ON genre.id_genre = prix.id_genre
			   WHERE genre.id_genre ='$id'";
		 mysqli_query($con, $sql);
		 mysqli_close($con);
		 mysqli_query($con, $sql);
		 header("Location: acceuilAdmin.php");
		 // fermer la connexion
		 mysqli_close($con);
		?>
	</BODY>
</HTML>