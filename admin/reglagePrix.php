<html>
	<head>
		<title>Reglage</title>
		<style>
			body 
			{
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		
		h1 {
			text-align: center;
			color: #333;
		}
		
		#genre 
		{
			border: 2px solid #ccc;
			border-radius: 10px;
			padding: 60px;
			margin-top: 50px;
			width: 600px;
			margin-left: auto;
			margin-right: auto;
			background-color: rgba(224, 199, 178, 0.5);
		}
		
		label {
			display: block;
			margin-bottom: 10px;
			color: #666;
		}
		
		input[type="text"],
		input[type="number"],
		input[type="submit"] 
		{
			display: block;
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 3px rgba(0,0,0,0.1);
		}
		
		input[type="submit"] {
			background-color: #333;
			color: #fff;
			cursor: pointer;
			transition: background-color 0.2s ease;
		}
		
		input[type="submit"]:hover {
			background-color: #555;
		}
		
		p {
			color: red;
			font-weight: bold;
		}
			
		</style>
	</head>
	<body>
	  <?php
		$genre = $_POST['genre'] ?? "";
		$prix = $_POST['prix'] ?? "";
		include "../bddConnect.php";
		// Vérification de la connexion
		if ($con->connect_error) 
		{
			die("Connection failed: " . $con->connect_error);
		}
		if (!empty($genre) && !empty($prix)) 
		{
			// Vérification si les données existent déjà dans la base de données
			$sql = "SELECT nom_genre FROM genre WHERE nom_genre='$genre'";
			$res = mysqli_query($con, $sql);

			// Si les données n'existent pas encore, insertion dans la base de données
			if (mysqli_num_rows($res) == 0) {
				$sql2 = "INSERT INTO genre (nom_genre) VALUES ('$genre')";
				mysqli_query($con, $sql2);
				$sqlID = "SELECT id_genre FROM genre WHERE nom_genre = '$genre'";
				$resID = mysqli_query($con, $sqlID);
				if (mysqli_num_rows($resID) > 0) {
					$row = mysqli_fetch_assoc($resID);
					$idG = $row['id_genre'];
					$sql3 = "INSERT INTO prix (id_genre, prix) VALUES ('$idG', '$prix')";
					mysqli_query($con, $sql3);
					header("Location: acceuilAdmin.php");
					exit;
				}
			} 
		} 
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
