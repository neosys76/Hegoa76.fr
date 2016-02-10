<div class="titre"><?php echo $this->traductions["mise_en_vente"][$_SESSION['lang']]; ?>
<a class="lien_fermer" href="index.php?page=jeu" title="<?php echo $this->traductions_debut['retour-page-jeu'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>

</div>

<form name="formChoix" action="index.php?page=choix_vente_validation" method="post">
  <input type="hidden" name="choix_vente_type" value="">

  <div class="contenu_choix_vente_texte">
  <?php echo $this->traductions["point_de_vendre"][$_SESSION['lang']]; ?><br />
  <br />
  <br />
     XXXXXXX<br />
  <br />
  <br />
  </div>

  <div class="contenu_choix_vente_validation_libelle"><?php echo $this->traductions["choix_mode"][$_SESSION['lang']]; ?></div>

  <div class="contenu_choix_vente_validation">
    <img class="image_bourse" src="images/choix_vente/bourse.png" name="choix_vente_bourse"onclick="document.formChoix.choix_vente_type.value='bourse';document.formChoix.submit();" >
    <img class="image_marche" src="images/choix_vente/marche.png" name="choix_vente_marche"onclick="document.formChoix.choix_vente_type.value='marche';document.formChoix.submit();" >
  </div>

</form>
