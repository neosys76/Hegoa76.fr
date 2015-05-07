<?php
include "menu_intros.php";
?>


<div class="onglet">
      <a class="lien_news" href="index.php?page=actualite">News</a>
      <a class="lien_fond" href="index.php?page=actualite_people">People</a>
</div>



<?php

$iNbActu = $_SESSION['actualite_compteur'];

if ( $iNbActu > 0 )
{
  echo "<div class=\"liste_actu\">\n";
}

for($i = 0; $i < $iNbActu; $i++)
{
  // - on récupère les infos
  $actualite_libelle        =  $_SESSION['actualite_libelle'][$i];
  $actualite_date_creation  =  $_SESSION['actualite_date_creation'][$i];

  echo "<div class=\"actualite\">";

  echo "<div class=\"actualite_date\">$actualite_date_creation</div>";
  echo "<div class=\"actualite_libelle\">$actualite_libelle</div>";

  echo "</div>"; // fin div class actualite
}

if ( $iNbActu > 0 )
{
  echo "</div>\n";
}

?>