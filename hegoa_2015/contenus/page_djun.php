<div class="titre">Lancement du jeu</div>
<a class="lien_fermer" href="index.php?page=tdb" title="Retour au TDB" >
<img class="image_fermer" name="image_fermer" src="images/djun/fermer.png" >
</a>

<div class="djun">
 <a href="?page=avatar"><img class="image_djun" name="image_djun" src="images/djuns/djun<?php echo $_SESSION['djun_choisi']->num_image; ?>.png" ></a>
</div>

<div class="djun_name" ><?php echo $_SESSION['djun_choisi']->nom; ?></div>
<div class="djun_race" ><?php echo $_SESSION['djun_choisi']->race; ?></div>

<div class="djun_niveau_label" >Niveau</div>
<div class="djun_niveau" ><?php echo $_SESSION['djun_choisi']->niveau; ?></div>

<div class="djun_agressivite_label" >Agressivit&eacute;</div>
<div class="djun_agressivite" ><?php echo $_SESSION['djun_choisi']->agressivite; ?></div>

<div class="djun_efficacite_label" >Efficacit&eacute;</div>
<div class="djun_efficacite" ><?php echo $_SESSION['djun_choisi']->efficacite; ?></div>

<div class="djun_commerce_label" >Commerce</div>
<div class="djun_commerce" ><?php echo $_SESSION['djun_choisi']->commerce; ?></div>

<div class="djun_escroquerie_label" >Escroquerie</div>
<div class="djun_escroquerie" ><?php echo $_SESSION['djun_choisi']->escroquerie; ?></div>


<img class="image_mana" name="image_mana" src="images/djun/icone_mana.png" >
<div class="djun_mana" ><?php echo $_SESSION['djun_choisi']->mana_total; ?></div>

<img class="image_cyniam" name="image_cyniam" src="images/djun/icone_cyniam.png" >
<div class="djun_cyniam" ><?php echo $_SESSION['djun_choisi']->cyniam; ?></div>

<img class="image_bois" name="image_bois" src="images/djun/icone_bois.png" >
<div class="djun_bois" ><?php echo $_SESSION['djun_choisi']->bois; ?></div>

<img class="image_metal" name="image_metal" src="images/djun/icone_metal.png" >
<div class="djun_metal" ><?php echo $_SESSION['djun_choisi']->fer; ?></div>

<a class="lien_supprimer" href="index.php?page=djun_suppression">
<img class="image_supprimer" name="image_supprimer" src="images/djun/supprimer.png" >
</a>

<a class="lien_jouer" href="index.php?page=jeu">
<img class="image_jouer" name="image_jouer" src="images/djun/jouer.png" >
</a>


