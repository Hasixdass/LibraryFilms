<HTML>
	<HEAD> <TITLE> Modification </TITLE> </HEAD>
	<style>
			label {
				font-weight: bold;
			}
			
			input[type="text"] {
				margin-bottom: 10px;
				padding: 5px;
				width: 200px;
			}
			
			input[type="submit"] {
				background-color: #4CAF50;
				border: none;
				color: white;
				padding: 10px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin-top: 10px;
				cursor: pointer;
			}
		</style>
	<BODY>
		<?php
		  $ID=$_POST['ID'];
		  $genre=$_POST['GG'];
		  $prix=$_POST['prix'];
		  echo ' <FORM method="POST" action="UpdateGenreEtPrix.php">
					<label>Genre : </label>
					<input type="hidden" name="ID" value= "'.$ID.'"   >
					<input type="text" name="genre" value="'.$genre.'"required  ><br><br>
					
					<label>Prix : </label>
					<input type="number" name="prix"  min="0" value="'.$prix.'"required  ><br><br>
				
					<input type="submit" value="MODIFIER">
				 </FORM>';
		?>
	</BODY>
</HTML>