<div class="titre">Inscription</div>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/inscription_validation/fermer.png" >
</a>
<?php
if(empty($message)){
	?>
	<p class="texte">
	F&eacute;licitations !<br />
	<br />
	Vous faites &agrave; pr&eacute;sent partie des tribus d'H&eacute;goa...<br />
	<br />
	( Un message de confirmation arrive sur votre boite mail. )<br />
	<br/>
	Merci de confirmer avant d'incarner un D'jun,<br />
	l'esprit protecteur de votre future tribu.<br />
	</p>
	<a class="lien_fermer" href="index.php?page=accueil">
	<img class="image_valider" name="image_valider" src="images/inscription_validation/valider.png" >
</a>
<?php
}
else {
	?>
	<p style="padding-left:2em;font-family:hegoa_regular;font-size:2.5em;color:#d30;margin:0;"><?php echo $message; ?></p>
<?php
}
?>


