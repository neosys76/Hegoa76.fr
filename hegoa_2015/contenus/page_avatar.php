<div class="titre">Avatar
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>
<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>


<div class="avatar_cadres">
<?php
if(isset($message)&&!empty($message)){
?>
<div class="message">
<?php
echo $message;
?>
</div>
<?php
}
?>
  <div class="avatar_index_libelle"><?php echo $this->traductions["index_agressivite"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->agressivite; ?></div>
<div class="clearfix"></div>
  <div class="avatar_index_libelle"><?php echo $this->traductions["index_efficacite"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->efficacite; ?></div>
<div class="clearfix"></div>
  <div class="avatar_index_libelle"><?php echo $this->traductions["index_escroquerie"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->escroquerie; ?></div>
<div class="clearfix"></div>
  <div class="avatar_index_libelle"><?php echo $this->traductions["index_commerce"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->commerce; ?></div>
<div class="clearfix"></div>
</div>

<div class="avatar_cadres">

    <div class="avatar_index_libelle"><?php echo $this->traductions_debut["nom"][$_SESSION['lang']]; ?></div>
    <div class="avatar_index_libelle colvert1"><?php echo $_SESSION['djun_choisi']->nom; ?></div>
<div class="clearfix"></div>
    <div class="avatar_index_libelle"><?php echo $this->traductions_debut["peuple"][$_SESSION['lang']]; ?></div>
    <div class="avatar_index_libelle colvert1"><?php echo $_SESSION['djun_choisi']->race; ?></div>
	<?php
		if(isset($guilde)&&!empty($guilde)){
	 ?>
    <div class="avatar_guilde_libelle"><?php echo $this->traductions_debut["guilde"][$_SESSION['lang']]; ?></div>
    <div class="avatar_guilde"><?php echo $guilde; ?></div>
	<?php
    	}
	?>
</div>
<div class="avatar_cadres">
  <form action="index.php?page=avatar_histoire" method="post">
    <div class="avatar_histoire_libelle"><?php echo $this->traductions["mon_histoire"][$_SESSION['lang']]; ?></div>
    <div class="avatar_histoire_valeur"><textarea rows="5" cols="50" name="histoire"><?php if(isset($_SESSION["djun_choisi"]->histoire)&&!empty($_SESSION["djun_choisi"]->histoire)){echo $_SESSION["djun_choisi"]->histoire;} ?></textarea></div>
<br/>
    <input type="submit" value="Valider">
  </form>
  <p>&nbsp;</p>
</div>


