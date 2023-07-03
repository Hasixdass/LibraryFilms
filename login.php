<HTML>
	<HEAD>
		<TITLE>Login</TITLE>
		<link rel="stylesheet" type="text/css" href="style/login.css">
	</HEAD>
	<BODY>
	    <?php
		  session_start();
		  include "bddConnect.php";
		  $username = $_POST["username"] ?? "";
		  $password = $_POST["password"] ?? "";

		  // Ajouter une vérification si les champs sont vides avant de faire une requête SQL
		  if (!empty($username) && !empty($password)) 
		  {
			$sql = "SELECT username, password, solde FROM login WHERE username='$username'";
			$res = mysqli_query($con, $sql);

			// Vérifier si la requête a renvoyé un résultat
			if (mysqli_num_rows($res) > 0) 
			{
			  $ligne = mysqli_fetch_array($res);
			  // Vérifier le nom d'utilisateur et le mot de passe dans une base de données sécurisée
			  // Si les informations d'identification sont valides, définir $_SESSION["username"] sur le nom d'utilisateur
			  if ($username == $ligne[0] && $password == $ligne[1]) 
			  {
				$_SESSION["username"] = $username;
				header("Location: acceuil.php");
				exit();
			  } else {
				echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
			  }
			} else {
			  echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
			}
		  }
        ?>
		<DIV>
			<H1>Connexion</h1>
			<FORM method="POST" action="login.php">
				<input type="text" name="username" placeholder="Nom d'utilisateur"><br>
				<input type="password" name="password" placeholder="Mot de passe"><br>
				<input type="submit" value="Se connecter"><br>
			</FORM>
			<p>Pas encore inscrit? <a href="inscription.php">S'inscrire</a></p>
		</DIV>
	</BODY>
</HTML>
