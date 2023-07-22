<HTML>
	<HEAD> <TITLE> UPDATE </TITLE> </HEAD>
	</BODY>
		<?php
		 // Récupérer les données du formulaire de modification
		 $ID=$_POST['ID']; // ID du genre à modifier
		 $genre=$_POST['genre']; // Nouveau nom du genre
		 $prix=$_POST['prix']; // Nouveau prix associé au genre
		 
		 // Inclure le fichier de connexion à la base de données
		 include "../bddConnect.php";
		 
		 // Vérification de la connexion à la base de données
		 if(!$con)
		 {
			die("La connexion à la base de données a échoué:" .mysqli_connect_error());
		 }
		 else
		 {
			// Requête pour mettre à jour le nom du genre et son prix dans les tables genre et prix
			$sql= "UPDATE genre
				   JOIN prix ON genre.id_genre = prix.id_genre
				   SET genre.nom_genre = '$genre', prix.prix = '$prix'
                   WHERE genre.id_genre='$ID' AND prix.id_genre='$ID' ";
				   
			// Exécuter la requête 
			mysqli_query($con, $sql);
			
			// Rediriger vers la page de confirmation de modification
			header("Location: RetourOk.php");
		 }
		 // Fermer la connexion à la base de données
		 mysqli_close($con);
		?>
	</BODY>
</HTML>
