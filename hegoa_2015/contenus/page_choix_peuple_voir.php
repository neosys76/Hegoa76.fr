<div class="titre">Choisir un peuple Description</div>

<a class="lien_fermer" href="index.php?page=choix_peuple">
<img class="image_fermer" name="image_fermer" src="images/choix_peuple_voir/fermer.png" >
</a>

<div class="contenu_choix_peuple">

<?php

  $choix_peuple = $_SESSION['choix_peuple'];

  if (
        $choix_peuple == "bunsif" ||
        $choix_peuple == "humain" ||
        $choix_peuple == "nimhsine" ||
        $choix_peuple == "sulmis" )
      {
        require "page_choix_peuple_voir_$choix_peuple.php";
      }
?>

</div>

<form name="form_choix" action="index.php?page=choix_peuple_voir_validation" method="post">

<input type="hidden" name="choix_peuple" value="<?=$_SESSION['choix_peuple']?>">

<img class="image_valider" src="images/choix_peuple_voir/valider.png" name="choix_peuple_valider" onclick="document.form_choix.submit();"  >

</form>
