<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "unite" &&
    $_SESSION['hua_type']   == "infos"  )
{
?>

<div class="contenu_unite_infos">

  <div class="unite_ligne_1">

    <div class="unite_nom"></div>
    <div class="unite_niveau">Niveau X</div>
    <div class="unite_niveau_suivant">Niveau X+1</div>

    <a class="lien_hua_unite_infos_retour" href="index.php?page=jeu&espace=hua&onglet=unite&type=defaut">
        <img class="hua_unite_infos_retour" src="images/jeu/hua/unite/infos/bouton_retour.png">
    </a>
  </div

  <div class="unite_ligne_2">

    <div class="contenu_niveau">

      <img class="hua_unite_infos_unite" src="images/jeu/hua/unite/infos/unite_guerrier_cac.png">

      <div class="niveau_1">0</div>
      <div class="niveau_2">0</div>
      <div class="niveau_3">0</div>
      <div class="niveau_4">0</div>
      <div class="niveau_5">0</div>
      <div class="niveau_6">0</div>
      <div class="niveau_7">0</div>
      <div class="niveau_8">0</div>

    </div>

    <div class="contenu_entre_niveau">
      <div>Augmenter le niveau</div>

      <img class="hua_unite_infos_augmenter" src="images/jeu/hua/unite/infos/bouton_augmenter.png">

      <div class="contenu_entre_niveau_icones">
        <img class="hua_unite_infos_temps" src="images/jeu/hua/unite/infos/icone_temps.png">
        <img class="hua_unite_infos_bois" src="images/jeu/hua/unite/infos/icone_bois.png">
        <img class="hua_unite_infos_metal" src="images/jeu/hua/unite/infos/icone_metal.png">
        <img class="hua_unite_infos_cyniam" src="images/jeu/hua/unite/infos/icone_cyniam.png">
      </div>

      <div class="contenu_entre_niveau_valeurs">
        <div class="temps">0</div>
        <div class="bois">0</div>
        <div class="metal">0</div>
        <div class="cyniam">0</div>
      </div>
    </div>

    <div class="contenu_niveau_suivant">

      <div class="niveau_suivant_1">0</div>
      <div class="niveau_suivant_2">0</div>
      <div class="niveau_suivant_3">0</div>
      <div class="niveau_suivant_4">0</div>
      <div class="niveau_suivant_5">0</div>
      <div class="niveau_suivant_6">0</div>
      <div class="niveau_suivant_7">0</div>
      <div class="niveau_suivant_8">0</div>

    </div>

  </div>

</div>

<?php
}
?>


