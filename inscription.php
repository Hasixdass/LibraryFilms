<html>
<head>
	<title>Page d'inscription</title>
	<style>
		body {
			background-color: #f2f2f2;
			background: url("image/film-1668917_1280.jpg");
			background-size: cover;
			font-family: Arial, sans-serif;
			
		}

		h1 {
			color: #333;
			text-align : center;
		}

		form {
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
			font-weight: bold;
		}

		input[type="text"], input[type="password"], input[type="email"] 
		{
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
			box-sizing: border-box;
			
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}
		p
		{
			bottom: 0;
				right: 30;
		}
		footer
		{
			background-color: rgba(224, 199, 178, 0.3);
			padding: 10px;
			text-align: center;
		}
	</style>
</head>
<body>
	<body>
	  <?php
		session_start();
		$username = $_POST["nom"] ?? "";
		$mail = $_POST["email"] ?? "";
		$password = $_POST["pass"] ?? "";
		$password_confirm = $_POST["pass-confirm"] ?? "";
	
		
	  // Vérifier si les champs sont vides avant de faire une requête SQL
	  if (!empty($username) && !empty($password)  && !empty($password_confirm) && !empty($mail)) 
	  {
		if($password == $password_confirm)
		{
			$_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
			header("Location: registre.php");
			exit();
		}
		else
		{
			echo '<p> Mot de passe incorrect </p>';
			
		}
		
	  }
	  else if (isset($_POST["submit"])) 
	  {
		echo "<p>Tous les champs sont obligatoires.</p>";
	  }
	?>
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

