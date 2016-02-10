<div class="panneau_joueur">

 <div class="cadre_djun">
  <a href="index.php?page=djun&avatar=<?php echo $_SESSION['djun_choisi']->nom; ?>">
    <img src="images/djuns/djun<?php echo $_SESSION['djun_choisi']->num_image; ?>.png" alt="Djun">
  </a>
 </div>
<div class="djun_caract_ligne1">
 <p class="colvert2"><?php echo $_SESSION['djun_choisi']->nom; ?></p>
 <p><span><?php echo ucfirst($this->traductions_debut['niveau'][$_SESSION['lang']]); ?>: </span>
 <span><?php echo $_SESSION['djun_choisi']->niveau; ?></span></p>
 <p class="messagerie">
 <a href="index.php?page=messagerie">
 <img src="images/jeu/joueur/bouton_message_read.png" alt="messagerie">
 </a> 
 <a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
 </p>
</div>
<div class="djun_caract_ligne2">
 <p><img src="images/jeu/joueur/icone_mana.png" alt="mana" >
 <span><?php echo $_SESSION['djun_choisi']->mana_total; ?></span></p>

 <p><img src="images/jeu/joueur/icone_cyniam.png" alt="cyniam">
 <span><?php echo $_SESSION['djun_choisi']->cyniam; ?></span></p>

<p> <img src="images/jeu/joueur/icone_bois.png" alt="bois">
 <span><?php echo $_SESSION['djun_choisi']->bois; ?></span></p>

<p><img src="images/jeu/joueur/icone_metal.png" alt="metal">
<span><?php echo $_SESSION['djun_choisi']->fer; ?></span></p>

</div>
</div>

<div class="panneau_jeu">