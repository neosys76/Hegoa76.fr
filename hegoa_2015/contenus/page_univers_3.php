<?php
include "menu_intros.php";
include "menu_univers.php";
?>
<div class="contenu_presentation">
<div class="image">
	<img src="images/univers/histoire.png" >
</div>

<div class="titre_race_presentation">
<?php  echo $this->traductions["au-commencement-suite"][$_SESSION['lang']]; ?>
</div>
<p class="description_race_presentation">
<?php  echo $this->traductions["presentation-commencement-suite"][$_SESSION['lang']]; ?><br />
<span class="ftsz2p5em v_align_m0p15em colbrun2"> &lt; </span><a href="./index.php?page=univers_2"> <?php  echo ucfirst($this->traductions_debut["precedent"][$_SESSION['lang']]); ?> </a> &nbsp;&nbsp; 3 / 3
</p>
</div>
