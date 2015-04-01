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
      <a class="lien_image" href="index.php?page=media">Galerie d'images</a>
      <a class="lien_video" href="index.php?page=media_video">Vid&eacute;os</a>
      <a class="lien_fond" href="index.php?page=media_fond">Fonds d'&eacute;crans</a>
</div>

<div class="contenu_media">
<!--
  <div class="contenu_bouton_prec">
    <a href="index.php?page=media"><img class="image_prev" src="images/media/prev.png" name="image_prev"></a>
  </div>
-->

<div class="galerie">

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.min.js"></script>

<?php

$dir_nom = './images/media/fonds'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom);
$fichier= array(); // on déclare le tableau contenant le nom des fichiers

while($element = readdir($dir))
{
  if($element != '.' && $element != '..')
  {
    if (!is_dir($dir_nom.'/'.$element))
    {$fichier[] = $element;}

  }
}

closedir($dir);

$nb_images = 0;
if(!empty($fichier))
{
    $nb_images = count($fichier);

    sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
}

    $iCpt = 0;
    foreach($fichier as $lien)
    {
      $iCpt++;

      // Image path data

      $size = getimagesize("./images/media/fonds/" . $lien );
      if ( $size[0] < $size [1] )
      {
        $width  = floor( ($size[ 0 ] / $size[1]) * 150);
        $height = 150;
      }
      else
      {
        $width  = 150;
        $height = floor( ($size[ 1 ] / $size[0]) * 150);
      }

      echo "<a href=\"images/media/fonds/$lien\" data-lightbox=\"hegoa\"><img width=\"$width\" height=\"$height\" class=\"example-image\" src=\"images/media/fonds/$lien\" alt=\"\"/></a>";
      if ($iCpt % 4 == 0)
      {
        echo "<br />";
      }


    }
?>

  </div>

  <div class="contenu_bouton_next">
<!--
  <a href="index.php?page=media"><img class="image_next" src="images/media/next.png" name="image_next"></a>
-->
  </div>

</div>

</body>

</html>
