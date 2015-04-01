<div class="titre">Mise en vente</div>

<a class="lien_fermer" href="index.php?page=jeu">
<img class="image_fermer" name="image_fermer" src="images/choix_djun/fermer.png" >
</a>

<form name="formChoix" action="index.php?page=choix_vente_validation" method="post">
  <input type="hidden" name="choix_vente_type" value="">

  <div class="contenu_choix_vente_texte">
  Vous &ecirc;tes sur le point de vendre<br />
  <br />
  <br />
     XXXXXXX<br />
  <br />
  <br />
  </div>

  <div class="contenu_choix_vente_validation_libelle">Choississez le mode de vente.</div>

  <div class="contenu_choix_vente_validation">
    <img class="image_bourse" src="images/choix_vente/bourse.png" name="choix_vente_bourse"onclick="document.formChoix.choix_vente_type.value='bourse';document.formChoix.submit();" >
    <img class="image_marche" src="images/choix_vente/marche.png" name="choix_vente_marche"onclick="document.formChoix.choix_vente_type.value='marche';document.formChoix.submit();" >
  </div>

</form>
