<?php
	// Démarrer une session
	session_start();
	
		// Vérifie si l'utilisateur est connecté
		if (!isset($_SESSION["username"])) 
		{
			// Redirige vers l'index s'il n'est pas connecté
			header("Location: index.html");
			exit();
		}
		// Vérifie si le formulaire a été soumis
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			unset($_SESSION["username"]);
			header("Location: index.html");
			exit();
		}
	//connecter  à la base de données
	include "bddConnect.php";
	
	// Récupérer le prix depuis le paramètre GET
	$prix=$_GET['prix'];
	
	// Requête pour obtenir le solde et l'e-mail de l'utilisateur connecté
	$req="SELECT solde, email FROM login WHERE username='".$_SESSION["username"]."'";
	$resultat=mysqli_query($con, $req);
	$row = mysqli_fetch_array($resultat);
	
	// Vérifier si le solde de l'utilisateur est inférieur au prix du film
	if($row[0] < $prix)
	{
		// Rediriger vers la page de confirmation d'achat avec le paramètre test=0 et l'e-mail de l'utilisateur
		header("Location: confirmationAchat.php?test=0&mail=$row[1]");
	}
	else
	{
		// Calculer le nouveau solde après l'achat
		$newSolde=$row[0] - $prix;
		
		// Mettre à jour le solde dans la base de données
		$req2="UPDATE login SET solde='$newSolde' WHERE username='".$_SESSION["username"]."' ";
		$resultat2=mysqli_query($con, $req2);
		
		// Rediriger vers la page de confirmation d'achat avec le paramètre test=1 et l'e-mail de l'utilisateur
		header("Location: confirmationAchat.php?test=1&mail=$row[1]");
	}
	
	//Fermeture de la base de donnée
	mysqli_close($con);
?>