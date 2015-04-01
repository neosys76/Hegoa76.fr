<?php
if( $_SESSION['jeu_espace'] == "objet" &&
    $_SESSION['objet_type'] == "detail")
{

?>

  <div class="panneau_objet_detail">

    <div class="ligne1">
      <img class="image_indicateur" name="image_indicateur" src="images/jeu/objet/detail/indicateur.png" >

      <a class="lien_retour" href="index.php?page=jeu&espace=objet&type=liste">
        <img class="image_retour" name="image_retour" src="images/jeu/objet/detail/bouton_retour.png" >
      </a>
    </div>

    <div class="ligne2">
      <a class="lien_supprimer" href="index.php?page=jeu&espace=objet&type=suppression">
        <img class="image_supprimer" name="image_supprimer" src="images/jeu/objet/detail/bouton_supprimer.png" >
      </a>

      <img class="icone_mana" name="icone_mana" src="images/jeu/objet/detail/icone_mana.png" />

      <div class="objet_mana_valeur">0</div>

      <a class="lien_vendre" href="index.php?page=jeu&espace=objet&type=vendre">
        <img class="image_vendre" name="image_vendre" src="images/jeu/objet/detail/bouton_vendre.png" >
      </a>

      <div class="objet_nom">Hache de glace</div>

    </div>

    <div class="ligne3">
      <div class="ligne3_gauche">
        <div class="cadre_objet_image">
          <img class="image_objet" name="image_vendre" src="images/jeu/objet/objets/hache.png" >
        </div>
      </div>
      <div class="ligne3_centre">

        <div class="objet_niveau">Niveau 6</div>
        <div class="objet_niveau_valeurs">500000 / 600000</div>

        <div class="cadre_caracteritiques">
          <div class="c1">0</div>
          <div class="c2">0</div>
          <div class="c3">0</div>
          <div class="c4">0</div>
          <div class="c5">0</div>
          <div class="c6">0</div>
        </div>

      </div>
      <div class="ligne3_droite">

        <a class="lien_augmenter" href="index.php?page=jeu&espace=objet&type=augmenter">
          <img class="image_augmenter" name="image_augmenter" src="images/jeu/objet/detail/bouton_augmenter.png" >
        </a>

        <img class="icone_sante" name="icone_sante" src="images/jeu/objet/detail/icone_sante.png" />

        <div class="objet_sante_valeur">0</div>

        <a class="lien_equiper" href="index.php?page=jeu&espace=objet&type=equiper">
          <img class="image_equiper" name="image_equiper" src="images/jeu/objet/detail/bouton_equiper.png" >
        </a>

        <div class="cadre_attributs">
        </div>

      </div>

    </div>


  </div>

<?php
}
?>