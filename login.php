<?php
	// Démarrer une session
	session_start();
	
	//connecter  à la base de données
	include "bddConnect.php";
	
	// Récupérer les données du formulaire
	$username = $_POST["username"] ?? "";
	$password = $_POST["password"] ?? "";

	// Vérifier si les champs du formulaire ne sont pas vides
	if (!empty($username) && !empty($password)) 
	{
	  // Requête pour obtenir les informations de l'utilisateur dans la base de données
	  $sql = "SELECT username, password, solde FROM login WHERE username='$username'";
	  $res = mysqli_query($con, $sql);

	  // Vérifier si la requête a renvoyé un résultat
	  if (mysqli_num_rows($res) > 0) 
	  {
		$ligne = mysqli_fetch_array($res);
		// Vérifier le nom d'utilisateur et le mot de passe dans une base de données
		// Si les informations d'identification sont valides, définir $_SESSION["username"] sur le nom d'utilisateur
		if ($username == $ligne[0] && password_verify($password, $ligne[1])) 
		{
		  $_SESSION["username"] = $username;
		  header("Location: acceuil.php");
		  exit();
		} 
		else 
		{
		  // Afficher un message d'erreur si les mots de passe sont incorrect
		  echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
		}
	  } 
	  else 
	  {
		// Afficher un message d'erreur si les mots de passe sont incorrect
		echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
	  }
	}
	
	//Fermeture de la base de donnée
	mysqli_close($con);
?>

<HTML>
	<HEAD>
	  <TITLE>Login</TITLE>
	  <link rel="stylesheet" type="text/css" href="style/login.css">
	</HEAD>
	<BODY>
	  <DIV>
		<H1>Connexion</h1>
		<FORM method="POST" action="login.php">
		  <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
		  <input type="password" name="password" placeholder="Mot de passe" required><br>
		  <input type="submit" value="Se connecter"><br>
		</FORM>
		<p>Pas encore inscrit? <a href="inscription.php">S'inscrire</a></p>
	  </DIV>
	</BODY>
</HTML>
