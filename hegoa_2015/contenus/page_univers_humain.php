<?php
include "menu_intros.php";
include "menu_univers.php";
?>

<div class="contenu_presentation">
<div class="image_race">
	<img src="images/univers/humain.png" >
</div>

<div class="titre_race_presentation"><?php  echo $this->traductions_debut["humain"][$_SESSION['lang']]; ?></div>

<p class="description_race_presentation">
<?php  echo $this->traductions["presentation-humains"][$_SESSION['lang']]; ?>
</p>
</div>