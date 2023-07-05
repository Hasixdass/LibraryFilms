<?php
	

	if (isset($_FILES['image']))
	{
		$nom = $_POST['nom_film'];
		$IDgenre = $_POST['genre'];
		$dateDesortie = $_POST['date_sortie'];
		
		$imageTitre = $_FILES['image']['name'];
		$imageType = $_FILES['image']['type'];
		$imageTmpPath = $_FILES['image']['tmp_name'];
		$imageData = file_get_contents($imageTmpPath);
		$imageDataBase64 = base64_encode($imageData);
		
		$fichierType = $_FILES['fichier']['type'];
		$fichierTmpPath = $_FILES['fichier']['tmp_name'];
		$fichierData = file_get_contents($fichierTmpPath);
		
		include "../bddConnect.php";
		// Insertion des données dans la table images
		$sql2 = "INSERT INTO images (titre, type, sary, id_genre, description) VALUES ('$imageTitre', '$imageType', '$imageDataBase64', '$IDgenre', '$fichierData')";
		if (mysqli_query($con, $sql2) == TRUE) 
		{
			$idImage = mysqli_insert_id($con);
			
			$sql3="SELECT id_prix FROM prix WHERE id_genre='$IDgenre'";
			$res=mysqli_query($con, $sql3);
			$ligne = mysqli_fetch_array($res);
			$IDprix=$ligne[0];
			
			// Insertion des données dans la table film
			$sql4 = "INSERT INTO film (nom_film, date_sortie, id_genre, id_prix, id_images) VALUES ('$nom', '$dateDesortie', '$IDgenre', '$IDprix', '$idImage')";
			if (mysqli_query($con, $sql4) == TRUE) 
			{
				header("Location: RetourOk.php");
				exit();
			}
			else
			{
				echo 'diso 1';
			}
		}
		else
		{
			echo 'diso 2';
		}
		mysqli_close($con);
	}
?>
