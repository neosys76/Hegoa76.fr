
<div class="titre"><?php echo ucfirst($this->traductions['nouveau-mot-de-passe'][$_SESSION['lang']]); ?>
<a class="lien_fermer" href="index.php?page=accueil" title="<?php echo $this->traductions_debut['retour-accueil'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>
</div>
<?php
if(isset($this->message)&&!empty($this->message)){
?>
<p class="message"><?php echo $this->message; ?></p>
<?php
}
else {
?>
<p class="message"><?php echo $this->traductions["fournissez-email-enregistre"][$_SESSION['lang']]; ?>:</p>
<p>&nbsp;</p>
<form class="form_connexion" action="index.php?page=nouveau_mdp" method="post">
<?php
//  token de sécurité
if(isset($_SESSION["new_mdp_token"])&&!empty($_SESSION["new_mdp_token"])){$token = $_SESSION["new_mdp_token"];}
else {$token = "NA";}
?>
<input type="hidden" name="_tokenmdp" value="<?php echo $token; ?>" />
<div class="account_mail_label_connexion" >Email :
<input class="account_mail" type="email" name="account_mail" size=20 required></div>
<br/><br/>
<input  class="sub_nouveau_mdp" type="submit"  name="sub_new_mdp" value="<?php echo ucfirst($this->traductions_debut['envoyer'][$_SESSION['lang']]); ?>" />
</form>
<?php
}
?>
