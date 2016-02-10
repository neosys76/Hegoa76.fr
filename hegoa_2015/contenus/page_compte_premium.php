<div class="titre"><?php echo ucfirst($this->traductions['compte-premium'][$_SESSION['lang']]); ?>
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>
<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>
<?php
if(isset($_SESSION['account_id'])){$aller_a = "tdb";}
else {$aller_a = "accueil";}
?>

<div class="texte_premium">
<?php echo $this->traductions['presentation-1'][$_SESSION['lang']]; ?>
</div>
