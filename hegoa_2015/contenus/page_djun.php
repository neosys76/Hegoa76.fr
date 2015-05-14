<div class="titre">Lancement du jeu</div>

<a class="lien_fermer" href="index.php?page=tdb">
<img class="image_fermer" name="image_fermer" src="images/djun/fermer.png" >
</a>

<div class="djun">
 <img class="image_djun" name="image_djun" src="images/djuns/djun<?php echo $_SESSION['djun_image']; ?>.png" >
</div>

<div class="djun_name" ><?=$_SESSION['djun_name']?></div>
<div class="djun_race" ><?=$_SESSION['djun_race']?></div>

<div class="djun_niveau_label" >Niveau</div>
<div class="djun_niveau" ><?=$_SESSION['djun_niveau']?></div>

<div class="djun_agressivite_label" >Agressivit&eacute;</div>
<div class="djun_agressivite" ><?=$_SESSION['djun_agressivite']?></div>

<div class="djun_efficacite_label" >Efficacit&eacute;</div>
<div class="djun_efficacite" ><?=$_SESSION['djun_efficacite']?></div>

<div class="djun_commerce_label" >Commerce</div>
<div class="djun_commerce" ><?=$_SESSION['djun_commerce']?></div>

<div class="djun_escroquerie_label" >Escroquerie</div>
<div class="djun_escroquerie" ><?=$_SESSION['djun_escroquerie']?></div>


<img class="image_mana" name="image_mana" src="images/djun/icone_mana.png" >
<div class="djun_mana" ><?=$_SESSION['djun_mana']?></div>

<img class="image_cyniam" name="image_cyniam" src="images/djun/icone_cyniam.png" >
<div class="djun_cyniam" ><?=$_SESSION['djun_cyniam']?></div>

<img class="image_bois" name="image_bois" src="images/djun/icone_bois.png" >
<div class="djun_bois" ><?=$_SESSION['djun_bois']?></div>

<img class="image_metal" name="image_metal" src="images/djun/icone_metal.png" >
<div class="djun_metal" ><?=$_SESSION['djun_metal']?></div>

<a class="lien_supprimer" href="index.php?page=djun_suppression">
<img class="image_supprimer" name="image_supprimer" src="images/djun/supprimer.png" >
</a>

<a class="lien_jouer" href="index.php?page=jeu">
<img class="image_jouer" name="image_jouer" src="images/djun/jouer.png" >
</a>


