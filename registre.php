<html>
	<body>
		<?php
		  $user = $_POST['nom'];
		  $mdp = $_POST['pass'];
		  $mdp_confirm = $_POST['pass-confirm'];
		  // Vérifier si le formulaire n'a pas vide
		  if(isset($user) && !empty($mdp) && !empty($mdp) )
		  {
			// Vérifier si le champ de confirmation du mot de passe correspond au champ de mot de passe
			if ($mdp !== $mdp_confirm) 
			{
				echo "Les mots de passe ne correspondent pas!";
				header('Location: inscription2.html');
				exit;
			}
			else // Enregistrement du login dans la base de donnée
			{
				
			}
		  
	
		  }
		  else 
		  {
		  // Les champs de formulaire sont vides
		  // Redirigez vers la page d'inscription
		  header('Location: inscription2.html');
		  exit(); 
		  }
		  

			
			echo "L'inscription a été effectuée avec succès!";
		  
		?>
	</body>
</html>