<?php
	//connecter  à la base de données
    include "bddConnect.php";
	
    // Récupérer les données du formulaire
    $username = $_POST['nom'] ?? "";
    $mail = $_POST['email'] ?? "";
    $password = $_POST['pass'] ?? "";
    $password_confirm = $_POST['pass-confirm'] ?? "";
	
    // Masquer le mot de passe avec la fonction de hachage
    $passMasquer = password_hash($password, PASSWORD_DEFAULT);
    
	// Vérifier si les champs du formulaire ne sont pas vides
    if (!empty($username) && !empty($password) && !empty($password_confirm) && !empty($mail)) 
	{
		// Vérifier si le nom d'utilisateur est déjà utilisé
        $sql = "SELECT username FROM login WHERE username='$username'";
        $res = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($res) == 0) 
		{
			// Vérifier si les mots sont correcte
            if ($password == $password_confirm) 
			{
				 // Insérer les données de l'utilisateur dans la base de données
                $sql2 = "INSERT INTO login (username, password, solde, email) VALUES ('$username','$passMasquer',5000, '$mail')";
                mysqli_query($con, $sql2);
				
				//Fermeture de la base de donnée
                mysqli_close($con);
				
                header("Location: login.php");
                exit();
            } 
			else 
			{
				// Afficher un message d'erreur si les mots ne sont pas correcte
                echo '<p> Mot de passe incorrect </p>';
            }
        }
		else 
		{
			// Afficher un message d'erreur si le nom d'utilisateur est déjà utilisé
            echo "<p> Nom d'utilisateur existe </p>";
        }
    }
?>

<html>
	<head>
		<title>Page d'inscription</title>
		<link rel="stylesheet" type="text/css" href="style/inscription.css">
	</head>
	<body>
		<div>
			<h1>Inscription</h1>
			<form method="POST" action="inscription.php">
				<label>Nom d'utilisateur :</label><br>
				<input type="text" name="nom" required><br><br>

				<label>E-mail :</label><br>
				<input type="email" name="email" required><br><br>

				<label>Mot de passe :</label><br>
				<input type="password" name="pass" required><br><br>

				<label>Confirmation du mot de passe :</label><br>
				<input type="password" name="pass-confirm" required><br><br>

				<input type="submit" name="submit" value="S'inscrire">
			</form>
		</div>

		<footer>
			<p>contact Admin : rafidyhasina@gmail.com</p>
		</footer>
	</body>
</html>
