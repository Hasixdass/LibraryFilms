<!DOCTYPE html>
<html>
<head>
	<title>Liste avec pagination</title>
	<style>
		table {
			border-collapse: collapse;
			width: 75%;
		}
		
		th, td {
			padding: 8px;
			text-align: left;
		}
		
		th {
			background-color: #f2f2f2;
		}
		
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		
		div.pagination {
			margin-top: 20px;
		}
		
		div.pagination a {
			color: black;
			float: left;
			padding: 8px 16px;
			text-decoration: none;
			border: 1px solid #ddd;
			margin: 0 4px;
		}
		
		div.pagination a.active {
			background-color: #4CAF50;
			color: white;
			border: 1px solid #4CAF50;
		}
		
		div.pagination a:hover:not(.active) {
			background-color: #ddd;
		}
	</style>
</head>
<body>
	<h1>Affichage des films</h1>
	<table border=2>
		<tr>
            <th>Nom du film</th>
            <th>Nom du genre</th>
            <th>Date de sortie</th>
            <th>Prix</th>
        </tr>
	<?php
		// Connexion à la base de données
		include "../bddConnect.php";
		
		// Détermination du nombre d'éléments par page
		$elements_par_page = 2;
		
		// Récupération du numéro de page courant
		if (isset($_GET['page'])) {
			$page_en_cours = $_GET['page'];
		} else {
			$page_en_cours = 1;
		}
		
		// Calcul du numéro du premier élément de la page courante
		$premier_element = ($page_en_cours - 1) * $elements_par_page;
		
		// Requête SQL pour récupérer les éléments de la page courante
		$resultat = mysqli_query($con, "SELECT film.nom_film, genre.nom_genre, film.date_sortie, prix.prix
                      FROM film
                      JOIN genre ON film.id_genre = genre.id_genre
                      JOIN prix ON film.id_prix = prix.id_prix LIMIT $premier_element, $elements_par_page");
		
		// Affichage des éléments
		while ($row = mysqli_fetch_array($resultat)) {
			echo "<tr>";
                echo "<td>".$row['nom_film']."</td>";
                echo "<td>".$row['nom_genre']."</td>";
                echo "<td>".$row['date_sortie']."</td>";
                echo "<td>".$row['prix']."</td>";
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
		for ($i = 1; $i <= $nombre_de_pages; $i++) {
			if ($i == $page_en_cours) {
				echo "<span>$i</span>&nbsp;";
			} else {
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