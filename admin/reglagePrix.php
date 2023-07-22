<html>
	<head>
		<title>Reglage Prix</title>
		<link rel="stylesheet" type="text/css" href="../style/reglagePrix.css">
	</head>
	<body>
	  <?php
		// Récupérer les données envoyées par le formulaire
		$genre = $_POST['genre'] ?? "";
		$prix = $_POST['prix'] ?? "";
		
		// connexion à la base de données
		include "../bddConnect.php";
		
		// Vérification de la connexion à la base de données
		if ($con->connect_error) 
		{
			// Afficher un message d'erreur en cas d'échec de connexion
			die("Connection failed: " . $con->connect_error);
		}
		// Vérifier si les champs genre et prix ne sont pas vides
		if (!empty($genre) && !empty($prix)) 
		{
			// Requête pour la vérification des données s'ils existent déjà dans la base de données
			$sql = "SELECT nom_genre FROM genre WHERE nom_genre='$genre'";
			$res = mysqli_query($con, $sql);

			// Si les données n'existent pas encore, insertion dans la base de données
			if (mysqli_num_rows($res) == 0) 
			{
				$sql2 = "INSERT INTO genre (nom_genre) VALUES ('$genre')";
				mysqli_query($con, $sql2);
				
				// Requête pour récupérer l'ID du genre inséré
				$sqlID = "SELECT id_genre FROM genre WHERE nom_genre = '$genre'";
				$resID = mysqli_query($con, $sqlID);
				if (mysqli_num_rows($resID) > 0) 
				{
					$row = mysqli_fetch_assoc($resID);
					$idG = $row['id_genre'];
					
					// Requête pour insérer le prix du genre dans la table prix
					$sql3 = "INSERT INTO prix (id_genre, prix) VALUES ('$idG', '$prix')";
					mysqli_query($con, $sql3);
					header("Location: RetourOk.php");
					exit;
				}
			} 
		}
		// Fermer la connexion à la base de données
		mysqli_close($con);
	  ?>
		<div>
			<h1>Réglage des prix</h1>
			<form method="POST" id="genre" action="RetourReglagePrix.php">
				<label>Genre :</label><br>
				<input type="text" name="genre" required><br><br>
				
				<label>Prix :</label><br>
				<input type="number" name="prix"  min="0" required><br><br>
				
				<input type="submit" name="submit" value="VALIDER">
			</form>
		</div>
	</body>
</html>
