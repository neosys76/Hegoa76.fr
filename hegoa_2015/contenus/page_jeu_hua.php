<?php
if( $_SESSION['jeu_espace'] == "hua" )
{
?>

  <div class="panneau_hua">
    <div class="onglet_<?=$_SESSION['hua_onglet']?>">
      <a class="lien_hero" href="index.php?page=jeu&espace=hua&onglet=hero">H&eacute;ros</a>
      <a class="lien_unite" href="index.php?page=jeu&espace=hua&onglet=unite">Unit&eacute;s</a>
      <a class="lien_armee" href="index.php?page=jeu&espace=hua&onglet=armee">Arm&eacute;es</a>
    </div>


<?php
  // - on inclut la page requise pour le détail
  include "page_jeu_hua_{$_SESSION['hua_onglet']}.php";
?>

  </div><!-- panneau_hua -->

<?php
}
?>


