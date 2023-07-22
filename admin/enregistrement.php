<?php
	// Vérifier si le formulaire a été soumis avec le champ "fichier_txt"
	if (isset($_FILES['fichier_txt'])) 
	{
		// Connexion à la base de données
		include "../bddConnect.php";
		
		// Récupérer les données du formulaire
		$nom = mysqli_real_escape_string($con, $_POST['nom_film']);
		$IDgenre = $_POST['genre'];
		$dateDesortie = $_POST['date_sortie'];
		$lien = $_POST['lienImage'];

		// Récupérer le contenu du fichier texte téléchargé
		$contenu = file_get_contents($_FILES['fichier_txt']['tmp_name']);
		$contenu = mysqli_real_escape_string($con, $contenu);

		// Insertion des données dans la table images
		$sql2 = "INSERT INTO images (titre, lien_image, id_genre, description) VALUES ('$nom', '$lien', '$IDgenre', '$contenu')";
		if (mysqli_query($con, $sql2)) 
		{
			// Récupérer l'ID généré pour l'enregistrement
			$idImage = mysqli_insert_id($con);

			// Requête pour récupérer l'ID du prix associé au genre du film dans la table "prix"
			$sql3 = "SELECT id_prix FROM prix WHERE id_genre='$IDgenre'";
			
			// Exécute la requête
			$res = mysqli_query($con, $sql3);
			
			// Récupère la première ligne de résultats de la requête
			$ligne = mysqli_fetch_array($res);
			$IDprix = $ligne[0];

			// Insertion des données dans la table film
			$sql4 = "INSERT INTO film (nom_film, date_sortie, id_genre, id_prix, id_images) VALUES ('$nom', '$dateDesortie', '$IDgenre', '$IDprix', '$idImage')";
			
			if (mysqli_query($con, $sql4)) 
			{
				// Redirection vers la page "RetourOk.php" en cas de succès
				header("Location: RetourOk.php");
				exit();
			} 
			else 
			{
				// Affichage d'un message d'erreur en cas d'échec de l'insertion dans la table "film"
				echo 'Erreur lors de l\'insertion des données dans la table film: ' . mysqli_error($con);
			}
		} 
		else 
		{
			// Affichage d'un message d'erreur en cas d'échec de l'insertion dans la table "images"
			//echo "Erreur lors de l'insertion des données dans la table images: " . mysqli_error($con);
			header("Location: erreurSuppression.php");
		}
		// Fermeture de la connexion à la base de données
		mysqli_close($con);
	}
?>
