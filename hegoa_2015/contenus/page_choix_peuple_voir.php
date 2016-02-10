<div class="titre"><?php echo $this->traductions["titre_choix"][$_SESSION['lang']]; ?>
<a class="lien_fermer" href="index.php?page=choix_peuple" title="<?php echo $this->traductions_debut['retour-choix-peuple'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>

<?php

  $choix_peuple = $_SESSION['choix_peuple'];

	$test_races = true;
		$search = array("é","è");
		$replace = array("e","e");
		foreach($_SESSION['races_possibles'] as $race){
			$nom = str_replace($search,$replace,$race->nom);
			$test_races= $test_races || ($choix_peuple==$nom);
		}

   if ($test_races)
      {
        require "page_choix_peuple_voir_$choix_peuple.php";
      }

?>
<a class="bouton_action" href="index.php?page=choix_peuple_voir_validation&choix_peuple=<?php echo $_SESSION['choix_peuple']; ?>">OK</a>
<p>&nbsp;</p>


