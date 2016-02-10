<?php
include "menu_intros.php";
?>

<div class="sous_menu">
    <span><a href="index.php?page=media"><?php  echo $this->traductions_debut["GalerieImages"][$_SESSION['lang']]; ?></a></span>
    <span><a href="index.php?page=media_video"><?php  echo $this->traductions_debut["Videos"][$_SESSION['lang']]; ?></a></span>
    <span><a href="index.php?page=media_fond"><?php  echo $this->traductions_debut["FondsEcran"][$_SESSION['lang']]; ?></a></span>
</div>

<div class="contenu_presentation">

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


</div>

</body>

</html>
