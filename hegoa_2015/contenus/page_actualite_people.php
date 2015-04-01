<div class="menu">
 <ul id="contenu_menu">
    <li id="menu_univers"><a href="./index.php?page=univers">Univers</a></li>
    <li id="menu_medias"><a href="./index.php?page=media">M&eacute;dias</a></li>
    <li id="menu_forums"><a href="http://forum.hegoa.eu" target="_blank">Forums</a></li>
    <li id="menu_actualites"><a href="./index.php?page=actualite">Actualit&eacute;s</a></li>
 </ul>
</div>

<a href="./index.php"><img class="image_home" src="images/menu_bouton_home.png" name="image_home"></a></li>


<div class="onglet">
      <a class="lien_news" href="index.php?page=actualite">News</a>
      <a class="lien_video" href="index.php?page=actualite_business">Business</a>
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