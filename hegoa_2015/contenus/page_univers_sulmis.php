<?php
include "menu_intros.php";
include "menu_univers.php";
?>
<div class="contenu_presentation">
<div class="image_race">
	<img src="images/univers/sulmis.png" >
</div>

<div class="titre_race_presentation"><?php  echo $this->traductions_debut["sulmis"][$_SESSION['lang']]; ?></div>

<p class="description_race_presentation">
<?php  echo $this->traductions["presentation-sulmis"][$_SESSION['lang']]; ?>
</p>
</div>