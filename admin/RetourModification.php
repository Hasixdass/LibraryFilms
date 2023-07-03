<!DOCTYPE html>
<html>
	<head>
		<title>Ma page combinée</title>
		<style>
			body
			{
				background: url("../image/film-1668917_1280.jpg");
				background-repeat: no-repeat;
				background-size: cover;
				
			}
			.container 
			{
			  display: flex;
			  flex-direction: row;
			  justify-content: space-between;
			  align-items: stretch;
			  height: 100vh;
			  width: 100vw;
			}

			aside 
			{
			  display: flex;
			  flex-direction: column;
			  justify-content: flex-start;
			  align-items: center;
			  background-color: #eee;
			  padding: 20px;
			  width: 20%;
			}
			aside p {
			  margin-bottom: 0px;
			}
			article 
			{
			  display: flex;
			  flex-direction: column;
			  justify-content: center;
			  align-items: center;
			  
			  padding: 20px;
			  width: 80%;
			  background-color: rgba(255, 255, 255, 0.3);
			  
			}

			article p 
			{
			  margin-bottom: 20px;
			}
			button
			{
				padding: 10px 30px;
				border: none;
				background-color: #4CAF50;
				color: #fff;
				border-radius: 10px;
				cursor: pointer;
			}
			.bt
			{
				padding-top:70px;
				padding-bottom: 10px;
				
			}
		</style>
		<script>
			function listeFilm() {
				fetch('list.php')
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
				fetch('reglagePrix.html')
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
		session_start();
		if (!isset($_SESSION['username'])) 
		{
			header("Location: ../index.html");
			exit;
		}
		?>
		<div class="container">
			<aside>
				<h2>Espace Admin</h2>
				
				<p>Admin</p>
				<button onclick="window.location.href='#'">Deconnexion</button>
				<div class="bt">
					<button onclick="window.location.href='bbFilm.php'">Acceuil</button><br><br>
					<button onclick="listeFilm()">Liste de tous les Films</button><br><br>
					<button onclick="ajout()">Ajouter un film</button><br><br>
					<button onclick="prixFilm()">Le prix du film</button><br><br>
					<button onclick="reglagePrix()">Réglage des prix</button><br><br>
				</div>
			</aside>
			<article>
				<p>Ceci est le contenu de la page 2.</p>
				<?php include "modificationGenreEtPrix.php" ?>
			</article>
		</div>
	</body>
</html>
