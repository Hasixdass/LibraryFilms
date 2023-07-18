<?php
	// activer la mise en mémoire tampon de sortie
    ob_start();
	
	// Démarrer une session
	session_start();
?>
<html>
	<head>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="style/acceuil.css">
	</head>
	<body>
		<?php
			// Vérifie si l'utilisateur est connecté
			if (!isset($_SESSION["username"])) 
			{
				// Redirige vers l'index s'il n'est pas connecté
				header("Location: index.html");
				exit();
			}
			// Vérifie si le formulaire a été soumis
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				unset($_SESSION["username"]);
				header("Location: index.html");
				exit();
			}
			
			//connecter  à la base de données
			include "bddConnect.php";
			
			// Requête pour obtenir les informations de l'utilisateur connecté
			$sql = "SELECT username, password, solde FROM login WHERE username='".$_SESSION["username"]."'";
			
			// Requête pour obtenir les genres de films
			$sql2 = "SELECT id_genre, nom_genre FROM genre ORDER BY nom_genre";
			
			// Exécute les requêtes
			$res = mysqli_query($con, $sql);
			$res2 = mysqli_query($con, $sql2);
			
			// Récupère la première ligne de résultats de la requête de l'utilisateur
			$ligne = mysqli_fetch_array($res);
		?>
		<div class="principal">
			<header>
				<a href="acceuil.php"> <img src="image/BbFilm-20-06-2023.png"></a>
				<nav class="recherche">
					<form method="GET" action="genre/recherche.php">
						<input type="text" name="recherche" placeholder="Recherche">
						<input type="image" src="image/icontexto-search-01_icon-icons.com_76897.png" width="40" height="40" alt="Submit">
					</form>
				</nav>
				<div class="solde">
					<font color="white">
					<label> NOM D'UTILISATEUR: <?php echo $ligne[0]; ?> </label><br>
					<label>Solde : <?php echo $ligne[2]; ?></label><br><br>
					</font>
					<form method="post">
						<input type="submit" value="Déconnexion">
					</form>
				</div>
			</header>
			<nav class="pic">
				<div class="image">
					<a href="pageAchat.php?IDfilm=45">
						<img src="https://zimage.cc/uploads/image/bca8060264e86148a7f5ab62212ea1f723f4a8a0.webp"  width="210" height="318">
					</a>
					<a href="pageAchat.php?IDfilm=48">
						<img src="https://zimage.cc/uploads/image/b8b9ff04c40b230bf28e8ad54961f79a0a6f71ba.webp"  width="210" height="318">
					</a>
					<a href="pageAchat.php?IDfilm=44">
						<img src="https://zimage.cc/uploads/image/46d325caf0458e37aac17b5441b6ba6c51b4b7cc.webp"  width="210" height="318">
					</a>
					<a href="pageAchat.php?IDfilm=47">
						<img src="https://zimage.cc/uploads/image/d8acd55cfb12dec9e30ef063df5472d6ab1003a3.webp"  width="210" height="318">
					</a>
					<a href="pageAchat.php?IDfilm=42">
						<img src="https://zimage.cc/uploads/image/9a69b43f9e5233008fd016ba3cc1da2d1af09207.jpg"  width="210" height="318">
					</a>
					<a href="pageAchat.php?IDfilm=41">
						<img src="https://zimage.cc/uploads/image/f5bb4150442c211c463d86a36cd8a86d3503255c.jpg"  width="210" height="318">
					</a>    
				</div>
			</nav>
			<section>
				<aside>
					<h3>Genre</h3>
					<?php
						// Tableau des liens vers les genres de films
						$liens = array(
						39 => "genre/action.php",
						40 => "genre/aventure.php",
						41 => "genre/comedie.php",
						42 => "genre/drame.php",
						44 => "genre/espionnage.php",
						43 => "genre/famille.php",
						45 => "genre/fantastique.php",
						46 => "genre/horreur.php",
						47 => "genre/policier.php",
						48 => "genre/fiction.php"
						);

					while ($ligne2 = mysqli_fetch_assoc($res2)) 
					{
						// Récupérer l'ID du genre et le nom du genre
						$genreId = $ligne2["id_genre"];
						$genre = $ligne2["nom_genre"];
						
						// Vérifier si le lien correspondant à l'ID du genre existe dans le tableau
						if (isset($liens[$genreId])) 
						{
							// Afficher le lien vers le genre de film
							echo '<ul><li><a href="' . $liens[$genreId] . '">' . $genre . '</a></li></ul>';
						} 
					}
					?>
				</aside>
				<article>
					<?php
					  // Récupérer l'ID de l'image du film à partir des pages du genre films et l'acceuil
					  $idfilm = $_GET['IDfilm'];
					  
					  // Requête pour obtenir les informations du film à partir de son ID d'image
					  $req = "SELECT film.nom_film, genre.nom_genre, prix.prix, images.lien_image, images.description
								FROM film
								JOIN genre ON film.id_genre = genre.id_genre
								JOIN prix ON film.id_prix = prix.id_prix
								JOIN images ON film.id_images = images.id_images
								WHERE images.id_images = '$idfilm'";
								
					  // Exécuter la requête
					  $resultat = mysqli_query($con, $req);
					  
					  // Récupérer la première ligne de résultat
					  $row = mysqli_fetch_array($resultat);
					  
					  // Afficher le titre du film
					  echo "<h3> >>>>>>>  $row[0]  <<<<<<< </h3>";
					  
					  // Afficher l'image et la description du film
						echo '<div class="histoire">
							<div class="image"><img src="' . $row[3] . '"></div>
							<div class="texte"><h4>Description:</h4>' . $row[4] . '</div>
						</div>';
						
					  // Afficher les informations du film	
					  echo '<div class="info"><font color="white"> Information de fichier : </font></div>';
					  echo "<label><u><b>Catégories</u></b> :  FILM </label><br><br>";
					  echo "<label ><u><b>Sous-Catégories</u></b>: $row[1] </label><br><br>";
					  echo "<label ><u><b>Prix</b></u> : $row[2]  </label><br>";
					  
					  // Afficher le bouton d'achat
					  echo '<div class="achat"><font color="white"> Acheter : </font></div><br>';
					  echo '<form method="GET" action="traitementSolde.php">
								<input type="hidden" name="prix" value="'.$row[2].'">
								<input type="submit" value="ACHETER">
						  </form>';
						
					  //Fermeture de la base de donnée
					  mysqli_close($con);
					  
					?>
				</article>
			</section>
			<footer>
				<p>contact Admin: rafidyhasina@gmail.com</p>
			</footer>
		</div>
	</body>
</html>
