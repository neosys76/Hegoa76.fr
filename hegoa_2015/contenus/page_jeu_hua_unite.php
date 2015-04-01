<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "unite" )
{
?>

  <div class="panneau_hua_unite">
<?php
  // - on inclut la page requise pour le détail
  include "page_jeu_hua_unite_{$_SESSION['hua_type']}.php";
?>
  </div>

<?php
}
?>


