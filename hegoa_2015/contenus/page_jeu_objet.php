<?php
if( $_SESSION['jeu_espace'] == "objet" )
{
?>

  <div class="panneau_objet">
<?php
  // - on inclut la page requise pour le détail
  include "page_jeu_objet_{$_SESSION['objet_type']}.php";
?>
  </div>

<?php
}
?>

