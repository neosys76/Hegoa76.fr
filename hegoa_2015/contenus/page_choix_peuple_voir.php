<div class="titre">Choisir un peuple Description</div>

<a class="lien_fermer" href="index.php?page=choix_peuple">
<img class="image_fermer" name="image_fermer" src="images/choix_peuple_voir/fermer.png" >
</a>

<div class="contenu_choix_peuple">

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

</div>

<form name="form_choix" action="index.php?page=choix_peuple_voir_validation" method="post">

<input type="hidden" name="choix_peuple" value="<?php echo $_SESSION['choix_peuple']; ?>">

<img class="image_valider" src="images/choix_peuple_voir/valider.png" name="choix_peuple_valider" onclick="document.form_choix.submit();"  >

</form>
