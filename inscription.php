<html>
	<head>
		<title>Page d'inscription</title>
		<link rel="stylesheet" type="text/css" href="style/inscription.css">
	</head>
	<body>
		<?php

			$username = $_POST['nom'] ?? "";
			$mail = $_POST['email'] ?? "";
			$password = $_POST['pass']?? "";
			$password_confirm = $_POST['pass-confirm'] ?? "";
			include "bddConnect.php";

			if (!empty($username) && !empty($password) && !empty($password_confirm) && !empty($mail)) 
			{
				$sql = "SELECT username FROM login WHERE username='$username'";
				$res = mysqli_query($con, $sql);
				if (mysqli_num_rows($res) == 0)
				{	
					if ($password == $password_confirm) 
					{
							
						$sql2 = "INSERT INTO login (username, password, solde, email) VALUES ('$username','$password',5000, '$mail')";
						mysqli_query($con, $sql2);
						mysqli_close($con);
						header("Location: login.php");
						exit();
					}
					else 
					{
						echo '<p> Mot de passe incorrect </p>';
					}
				}
				else
				{
					echo "<p> Nom d'utilisateur existe </p>";
				}
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


