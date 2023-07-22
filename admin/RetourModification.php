<?php
    // activer la mise en mémoire tampon de sortie
    ob_start();
	
	// Démarrer une session
	session_start();
?>
<html>
	<head>
		<title>Ma page combinée</title>
		<link rel="stylesheet" type="text/css" href="../style/acceuilAdmin.css">
		
		// Fonctions JavaScript pour charger le contenu dans la balise 'article' 
		<script>
			function listeFilm() {
				fetch('listFilm.php')
					.then(response => response.text())
					.then(html => {
						document.querySelector('article').innerHTML = html;
					})
					.catch(error => console.error(error));
			}
			function ajout() {
				fetch('ajoutFilm.php')
					.then(response => response.text())
					.then(html => {
						document.querySelector('article').innerHTML = html;
					})
					.catch(error => console.error(error));
			}
			function prixFilm() {
				fetch('prixFilm.php')
					.then(response => response.text())
					.then(html => {
						document.querySelector('article').innerHTML = html;
					})
					.catch(error => console.error(error));
			}
			function reglagePrix() {
				fetch('reglagePrix.php')
					.then(response => response.text())
					.then(html => {
						document.querySelector('article').innerHTML = html;
					})
					.catch(error => console.error(error));
			}
			
		</script>
	</head>
	<body>
		<?php
		if (!isset($_SESSION['username'])) 
		{
			header("Location: ../index.html");
			exit;
		}
		?>
		<div class="container">
			<aside>
				<font color="white">
					<h2>Espace Admin</h2>
				</font>
				<font color="red">
					<p>Admin</p>
				</font>
				<button onclick="window.location.href='../logout.php'">Deconnexion</button>
				<div class="bt">
					<button onclick="window.location.href='bbFilm.php'">Acceuil</button><br><br>
					<button onclick="listeFilm()">Liste de tous les Films</button><br><br>
					<button onclick="ajout()">Ajouter un film</button><br><br>
					<button onclick="prixFilm()">Le prix du film</button><br><br>
					<button onclick="reglagePrix()">Réglage des prix</button><br><br>
				</div>
			</aside>
			<article>
				<?php include "modificationGenreEtPrix.php" ?>
			</article>
		</div>
	</body>
</html>
