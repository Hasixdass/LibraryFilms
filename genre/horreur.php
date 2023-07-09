<html>
	<head>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="../style/acceuil.css">
	</head>
	<body>
		<?php
			session_start();
			if (!isset($_SESSION["username"])) 
			{
				header("Location: ../index.html");
				exit();
			}
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				unset($_SESSION["username"]);
				header("Location: ../index.html");
				exit();
			}
			include "../bddConnect.php";
			$sql = "SELECT username, password, solde FROM login WHERE username='".$_SESSION["username"]."'";
			$sql2 = "SELECT id_genre, nom_genre FROM genre ORDER BY nom_genre";
			$res = mysqli_query($con, $sql);
			$res2 = mysqli_query($con, $sql2);
			$ligne = mysqli_fetch_array($res);
		?>
		<div class="principal">
			<header>
				<a href="../acceuil.php"> <img src="../image/BbFilm-20-06-2023.png"></a>
				<nav class="recherche">
					<form method="GET" action="recherche.php">
						<input type="text" name="recherche" placeholder="Recherche">
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
					<a href="../pageAchat.php?IDfilm=45">
						<img src="https://zimage.cc/uploads/image/bca8060264e86148a7f5ab62212ea1f723f4a8a0.webp"  width="210" height="318">
					</a>
					<a href="../pageAchat.php?IDfilm=48">
						<img src="https://zimage.cc/uploads/image/b8b9ff04c40b230bf28e8ad54961f79a0a6f71ba.webp"  width="210" height="318">
					</a>
					<a href="../pageAchat.php?IDfilm=44">
						<img src="https://zimage.cc/uploads/image/46d325caf0458e37aac17b5441b6ba6c51b4b7cc.webp"  width="210" height="318">
					</a>
					<a href="../pageAchat.php?IDfilm=47">
						<img src="https://zimage.cc/uploads/image/d8acd55cfb12dec9e30ef063df5472d6ab1003a3.webp"  width="210" height="318">
					</a>
					<a href="../pageAchat.php?IDfilm=42">
						<img src="https://zimage.cc/uploads/image/9a69b43f9e5233008fd016ba3cc1da2d1af09207.jpg"  width="210" height="318">
					</a>
					<a href="../pageAchat.php?IDfilm=41">
						<img src="https://zimage.cc/uploads/image/f5bb4150442c211c463d86a36cd8a86d3503255c.jpg"  width="210" height="318">
					</a>    
				</div>
			</nav>
			<section>
				<aside>
					<h3>Genre</h3>
					<?php
						$liens = array(
						39 => "action.php",
						40 => "aventure.php",
						41 => "comedie.php",
						42 => "drame.php",
						44 => "espionnage.php",
						43 => "famille.php",
						45 => "fantastique.php",
						46 => "horreur.php",
						47 => "policier.php",
						48 => "fiction.php"
						);

					while ($ligne2 = mysqli_fetch_assoc($res2)) 
					{
						$genreId = $ligne2["id_genre"];
						$genre = $ligne2["nom_genre"];
						
						if (isset($liens[$genreId])) 
						{
							echo '<ul><li><a href="' . $liens[$genreId] . '">' . $genre . '</a></li></ul>';
						} 
					}
					?>
				</aside>
				<article>
					<h2>FILM</h2>
					<table border=1>
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
						$req="SELECT film.id_images, film.nom_film, prix.prix
									FROM film
									JOIN prix ON film.id_prix = prix.id_prix
									JOIN genre ON film.id_genre = genre.id_genre
									WHERE genre.nom_genre = 'Horreur' LIMIT $premier_element, $elements_par_page ";
						$resultat = mysqli_query($con, $req);

						while ($ligne3 = mysqli_fetch_array($resultat)) 
						{
							echo "<tr>";
							echo "<td><a href=\"../pageAchat.php?IDfilm=" . $ligne3['id_images'] . "\">" . $ligne3['nom_film'] . "</a></td>";
							echo "<td>".$ligne3['prix']."</td>";
							echo "</tr>";
						}
						$count="SELECT COUNT(*) AS total FROM film";
						$resultat_total = mysqli_query($con, $count);
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
