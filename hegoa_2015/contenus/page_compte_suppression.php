<div class="titre"><?php echo $this->traductions['suppression-compte'][$_SESSION['lang']]; ?>
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>
<?php
if(isset($_GET['erreur'])){
	if($_GET['erreur']==1){
		?>
		<p class="erreur">
			<?php echo $this->traductions['erreur-suppression-compte-re-essai'][$_SESSION['lang']]; ?><br/>
			<a class="bouton_action" href="index.php?page=compte_suppression"><?php echo ucfirst($this->traductions_debut['supprimer'][$_SESSION['lang']]); ?></a>
		</p>
		<?php
	}

}
else {
?>

<p class="texte"><?php echo $this->traductions_debut['attention-avertir'][$_SESSION['lang']]; ?>,<br />
<?php echo $this->traductions_debut['texte-avertissement'][$_SESSION['lang']]; ?>
</p>

<a class="bouton_action" href="index.php?page=compte_suppression_validation"><?php echo ucfirst($this->traductions_debut['supprimer'][$_SESSION['lang']]); ?></a>

<?php
}
?>