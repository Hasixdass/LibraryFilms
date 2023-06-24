<HTML>
	<HEAD>
		<TITLE>Login</TITLE>
		<style>
			body 
			{
				background: url('image/star_wars_the_last_jedi_wide.jpg') ;
				background-size: cover;
				background-repeat: no-repeat;
			
			}
			div 
			{
				margin: 100px auto;
				width: 400px;
				padding: 40px;
				background-color: rgba(255, 255, 255, 0.8);
				box-shadow: 0px 0px 10px #888;
				border-radius: 5px;
				text-align: center;
			}
			h1 
			{
				font-size: 2em;
				margin-bottom: 30px;
			}
			input[type="text"], input[type="password"] 
			{
				padding: 10px;
				margin-bottom: 20px;
				border: none;
				border-radius: 5px;
				background-color: rgba(255, 255, 255, 0.7);
			}
			input[type="submit"] 
			{
				padding: 10px 30px;
				border: none;
				background-color: #4CAF50;
				color: #fff;
				border-radius: 5px;
				cursor: pointer;
			}
			input[type="submit"]:hover 
			{
				background-color: #3e8e41;
			}
			p 
			{
				text-align: center;
				font-size: 1.2em;
				margin-top: 20px;
			}
			a 
			{
				color: #4CAF50;
				text-decoration: none;
			}
		</style>
	</HEAD>
	<BODY>
	    <?php
		  include "bddConnect.php";
		  $username = $_POST["username"] ?? "";
		  $password = $_POST["password"] ?? "";

		  // Ajouter une vérification si les champs sont vides avant de faire une requête SQL
		  if (!empty($username) && !empty($password)) 
		  {
			$sql = "SELECT username, password, solde FROM login WHERE username='$username'";
			$res = mysqli_query($con, $sql);

			session_start();
			if (isset($_SESSION["username"])) 
			{
			  header("Location: acceuil.php");
			  exit();
			}
			
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
