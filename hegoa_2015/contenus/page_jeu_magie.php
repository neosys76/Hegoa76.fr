<?php
if( $_SESSION['jeu_espace'] == "magie" )
{
?>

  <div class="panneau_magie">
<?php
  // - on inclut la page requise pour le détail
  include "page_jeu_magie_{$_SESSION['magie_type']}.php";
?>
  </div>

<?php
}
?>