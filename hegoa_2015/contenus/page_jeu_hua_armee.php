<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "armee" )
{
?>

  <div class="panneau_hua_armee">
<?php
  // - on inclut la page requise pour le détail
  include "page_jeu_hua_armee_{$_SESSION['hua_type']}.php";
?>
  </div>

<?php
}
?>


