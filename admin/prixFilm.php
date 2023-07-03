<HTML>
	<HEAD> <TITLE> TABLEAU DES PRIX</TITLE> </HEAD>
	<style>
			table {
				border-collapse: collapse;
				width: 75%;
			}
			
			th, td {
				padding: 8px;
				text-align: left;
				border-bottom: 1px solid #ddd;
			}
			
			tr:hover {
				background-color: #f5f5f5;
			}
			
			h2 {
				color: #333;
			}
			
			form {
				display: inline;
			}
			
			#btt {
				padding: 5px 10px;
				background-color: #4CAF50;
				color: white;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}
			
			button:hover {
				background-color: #45a049;
			}
		</style>
	<BODY>
		<?php
		 include "../bddConnect.php";
		 // connexion à la base de données
		 if(!$con)
		 {
			die("La connexion à la base de données a échoué:" .mysqli_connect_error());
		 }
		 else
		 {
			echo "<h2>Le prix du films: </h2> <BR>";
			$sql="  SELECT genre.id_genre ,nom_genre, prix FROM genre  JOIN prix  ON genre.id_genre = prix.id_genre";
			$res=mysqli_query($con, $sql);
			
			// Affichage des données
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
						echo '<TD>
								<FORM method="POST" action="RetourModification.php">
									<input type="hidden" name="ID" value= "'.$ligne["id_genre"].'">
									<input type="hidden" name="GG" value= "'.$ligne["nom_genre"].'">
									<input type="hidden" name="prix" value= "'.$ligne["prix"].'">
									<button type="submit"> Modifier </button>
								</FORM>
							  </TD>';
						echo '<TD>
								<FORM method="POST" action="suppression.php">
									<button type="submit" id="btt" name="id" value="'.$ligne["id_genre"].'">Supprimer</button>
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