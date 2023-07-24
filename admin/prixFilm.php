<HTML>
	<HEAD> 
		<TITLE> TABLEAU DES PRIX</TITLE>
		<link rel="stylesheet" type="text/css" href="../style/prixFilm.css">
	</HEAD>
	
	<BODY>
		<?php
		 // connexion à la base de données
		 include "../bddConnect.php";
		 if(!$con)
		 {
			// Vérifier si la connexion a échoué et afficher un message d'erreur en cas d'échec
			die("La connexion à la base de données a échoué:" .mysqli_connect_error());
		 }
		 else
		 {
			// Si la connexion est réussie, afficher un titre pour la section de prix des films
			echo "<h2>Le prix du films: </h2> <BR>";
			echo "<label><b><u>Remarque:</u></b> Si l'un de ces genres est retiré, les films correspondants ne seront plus visibles. </label> <BR>";
			// Requête pour récupérer les données des genres et leurs prix associés depuis les tables "genre" et "prix"
			$sql="  SELECT genre.id_genre ,nom_genre, prix 
					FROM genre  JOIN prix
					ON genre.id_genre = prix.id_genre 
					ORDER by nom_genre";
			
			// Exécute la requête
			$res=mysqli_query($con, $sql);
			
			// Affichage des données dans un tableau
			echo '<TABLE border=2 >';
				echo"<TR>";
					echo "<TH> Genre </TH>";
					echo "<TH> Prix </TH>";
					echo "<TH> Modification </TH>";
					echo "<TH> Suppression </TH>";
				echo "</TR>";
				while($ligne=mysqli_fetch_assoc($res))
				{
					echo "<TR>";
						
						echo "<TD>" .$ligne["nom_genre"]."</TD>";
						echo "<TD>" .$ligne["prix"]."</TD>";
						echo '<TD class="btt">
								<FORM method="POST" action="RetourModification.php">
									<input type="hidden" name="ID" value= "'.$ligne["id_genre"].'">
									<input type="hidden" name="GG" value= "'.$ligne["nom_genre"].'">
									<input type="hidden" name="prix" value= "'.$ligne["prix"].'">
									<button type="submit"> Modifier </button>
								</FORM>
							  </TD>';
						echo '<TD class="btt">
								<FORM method="POST" action="suppression.php">
									<button type="submit" name="id" value="'.$ligne["id_genre"].'">Supprimer</button>
								</FORM>
							  </TD>';
					echo "</TR>";
				}
			echo "</TABLE>";
			
		 }
		 // fermer la connexion
		 mysqli_close($con);
		?>
	</BODY>
</HTML>	
