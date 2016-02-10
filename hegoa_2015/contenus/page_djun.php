<div class="titre"><?php echo ucfirst($this->traductions['lancement-du-jeu'][$_SESSION['lang']]); ?>
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>

<div class="djun_image">
 <a href="?page=avatar"><img src="images/djuns/djun<?php echo $_SESSION['djun_choisi']->num_image; ?>.png"  alt="Djun"></a>
 <a class="bouton_action" href="index.php?page=djun_suppression">
<?php echo ucfirst($this->traductions_debut['supprimer'][$_SESSION['lang']]); ?>
</a>
</div>

<div class="djun_caracteristiques">
<div class="djun_name colbrun2" ><?php echo $_SESSION['djun_choisi']->nom; ?></div>
<div class="djun_race colvert1" ><?php echo $_SESSION['djun_choisi']->race; ?></div>

<span><?php echo ucfirst($this->traductions_debut['niveau'][$_SESSION['lang']]); ?></span>
<span><?php echo $_SESSION['djun_choisi']->niveau; ?></span>
<br/>
<span><?php echo ucfirst($this->traductions_debut['agressivite'][$_SESSION['lang']]); ?></span>
<span><?php echo $_SESSION['djun_choisi']->agressivite; ?></span>
<br/>
<span><?php echo ucfirst($this->traductions_debut['efficacite'][$_SESSION['lang']]); ?></span>
<span><?php echo $_SESSION['djun_choisi']->efficacite; ?></span>
<br/>
<span><?php echo ucfirst($this->traductions_debut['commerce'][$_SESSION['lang']]); ?></span>
<span><?php echo $_SESSION['djun_choisi']->commerce; ?></span>
<br/>
<span><?php echo ucfirst($this->traductions_debut['escroquerie'][$_SESSION['lang']]); ?></span>
<span><?php echo $_SESSION['djun_choisi']->escroquerie; ?></span>
<br/><br/>

<p><img src="images/djun/icone_mana.png" alt="mana" >
<span><?php echo $_SESSION['djun_choisi']->mana_total; ?></span></p>

<p><img src="images/djun/icone_cyniam.png" alt="cyniam">
<span><?php echo $_SESSION['djun_choisi']->cyniam; ?></span></p>

<p><img src="images/djun/icone_bois.png" alt="bois" >
<span><?php echo $_SESSION['djun_choisi']->bois; ?></span></p>

<p><img src="images/djun/icone_metal.png" alt="metal" >
<span><?php echo $_SESSION['djun_choisi']->fer; ?></span></p>

<span class="jouer">
<a  class="bouton_jouer" href="index.php?page=jeu">
<?php echo ucfirst($this->traductions_debut['jouer'][$_SESSION['lang']]); ?>
</a>
</span>
</div>





