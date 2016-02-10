<?php
include "menu_intros.php";
?>


<a class="lien_inscription" href="index.php?page=inscription">
<img class="image_inscription" src="images/accueil_inscription.png" name="image_inscription">
</a>

<a class="lien_connexion" href="index.php?page=connexion">
<img class="image_connexion" src="images/accueil_connexion.png" name="image_connexion">
</a>

<a class="newsletter" href="index.php?page=newsletter"><?php echo $this->traductions["inscription_newsletter"][$_SESSION['lang']]; ?></a>

<p class="presentation">
<?php echo $this->traductions["presente_communaute"][$_SESSION['lang']]; ?>

<a href="http://www.revevolutionair.org/">Revevolutionair.org</a>
</p>

<p class="contact">
<?php echo $this->traductions["nous_contacter"][$_SESSION['lang']]; ?>  : neosys[@]tuxfamily.org
</p>


