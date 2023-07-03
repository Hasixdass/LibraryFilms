
<html>
	<head>
		<title>Formulaire d'ajout de film</title>
		<style>
			body
			{
				background-color: rgba(224, 199, 178, 0.2);
			}

			#formulaire {
				width: 550px;
				margin: 0 auto;
				background-color: rgba(0.6);
				padding: 100px;
				border-radius: 10px;
				box-shadow: 0 2px 5px rgba(0, 0, 0, 0.6);
			}

			label {
				display: block;
				margin-bottom: 10px;
				font-weight: bold;
			}

			input[type="text"],
			input[type="date"],
			input[type="file"] {
				width: 100%;
				padding: 5px;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				margin-bottom: 10px;
			}

			#submit {
				background-color: #4CAF50;
				color: white;
				padding: 10px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}

			#submit:hover {
				background-color: #45a049;
			}
		</style>
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

			// Requête pour récupérer les genres
			$sql = "SELECT id_genre, nom_genre FROM genre";
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

		<label for="date_sortie">Date de sortie :</label>
		<input type="date" id="date_sortie" name="date_sortie" required><br><br>

		<label for="input1">Image :</label>
		<input type="file" id="input1" name="image" required><br><br>

		<label for="input2">Description :</label>
		<input type="file" id="input2" name="fichier" required><br><br>

		<input type="submit" id="submit" name="submit" value="Ajouter">
	</form>
</body>
</html>
