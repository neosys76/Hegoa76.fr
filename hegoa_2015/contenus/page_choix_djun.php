<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" >
var left=0;
</script>
<?php      
	$largeur_image_djun = 220;
       //   retour d'erreurs
       //   erreur = 1 => le nom de l'avatar existe déjà 
	if(isset($_GET['erreur'])){
		if($_GET['erreur']==1){
			$gotopage = "choix_djun";
			$message = $this->traductions["nom_existe"][$_SESSION['lang']];
		}
		elseif($_GET['erreur']==2){
			$message = $this->traductions["quota_atteint_1"][$_SESSION['lang']].MAX_DJUNS.$this->traductions["quota_atteint_2"][$_SESSION['lang']];
			$gotopage = "tdb";
		}
		elseif($_GET['erreur']==3){
			$message = $this->traductions["nom-manquant"][$_SESSION['lang']];
			$gotopage = "choix_djun";
		}
	}
?>
<div class="titre">
<?php echo $this->traductions["titre_djun"][$_SESSION['lang']]; ?>
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div> 

<?php
if(!isset($message)||empty($message)){
?>
<form action="index.php?page=choix_djun_validation" method="post">

<div>
  <div class="avatar_name_label"><?php echo $this->traductions["nom_djun"][$_SESSION['lang']]; ?> : &nbsp;&nbsp;&nbsp;
  <input class="avatar_name" type="text" name="avatar_name"  size="30" ></div>
  <p class="explication_avatar"><?php echo $this->traductions["clic_image"][$_SESSION['lang']]; ?></p>
</div>

<div class="contenu_avatar_navigation">
<img class="image_prev" src="images/choix_djun/prev.png" onclick="if(left>-<?php echo ($_SESSION['avatar_djun_images']-1)*$largeur_image_djun; ?>){left -= <?php echo $largeur_image_djun; ?>};$('#bandeau').css('left',left);">
<div class="fenetre_bandeau" >
<div id="bandeau">
<?php
	for($i=1;$i<=$_SESSION['avatar_djun_images'];$i++){
?>
  <div class="contenu_avatar_image" >
    <input type="image" src="images/djuns/djun<?php echo $i; ?>.png" alt="D'jun no <?php echo $i; ?>" name="djun<?php echo $i; ?>" />
  </div>
  <?php } ?>
  </div>
    </div>
 <img class="image_next" src="images/choix_djun/next.png" onclick="if(left<0){left += <?php echo $largeur_image_djun; ?>};$('#bandeau').css('left',left);">

</div> <!-- contenu_avatar_navigation -->


</form>
<?php
}
else {
?>
<p class="erreur_djun" ><?php echo $message; ?></p>
<a class="bouton_action" href="index.php?page=<?php echo $gotopage; ?>">
OK
</a>
<?php
}

?>
