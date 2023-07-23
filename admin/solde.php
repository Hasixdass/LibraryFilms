<HTML>
	<HEAD>
	  <TITLE>Recherche</TITLE>
	  <link rel="stylesheet" type="text/css" href="../style/solde.css">
	</HEAD>
	<BODY>
		<FORM method="POST" action="RetourSolde.php">
		  <label>Nom d'utilisateur :</label>
		  <input type="text" name="recherche">
		  <input type="submit" value="RECHERCHE"><br>
		</FORM>
	</BODY>
</HTML>

<?php
	include "../bddConnect.php";

	// Vérifier la connexion
	if (!$con) 
	{
		die("La connexion à la base de données a échoué : " . mysqli_connect_error());
	}

	// Vérifier si un formulaire a été soumis pour la recherche
	if (isset($_POST['recherche'])) 
	{
		// Récupérer le nom recherché depuis le formulaire
		$nom_recherche = $_POST['recherche'];

		// Rechercher une donnée dans la base de données (exemple avec une table "utilisateurs")
		$sql = "SELECT * FROM login WHERE username = '$nom_recherche' ";
		$res = mysqli_query($con, $sql);
		
		$ligne = mysqli_fetch_array($res);

		if (mysqli_num_rows($res) > 0) 
		{
			// Afficher les résultats dans un tableau
			echo "<h2>Résultats de la recherche :</h2>
			<table border='1'>
				<tr>
					<th>ID</th>
					<th>Nom</th>
					<th>Solde</th>
					<th>E-mail</th>
				</tr>
				
				<tr>
					<td>" . $ligne[0] . "</td>
					<td>" . $ligne[1] . "</td>
					<td>" . $ligne[3] . "</td>
					<td>" . $ligne[4] . "</td>
				</tr>
			
			</table>";

			// Formulaire pour la modification de donnée du solde
			echo "<h2>Modifier les données du solde :</h2>
			<form method='post' action='modificationSolde.php'>
				<input type='hidden' name='id' value='" . $ligne[0] . "'>
				solde : <input type='number'  min='0' name='solde' value='" . $ligne[3] . "' required>
				<input type='submit' value='Modifier'>
			</form>";
		}
		else 
		{
			echo "Aucun enregistrement trouvé pour le nom : $nom_recherche";
		}
	}

	// Fermer la connexion à la base de données
	mysqli_close($con);
?>
