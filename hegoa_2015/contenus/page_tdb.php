<div class="titre">Tableau de bord</div>

<a class="lien_compte" href="index.php?page=compte">
<img class="image_compte" name="image_compte" src="images/tdb/compte.png" >
</a>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/tdb/fermer.png" >
</a>


<?php

$iNbDjun = $_SESSION['tdb_djun_compteur'];

if ( $iNbDjun > 0 )
{
  echo "<div class=\"liste_djun\">\n";
}

for($i = 0; $i < $iNbDjun; $i++)
{
  // - on récupère les infos
  $djun_no   =  1;
  $djun_name =  $_SESSION['tdb_djun_name'][$i];
  $djun_race =  $_SESSION['tdb_djun_race'][$i];

  echo "<div class=\"djun\">";

  // - On formate le code html
  if ($djun_name != "" )
  {
    $image = "images/djuns/djun".$djun_no.".png";
    if ( $djun_race != "")
    {
      $page = "djun&avatar=$djun_name";
    }
    else
    {
      $page = "choix_peuple&avatar=$djun_name";
    }
  }
  else
  {
    $page = "choix_djun";
    $image = "images/tdb/djun_vide.png";
  }

  echo "<a class=\"lien_choix_djun\" href=\"index.php?page=$page\">\n";
  echo "  <img class=\"image_choix_djun\" width=100 height=100 name=\"image_choix_djun\" src=\"$image\" >\n";
  echo "</a>\n";

  echo "</div>"; // fin div class djun
}

if ( $iNbDjun > 0 )
{
  echo "</div>\n";
}

?>