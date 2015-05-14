<?php      
       //   retour d'erreurs
       //   erreur = 1 => le nome de l'avatar existe déjà 
	if(isset($_GET['erreur'])){
		if($_GET['erreur']==1){
			$gotopage = "choix_djun";
			$message = "Ce nom d'avatar existe déjà. Choisissez un autre nom.";
		}
		if($_GET['erreur']==2){
			$message = "Vous avez déjà choisi 4  D'juns et vous avez donc atteint votre quota.";
			$gotopage = "tdb";
		}
	}
?>
<div class="titre">Incarner un D'jun</div> 

<a class="lien_fermer" href="index.php?page=tdb">
<img class="image_fermer" name="image_fermer" src="images/choix_djun/fermer.png" >
</a>
<?php
if(!isset($message)||empty($message)){
?>
<form name="formChoix" action="index.php?page=choix_djun_validation" method="post">

<div class="contenu_avatar_name">
  <div class="avatar_name_label">Nom de votre D'jun :</div>
  <div class="avatar_name_edit"><input class="avatar_name" type="text" name="avatar_name"  size="30"></div>
  <p class="explication_avatar">Cliquez sur l'image qui représentera votre D'jun</p>
</div>

<div class="contenu_avatar_navigation">
<?php
	for($i=1;$i<=$_SESSION['avatar_djun_id_max'];$i++){
?>
  <div class="contenu_avatar_image">
    <input type="image" src="images/djuns/djun<?php echo $i; ?>.png" alt="Image de D'jun no <?php echo $i; ?>" name="djun<?php echo $i; ?>" />
  </div>
  <?php } ?>
</div> <!-- contenu_avatar_navigation -->


</form>
<?php
}
else {
?>
<p class="erreur_djun"><?php echo $message; ?></p>
<a class="lien_valider" href="index.php?page=<?php echo $gotopage; ?>">
<img class="image_valider"  src="images/choix_djun/valider.png" >
</a>
<?php
}

?>