<html>
	<body>
		<?php
		  session_start();
		  $username = $_SESSION["username"] ?? "";
		  $password = $_SESSION["password"] ?? "";
		  include "bddConnect.php";
		  $sql="INSERT INTO login (username, password, solde) VALUE ('$username','$password',5000)";
		  mysqli_query($con, $sql);
		  header('Location: login.php');
		  exit;
		  mysqli_close($con);
		  echo "L'inscription a été effectuée avec succès!";
		  ?>
	</body>
</html>
