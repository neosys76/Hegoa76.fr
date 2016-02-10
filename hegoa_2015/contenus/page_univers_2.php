<?php
include "menu_intros.php";
include "menu_univers.php";
?>

<div class="contenu_presentation">
<div class="image">
	<img src="images/univers/histoire.png" >
</div>

<div class="titre_race_presentation">
<?php  echo $this->traductions["au-commencement"][$_SESSION['lang']]; ?>
</div>
<p class="description_race_presentation">
<?php  echo $this->traductions["presentation-commencement"][$_SESSION['lang']]; ?>
<br />
<span class="ftsz2p5em v_align_m0p15em colbrun2"> &lt; </span><a href="./index.php?page=univers"> <?php  echo ucfirst($this->traductions_debut["precedent"][$_SESSION['lang']]); ?> </a> &nbsp;&nbsp; 2 / 3 &nbsp;&nbsp; <a href="./index.php?page=univers_3"> <?php  echo ucfirst($this->traductions_debut["suivant"][$_SESSION['lang']]); ?> </a><span class="ftsz2p5em v_align_m0p15em colbrun2"> &gt;</span>
</p>
</div>

