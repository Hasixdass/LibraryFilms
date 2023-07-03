<html>
	<head>
		<title>Acceuil</title>
		<link rel="stylesheet" type="text/css" href="style/acceuil.css">
	</head>
	<body>
		<?php
			session_start();
			if (!isset($_SESSION["username"])) 
			{
				header("Location: index.html");
				exit();
			}
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				unset($_SESSION["username"]);
				header("Location: index.html");
				exit();
			}
			include "bddConnect.php";
			$sql = "SELECT  username, password, solde FROM login WHERE username='".$_SESSION["username"]."'";
			$sql2 = "SELECT nom_genre FROM genre ORDER  by nom_genre";
			$res = mysqli_query($con, $sql);
			$res2=mysqli_query($con, $sql2);
			$ligne = mysqli_fetch_array($res);
			echo '<div class="principal">';
				echo '<header>';
					echo '<a href="acceuil.php"> <img src="image/BbFilm-20-06-2023.png"></a>';
					echo '<nav class="recherche">';
						echo '<form method="POST" action="#">';
							echo '<input type="text" placeholder="Recherche">';
							echo '<input type="image" src="image/icontexto-search-01_icon-icons.com_76897.png" width="40" height="40" alt="Submit">';
						echo '</form>';
					echo '</nav>';
					echo '<div class="solde">';
						echo '<label> NOM DUTILISATEUR: ' . $ligne[0] . ' </label><br>';
						echo '<label>Solde : ' . $ligne[2] . ' </label>';
						echo'<form method="post">
							<input type="submit" value="Déconnexion">
							</form>';
					echo '</div>';
				echo '</header>';
				echo '<nav class="pic">
					<div class="image">
						<a href="#">
							<img src="image/tyler-rake-2.jpg"  width="210" height="318">
						</a>
						<a href="#">
							<img src="image/fast-X.jpg"  width="210" height="318">
						</a>
						<a href="#">
							<img src="image/the-flash-4dx-poster.jpg"  width="210" height="318">
						</a>
						<a href="#">
							<img src="image/john.jpg"  width="210" height="318">
						</a>
						<a href="#">
							<img src="image/Black-Adam.jpg"  width="210" height="318">
						</a>
						<a href="#">
							<img src="image/avatar-the-way-of-water-poster.jpg"  width="210" height="318">
						</a>    
					</div>
				</nav>';
				echo '<section>
					<aside>
						<h3>Genre</h3>';
						while($ligne2=mysqli_fetch_assoc($res2))
						{
							echo '<ul><li> <a href="#">' . $ligne2["nom_genre"] .'</a> </li></ul>';
						}
					echo'</aside>
					<article>
						<h2>FILM</h2>
						<table border="1">
							<thead>
								<tr>
									<th>NOM</th>
									<th>PRIX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>SISSUE</td>
									<td id="prix">1000</td>
								</tr>
								<tr>
									<td>WICK 4</td>
									<td id="prix2">1000</td>
								</tr>
							</tbody>
						</table>    
					</article>
				</section>';
				echo'<footer>
					<p>contact Admin : rafidyhasina@gmail.com</p>
				</footer>';
			echo "</div>";
			mysqli_close($con);
		?>
	</body>
</html>

