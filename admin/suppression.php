<HTML>
	<HEAD> <TITLE> SUPPRESSION GENRE </TITLE> </HEAD>
	</BODY>
		<?php
		 // Récupérer l'ID du genre à supprimer depuis le formulaire dans la page prixFilm.php
		 $id=$_POST['id'];
		 
		 //connexion à la base de données
		 include "../bddConnect.php";
		 
		 // Requête pour supprimer le genre et ses prix associés de la base de données
		 $sql="DELETE genre, prix
			   FROM genre
			   INNER JOIN prix ON genre.id_genre = prix.id_genre
			   WHERE genre.id_genre ='$id'";
			   
		// Exécuter la requête
		// Vérifier si la requête a été exécutée avec succès
		if (mysqli_query($con, $sql)) 
		{
			// La suppression a été effectuée avec succès, rediriger vers la page de confirmation de suppression
			header("Location: RetourOk.php");
			exit();
		} 
		else 
		{
			// La suppression a échoué, rediriger vers la page d'erreur
			header("Location: erreurSuppression.php");
			exit();
		}
		 
		 // Fermer la connexion à la base de données
		 mysqli_close($con);
		?>
	</BODY>
</HTML>
