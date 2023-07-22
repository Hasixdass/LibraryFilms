
<html>
	<head>
		<title>Formulaire d'ajout de film</title>
		<link rel="stylesheet" type="text/css" href="../style/ajoutFilm.css">
	</head>
	<body>
	<form action="enregistrement.php" id="formulaire" method="POST" enctype="multipart/form-data">
		<label>Nom film:</label>
		<input type="text" id="nom" name="nom_film" required><br><br>

		<label>Genre :</label>
		<select id="genre" name="genre" required>
			<?php
			// Connexion à la base de données
			include "../bddConnect.php";

			// Requête pour récupérer les genres du film
			$sql = "SELECT id_genre, nom_genre FROM genre";
			
			// Exécute les requêtes
			$res = mysqli_query($con, $sql);

			// Boucle pour générer les options
			while ($ligne = mysqli_fetch_assoc($res)) {
				$id = $ligne['id_genre'];
				$nom = $ligne['nom_genre'];
				echo "<option value='$id'>$nom</option>";
			}
			// Fermeture de la connexion à la base de données
			mysqli_close($con);
			?>
		</select><br><br>

		<label >Date de sortie :</label>
		<input type="date" id="date_sortie" name="date_sortie" required><br><br>

		<label >Lien Image :</label>
		<input type="text" id="input1" name="lienImage" required><br><br>
		
		<label >Description du film (fichier du type .txt) :</label>
		<input type="file" name="fichier_txt" required>

		<input type="submit" id="submit" name="submit" value="Ajouter">
	</form>
</body>
</html>
