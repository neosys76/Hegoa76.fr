<div class="titre"><?php echo $this->traductions['suppression-du-djun'][$_SESSION['lang']]; ?>
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
<p class="texte_suppression_djun">
<?php echo  $this->traductions['message-attention'][$_SESSION['lang']]; ?>
</p>

<a class="bouton_action" href="index.php?page=djun_suppression_validation"><?php echo ucfirst($this->traductions_debut['supprimer'][$_SESSION['lang']]); ?></a>

<?php
}
else {
?>
<p class="texte"><br/><br/>
<?php
echo $message;
?>
</p>
<?php
}
?>