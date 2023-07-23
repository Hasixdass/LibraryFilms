<HTML>
	<HEAD> <TITLE> UPDATE SOLDE</TITLE> </HEAD>
	</BODY>
		<?php
		 // Récupérer les données du formulaire de modification
		 $ID=$_POST['id']; // ID du login à modifier
		 $newSolde=$_POST['solde']; // nouveau solde à modifier
		 
		 // Inclure le fichier de connexion à la base de données
		 include "../bddConnect.php";
		 
		 // Vérification de la connexion à la base de données
		 if(!$con)
		 {
			die("La connexion à la base de données a échoué:" .mysqli_connect_error());
		 }
		 else
		 {
			// Mettre à jour le solde dans la base de données
			$sql="UPDATE login SET solde='$newSolde' WHERE id_login='$ID'";
			
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