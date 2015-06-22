<?php
include "menu_intros.php";
$image_width_in_css = 200;
$window_height = 620;
?>

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
<div class="fenetre_galerie">
<div id="deroulant_galerie" class="deroulant_galerie">
<?php

$dir_nom = './images/media/images'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
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
	//  calcul du nombre de "pages" de 9 images
	$nb_pages = floor($nb_images/9);
	if($nb_images % 9 !=0){$nb_pages +=1;}
	
    $iCpt = 0;
    foreach($fichier as $lien)
    {
      $iCpt++;

      // Image path data
		
      $size = getimagesize("./images/media/images/" . $lien );
      if ( $size[0] < $size [1] )
      {
        $width  = floor( ($size[ 0 ] / $size[1]) * $image_width_in_css);
        $height = $image_width_in_css;
      }
      else
      {
        $width  = $image_width_in_css;
        $height = floor( ($size[ 1 ] / $size[0]) * $image_width_in_css);
      }
      
      echo "<a href=\"images/media/images/$lien\" data-lightbox=\"hegoa\"><img width=\"$width\" height=\"$height\" class=\"example-image\" src=\"images/media/images/$lien\" alt=\"\"/></a>";

    }
?>
	</div>
	</div>
	<span class="pagination">
	Pages: &nbsp; 
		<?php
			for($i=1;$i<=$nb_pages;$i++){
				$topvalue = -($i-1)*$window_height;
				echo "<span class='numero_page' onclick=\"$('#deroulant_galerie').css('top','".$topvalue."px')\">$i</span>";
			}
		?>
	</span>
  </div>


</div>

</body>

</html>
#