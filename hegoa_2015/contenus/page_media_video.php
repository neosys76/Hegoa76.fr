<?php
include "menu_intros.php";
?>
<div class="sous_menu">
    <span><a href="index.php?page=media"><?php  echo $this->traductions_debut["GalerieImages"][$_SESSION['lang']]; ?></a></span>
    <span><a href="index.php?page=media_video"><?php  echo $this->traductions_debut["Videos"][$_SESSION['lang']]; ?></a></span>
    <span><a href="index.php?page=media_fond"><?php  echo $this->traductions_debut["FondsEcran"][$_SESSION['lang']]; ?></a></span>
</div>

<div class="contenu_presentation">
	<div class="text_align_center">
	  <object type="application/x-shockwave-flash" data="./images/media/videos/trailer_libertribes.swf" width="800" height="600">
		  <param name="movie" value="./images/media/videos/trailer_libertribes.swf" />
		  <param name="quality" value="high" />
 	   <param name="play" value="true" />
 	 </object>
	</div>

</div>