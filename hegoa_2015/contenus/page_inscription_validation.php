<div class="titre">Inscription
<a class="lien_fermer" href="index.php?page=accueil" title="<?php echo $this->traductions_debut['retour-accueil'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>
</div>
<?php
if(empty($message)){
	?>
	<p class="texte_validation">
	<?php echo $this->traductions['message-bienvenue'][$_SESSION['lang']]; ?>
	</p>
	<a  href="index.php?page=connexion">
	<img class="image_valider" src="images/connexion_inscription/btn_ok.png" >
</a>
<?php
}
else {
	?>

	<p style="padding-left:2em;font-family:hegoa_regular;font-size:2.5em;color:#d30;margin:0;"><?php echo $message; ?></p>
<?php
}
?>


