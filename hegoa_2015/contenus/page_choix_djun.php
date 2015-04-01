<div class="titre">Incarner un D'jun</div>

<a class="lien_fermer" href="index.php?page=tdb">
<img class="image_fermer" name="image_fermer" src="images/choix_djun/fermer.png" >
</a>

<form name="formChoix" action="index.php?page=choix_djun_validation" method="post">

<input type="hidden" name="avatar_action" value="valider">
<input type="hidden" name="avatar_djun_id"     value="<?=$_SESSION['avatar_djun_id']?>">
<input type="hidden" name="avatar_djun_id_max" value="<?=$_SESSION['avatar_djun_id_max']?>">

<div class="contenu_avatar_name">
  <div class="avatar_name_label">Nom de votre D'jun :</div>
  <div class="avatar_name_edit"><input class="avatar_name" type="text" name="avatar_name" value="<?=$_SESSION['avatar_name']?>" size="30"></div>
</div>

<div class="contenu_avatar_navigation">

  <div class="contenu_bouton_prev">
<?php
  if ( ! empty($_SESSION['avatar_djun_id']) && ($_SESSION['avatar_djun_id'] >  1) )
  {
?>
    <img class="image_prev" src="images/choix_djun/prev.png" name="avatar_prev" onclick="document.formChoix.avatar_action.value='prev';document.formChoix.submit();">
<?php
  }
?>
  </div>



  <div class="contenu_avatar_image">
    <img class="image_avatar" src="<?=$_SESSION['avatar_image']?>" name="image_avatar">
  </div>

  <div class="contenu_bouton_next">
<?php
  if ( ! empty($_SESSION['avatar_djun_id']) && ($_SESSION['avatar_djun_id'] < $_SESSION['avatar_djun_id_max']) )
  {
?>
    <img class="image_next" src="images/choix_djun/next.png" name="avatar_next"onclick="document.formChoix.avatar_action.value='next';document.formChoix.submit();" >
<?php
  }
?>
  </div>

</div> <!-- contenu_avatar_navigation -->

  <div class="contenu_avatar_validation">
    <img class="image_valider" src="images/choix_djun/valider.png" name="avatar_valider" onclick="document.formChoix.avatar_action.value='valider';document.formChoix.submit();"  >
  </div>

</form>
