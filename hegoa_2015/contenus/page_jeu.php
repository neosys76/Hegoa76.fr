<div class="panneau_joueur">

 <div class="cadre_djun">
  <a class="lien_djun" href="index.php?page=djun&avatar=<?php echo $_SESSION['djun_choisi']->nom; ?>">
    <img class="image_djun"   name="image_djun"  height="50" width="50" src="images/djuns/djun<?php echo $_SESSION['djun_choisi']->num_image; ?>.png" >
  </a>
 </div>

 <div class="djun_niveau_label" >Niv.</div>
 <div class="djun_niveau" ><?php echo $_SESSION['djun_choisi']->niveau; ?></div>

 <div class="djun_name" ><?php echo $_SESSION['djun_choisi']->nom; ?></div>

 <img class="image_icone_mana"   name="image_icone_mana"   src="images/jeu/joueur/icone_mana.png" >
 <div class="djun_mana" ><?php echo $_SESSION['djun_choisi']->mana_total; ?></div>

 <img class="image_icone_cyniam" name="image_icone_cyniam" src="images/jeu/joueur/icone_cyniam.png" >
 <div class="djun_cyniam" ><?php echo $_SESSION['djun_choisi']->cyniam; ?></div>

 <img class="image_icone_bois"   name="image_icone_bois"   src="images/jeu/joueur/icone_bois.png" >
 <div class="djun_bois" ><?php echo $_SESSION['djun_choisi']->bois; ?></div>

 <img class="image_icone_metal"  name="image_icone_metal"  src="images/jeu/joueur/icone_metal.png" >
 <div class="djun_metal" ><?php echo $_SESSION['djun_choisi']->fer; ?></div>

 <a class="lien_messagerie" href="index.php?page=messagerie">
 <img class="image_bouton_message" name="image_bouton_message" src="images/jeu/joueur/bouton_message_read.png" >
 </a>
</div>

<div class="panneau_jeu">