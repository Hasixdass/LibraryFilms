<HTML>
	<HEAD> <TITLE> SUPPRESSION FILM</TITLE> </HEAD>
	<BODY>
		<?php
		 // Récupérer le nom du film à supprimer depuis le formulaire dans la page listFilm.php 
		 $nom=$_POST['nom_film'];
		 
		 //connexion à la base de données
		 include "../bddConnect.php";
		 
		 // Requête pour supprimer le film et ses images associés de la base de données
		 $sql="DELETE images, film
				FROM images
				INNER JOIN film ON images.titre = film.nom_film
				WHERE film.nom_film = '$nom'";
			   
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