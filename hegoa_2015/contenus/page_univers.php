<?php
include "menu_intros.php";
include "menu_univers.php";
?>

<div class="contenu_presentation">
<div class="image">
	<img src="images/univers/histoire.png" >
</div>

<div class="titre_race_presentation">
<?php  echo $this->traductions["bienvenue-sur-hegoa"][$_SESSION['lang']]; ?></div>
<p class="description_race_presentation">
<?php  echo $this->traductions["presentation-libertribes"][$_SESSION['lang']]; ?>
</p>
<div class="titre_race_presentation"><?php  echo $this->traductions["qui-es-tu"][$_SESSION['lang']]; ?></div>
<p class="description_race_presentation">
<?php  echo $this->traductions["salutations-qui-es-tu"][$_SESSION['lang']]; ?>
<br />
1 / 3 &nbsp;&nbsp; <a href="./index.php?page=univers_2"> <?php  echo ucfirst($this->traductions_debut["suivant"][$_SESSION['lang']]); ?> </a><span class="ftsz2p5em v_align_m0p15em colbrun2"> &gt;</span>
</p>
</div>