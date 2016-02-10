<div class="titre"><?php echo $this->traductions["mon-compte-gestion"][$_SESSION['lang']]; ?>
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>
<?php
if(isset($_GET["erreur"])){
	if($_GET["erreur"]==1){
	?>
	<p class="erreur"><?php echo $this->traductions['data-non-mises-en-bdd-re-essai'][$_SESSION['lang']]; ?></p><br/>
	<a href="index.php?page=compte"><img src="images/compte/valider.png" alt="OK"></a>
	<?php
	}
}
else {
?>
<a class="bouton_action" href="index.php?page=compte_update">
<?php echo $this->traductions['mise-a-jour-compte'][$_SESSION['lang']]; ?>
</a>


<a class="bouton_action" href="index.php?page=compte_suppression">
<?php echo $this->traductions['suppression-compte'][$_SESSION['lang']]; ?>
</a>
<?php
}
?>
