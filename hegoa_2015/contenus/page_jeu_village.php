<?php
// - Vérification
if(
    $_SESSION['jeu_espace'] == "village" ||
    $_SESSION['jeu_espace'] == "batiment" ||
    $_SESSION['jeu_espace'] == "objet" ||
    $_SESSION['jeu_espace'] == "hua" ||
    $_SESSION['jeu_espace'] == "magie" ||
    $_SESSION['jeu_espace'] == "science" )
{
?>
  <div class="panneau_village">

    <div class="cadre_village">
      <a class="lien_village_parcourir" href="index.php?page=jeu&espace=village&type=liste">
        <img class="village_bouton_parcourir" src="images/jeu/village/bouton_parcourir.png">
      </a>
<!--      <img class="village_image" src="<?=$_SESSION['village_image']?>"> -->
      <img class="village_image" src="images/jeu/village/village_defaut.jpg">

      <a class="lien_village_vendre" href="index.php?page=jeu&espace=village&type=vendre">
        <img class="village_bouton_vendre" src="images/jeu/village/bouton_vendre.png">
      </a>
    </div>

    <div class="village_nom"><?=$_SESSION['village_nom']?></div>

    <div class="village_ligne1">
      <img class="image_village_mana"   name="image_village_mana"   src="images/jeu/village/icone_mana.png" >
      <div class="village_mana"><?=$_SESSION['village_mana']?></div>

      <img class="image_village_population"   name="image_village_population"   src="images/jeu/village/icone_population.png" >
      <div class="village_population"><?=$_SESSION['village_population']?></div>

      <img class="image_village_naissance"   name="image_village_naissance"   src="images/jeu/village/icone_naissance.png" >
      <div class="village_naissance"><?=$_SESSION['village_naissance']?></div>
      <div class="village_naissance_temps"><?=$_SESSION['village_naissance_temps']?></div>
    </div>

    <div class="village_ligne2">
      <img class="image_village_agriculteur"   name="image_village_agriculteur"   src="images/jeu/village/icone_agriculteur.png" >
      <div class="village_agriculteur"><?=$_SESSION['village_agriculteur']?></div>

      <img class="image_village_guerrier_cac"   name="image_village_guerrier_cac"   src="images/jeu/village/icone_guerrier_cac.png" >
      <div class="village_guerrier_cac"><?=$_SESSION['village_guerrier_cac']?></div>

      <img class="image_village_guerrier_distance"   name="image_village_guerrier_distance"   src="images/jeu/village/icone_guerrier_distance.png" >
      <div class="village_guerrier_distance" ><?=$_SESSION['village_guerrier_distance']?></div>

      <img class="image_village_mage"   name="image_village_mage"   src="images/jeu/village/icone_mage.png" >
      <div class="village_mage"><?=$_SESSION['village_mage']?></div>

      <img class="image_village_chariot_guerre"   name="image_village_chariot_guerre"   src="images/jeu/village/icone_chariot_guerre.png" >
      <div class="village_chariot_guerre"><?=$_SESSION['village_chariot_guerre']?></div>

      <img class="image_village_chariot_transport"   name="image_village_chariot_transport"   src="images/jeu/village/icone_chariot_transport.png" >
      <div class="village_chariot_transport"><?=$_SESSION['village_chariot_transport']?></div>

      <img class="image_village_invoc_magique"   name="image_village_invoc_magique"   src="images/jeu/village/icone_invoc_magique.png" >
      <div class="village_invoc_magique"><?=$_SESSION['village_invoc_magique']?></div>

      <img class="image_village_cyniam"   name="image_village_cyniam"   src="images/jeu/village/icone_cyniam.png" >
      <div class="village_cyniam"><?=$_SESSION['village_cyniam']?></div>

      <img class="image_village_bois"   name="image_village_bois"   src="images/jeu/village/icone_bois.png" >
      <div class="village_bois"><?=$_SESSION['village_bois']?></div>

      <img class="image_village_metal"   name="image_village_metal"   src="images/jeu/village/icone_metal.png" >
      <div class="village_metal"><?=$_SESSION['village_metal']?></div>
    </div>
  </div>


<?php
}
?>

