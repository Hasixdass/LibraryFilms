<html>
	<head>
		<title>Liste avec pagination</title>
		<link rel="stylesheet" type="text/css" href="../style/listFilm.css">
	</head>
	<body>
		<h1>Affichage des films</h1>
		<table border=2>
			<tr>
				<th>Nom du film</th>
				<th>Genre</th>
				<th>Date de sortie</th>
				<th>Prix</th>
			</tr>
		<?php
			// Connexion à la base de données
			include "../bddConnect.php";
			
			// Détermination du nombre d'éléments par page
			$elements_par_page = 7;
			
			// Récupération du numéro de page courant
			if (isset($_GET['page'])) {
				$page_en_cours = $_GET['page'];
			} else {
				$page_en_cours = 1;
			}
			
			// Calcul du numéro du premier élément de la page courante
			$premier_element = ($page_en_cours - 1) * $elements_par_page;
			
			// Requête pour récupérer les information du film de la page courante avec pagination
			$sql="SELECT film.nom_film, genre.id_genre, genre.nom_genre, film.date_sortie, prix.prix
						  FROM film
						  JOIN genre ON film.id_genre = genre.id_genre
						  JOIN prix ON film.id_prix = prix.id_prix 
						  ORDER by date_sortie DESC 
						  LIMIT $premier_element, $elements_par_page";
			
			// Exécute la requête
			$resultat = mysqli_query($con, $sql);
			
			// Affichage des éléments dans la table
			while ($row = mysqli_fetch_array($resultat)) {
				echo "<tr>";
					echo "<td>".$row['nom_film']."</td>";
					echo "<td>".$row['nom_genre']."</td>";
					echo "<td>".$row['date_sortie']."</td>";
					echo "<td>".$row['prix']."</td>";
					echo '<TD>
									<FORM method="POST" action="suppressionFilm.php">
										<button type="submit" name="nom_film" value="'.$row['nom_film'].'">Supprimer</button>
									</FORM>
								  </TD>';
				echo "</tr>";
				
			}
			// Requête SQL pour compter le nombre total d'éléments
			$resultat_total = mysqli_query($con, "SELECT COUNT(*) AS total FROM film");
			$row_total = mysqli_fetch_array($resultat_total);
			$total_elements = $row_total['total'];
			
			// Calcul du nombre total de pages
			$nombre_de_pages = ceil($total_elements / $elements_par_page);
			
			// Affichage de la pagination
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
			
			// Fermeture de la connexion à la base de données
			mysqli_close($con);
		?>
		</table>
		
	</body>
</html>
