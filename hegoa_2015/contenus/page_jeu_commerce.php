<?php

if( $_SESSION['jeu_espace'] == "commerce" )
{
?>

  <div class="panneau_commerce">
    <div class="titre">Commerce</div>

    <div class="onglet_<?=$_SESSION['commerce_type']?>">

      <a class="lien_cours" href="index.php?page=jeu&espace=commerce&type=cours">Cours des ressources</a>
      <a class="lien_bourse" href="index.php?page=jeu&espace=commerce&type=bourse">Bourse d'&eacute;change</a>
      <a class="lien_marche" href="index.php?page=jeu&espace=commerce&type=marche">March&eacute;s</a>
    </div>
  </div>

<?php
}
?>