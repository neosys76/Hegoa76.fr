<?php
if( $_SESSION['jeu_espace'] == "science" )
{
?>

  <div class="panneau_science">
<?php
  // - on inclut la page requise pour le d�tail
  include "page_jeu_science_{$_SESSION['science_type']}.php";
?>
  </div>

<?php
}
?>