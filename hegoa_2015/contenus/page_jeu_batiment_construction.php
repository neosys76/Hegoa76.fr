<?php
if( $_SESSION['jeu_espace'] == "batiment" &&
    $_SESSION['batiment_type'] == "construction" )
{
?>

  <div class="panneau_batiment">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/batiment/indicateur.png" >

    <div class="batiment_titre">Titre</div>

    <img class="image_retour" name="image_retour" src="images/jeu/batiment/retour.png" >

    <div class="batiment_image">
        <img class="image_batiment" name="image_batiment" src="images/jeu/batiment/batiments/batiment.png" >
    </div>

    <div class="batiment_contenu1">
    </div>

    <div class="batiment_contenu2">
    </div>

    <img class="image_cyniam" name="image_cyniam" src="images/jeu/batiment/icone_cyniam.png" >
    <img class="image_bois"   name="image_bois"   src="images/jeu/batiment/icone_bois.png" >
    <img class="image_metal"  name="image_metal"  src="images/jeu/batiment/icone_metal.png" >


<?php

 echo "</div>"; // panneau_batiment
}
?>

