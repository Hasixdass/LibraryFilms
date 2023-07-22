<HTML>
	<HEAD> 
		<TITLE> Modification </TITLE>
		<link rel="stylesheet" type="text/css" href="../style/modificationGenreEtPrix.css">
	</HEAD>
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
