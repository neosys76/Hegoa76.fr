<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "hero" )
{
?>

  <div class="panneau_hua_hero">
<?php
  // - on inclut la page requise pour le détail
  include "page_jeu_hua_hero_{$_SESSION['hua_type']}.php";
?>
  </div>

<?php
}
?>


