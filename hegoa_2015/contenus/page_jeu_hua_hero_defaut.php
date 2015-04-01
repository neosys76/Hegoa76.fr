<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "hero" &&
    $_SESSION['hua_type']   == "defaut"  )
{
?>

<div class="hero_ligne_haute">

  <a class="lien_parcourir" href="index.php?page=jeu&espace=hua&onglet=hero&type=liste">
  <img class="image_parcourir" name="image_parcourir" src="images/jeu/hua/hero/defaut/bouton_parcourir.png" >
  </a>

  <a class="lien_ajouter" href="index.php?page=jeu&espace=hua&onglet=hero&type=creation">
  <img class="image_ajouter" name="image_ajouter" src="images/jeu/hua/hero/defaut/bouton_ajouter.png" >
  </a>

  <a class="lien_supprimer" href="index.php?page=jeu&espace=hua&onglet=hero&type=suppression">
  <img class="image_supprimer" name="image_supprimer" src="images/jeu/hua/hero/defaut/bouton_supprimer.png" >
  </a>

  <div class="hero_nom">Nom du h&eacute;ro</div>

  <a class="lien_retour" href="index.php?page=jeu&espace=hua&onglet=hero&type=liste">
  <img class="image_retour" name="image_retour" src="images/jeu/hua/hero/defaut/fermer.png" >
  </a>
</div>

<div class="hero_ligne_basse">

  <div class="hero_ligne_basse_gauche">

    <div class="cadre_hero">
    </div>

  </div>

  <div class="hero_ligne_basse_centre">

    <div class="hero_niveau">Niveau 6</div>

    <div class="hero_niveau_valeur">556482 / 612981</div>

    <a class="lien_equiper" href="index.php?page=jeu&espace=hua&onglet=hero&type=equiper">
    <img class="image_equiper" name="image_equiper" src="images/jeu/hua/hero/defaut/bouton_equiper.png" >
    </a>

    <a class="lien_niveau_suivant" href="index.php?page=jeu&espace=hua&onglet=hero&type=niveau_suivant">
    <img class="image_niveau_suivant" name="image_niveau_suivant" src="images/jeu/hua/hero/defaut/bouton_niveau_suivant.png" >
    </a>

    <img class="image_icone_mana" name="image_icone_mana" src="images/jeu/hua/hero/defaut/icone_mana.png" >

    <div class="hero_mana">120000</div>

    <a class="lien_vendre" href="index.php?page=jeu&espace=hua&onglet=hero&type=vendre">
    <img class="image_vendre" name="image_vendre" src="images/jeu/hua/hero/defaut/bouton_vendre.png" >
    </a>

  </div>

  <div class="hero_ligne_basse_droite">
    <div class="cadre_hero_caracteristiques">

      <div class="c1">0</div>
      <div class="c2">0</div>
      <div class="c3">0</div>
      <div class="c4">0</div>
      <div class="c5">0</div>
      <div class="c6">0</div>
      <div class="c7">0</div>
      <div class="c8">0</div>
      <div class="c9">0</div>
      <div class="c10">0</div>
      <div class="c11">0</div>
      <div class="c12">0</div>
      <div class="c13">0</div>

    </div>
  </div>



</div>

<?php
}
?>


