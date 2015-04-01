<?php
if( $_SESSION['jeu_espace'] == "objet" &&
    $_SESSION['objet_type'] == "creation")
{

?>

  <div class="panneau_objet_creation">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/objet/creer/indicateur.png" >

    <div class="titre">Cr&eacute;ation d'objets</div>

    <a class="lien_retour" href="index.php?page=jeu&espace=objet&type=liste">
      <img class="image_retour" name="image_retour" src="images/jeu/objet/creer/bouton_retour.png" >
    </a>

    <div class="partie_gauche">

      <div class="label1">Type d'objet</div>
      <div class="label2">H&eacute;ro artisan</div>
      <div class="label3">Specificit&eacute;</div>
      <div class="label4">Co&ucirc;t en ressources</div>

      <img class="image_temps" name="image_temps" src="images/jeu/objet/creer/icone_temps.png" >
      <img class="image_mana" name="image_mana" src="images/jeu/objet/creer/icone_mana.png" >
      <img class="image_bois" name="image_bois" src="images/jeu/objet/creer/icone_bois.png" >
      <img class="image_metal" name="image_metal" src="images/jeu/objet/creer/icone_metal.png" >

      <div class="temps">0</div>
      <div class="mana">0</div>
      <div class="bois">0</div>
      <div class="mana">0</div>

    </div>

    <div class="partie_centre">
      <img class="image_fabriquer" name="image_fabriquer" src="images/jeu/objet/creer/bouton_fabriquer.png" >
    </div>


    <div class="partie_droite">
      <div class="label4">Nom de l'objet</div>
      <input type="text" />

      <div class="cadre_caracteristiques">
        <div class="c1">0</div>
        <div class="c2">0</div>
        <div class="c3">0</div>
        <div class="c4">0</div>
        <div class="c5">0</div>
        <div class="c6">0</div>
      </div>

      <div class="cadre_attributs">
      </div>

      <img class="image_de" name="image_de" src="images/jeu/objet/creer/icone_de.png" >
      <input type="text" />

    </div>


  </div>

<?php
}
?>