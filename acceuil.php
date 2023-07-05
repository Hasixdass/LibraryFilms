<html>
	<head>
		<title>Accueil</title>
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
			$sql = "SELECT username, password, solde FROM login WHERE username='".$_SESSION["username"]."'";
			$sql2 = "SELECT nom_genre FROM genre ORDER BY nom_genre";
			$res = mysqli_query($con, $sql);
			$res2 = mysqli_query($con, $sql2);
			$ligne = mysqli_fetch_array($res);
		?>
		<div class="principal">
			<header>
				<a href="acceuil.php"> <img src="image/BbFilm-20-06-2023.png"></a>
				<nav class="recherche">
					<form method="POST" action="#">
						<input type="text" placeholder="Recherche">
						<input type="image" src="image/icontexto-search-01_icon-icons.com_76897.png" width="40" height="40" alt="Submit">
					</form>
				</nav>
				<div class="solde">
					<label> NOM D'UTILISATEUR: <?php echo $ligne[0]; ?> </label><br>
					<label>Solde : <?php echo $ligne[2]; ?> </label>
					<form method="post">
						<input type="submit" value="Déconnexion">
					</form>
				</div>
			</header>
			<nav class="pic">
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
			</nav>
			<section>
				<aside>
					<h3>Genre</h3>
					<?php
					while ($ligne2 = mysqli_fetch_assoc($res2)) {
						echo '<ul><li><a href="#">' . $ligne2["nom_genre"] . '</a></li></ul>';
					}
					?>
				</aside>
				<article>
					<h2>FILM</h2>
					<table>
						<tr>
							<th>Nom du film</th>
							<th>Prix</th>
						</tr>
						<?php
						$elements_par_page = 10;

						if (isset($_GET['page']))
						{
							$page_en_cours = $_GET['page'];
						}
						else 
						{
							$page_en_cours = 1;
						}

						$premier_element = ($page_en_cours - 1) * $elements_par_page;

						$resultat = mysqli_query($con, "SELECT film.nom_film, prix.prix
							FROM film
							JOIN genre ON film.id_genre = genre.id_genre
							JOIN prix ON film.id_prix = prix.id_prix LIMIT $premier_element, $elements_par_page");

						while ($ligne3 = mysqli_fetch_array($resultat)) 
						{
							echo "<tr>";
							echo "<td>".$ligne3['nom_film']."</td>";
							echo "<td>".$ligne3['prix']."</td>";
							echo "</tr>";
						}

						$resultat_total = mysqli_query($con, "SELECT COUNT(*) AS total FROM film");
						$ligne3_total = mysqli_fetch_array($resultat_total);
						$total_elements = $ligne3_total['total'];

						$nombre_de_pages = ceil($total_elements / $elements_par_page);

						echo "<div>";
						for ($i = 1; $i <= $nombre_de_pages; $i++) 
						{
							if ($i == $page_en_cours) 
							{
								echo "<span>$i</span>&nbsp;";
							} 
							else 
							{
								echo "<a href=\"".$_SERVER['PHP_SELF']."?page=$i\">$i</a>&nbsp;";
							}
						}
						echo "</div>";

						mysqli_close($con);
						?>
					</table>  
				</article>
			</section>
			<footer>
				<p>contact Admin: rafidyhasina@gmail.com</p>
			</footer>
		</div>
	</body>
</html>
