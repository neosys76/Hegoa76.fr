<div class="titre">Inscription
<a class="lien_fermer" href="index.php?page=accueil" title="<?php echo $this->traductions_debut['retour-accueil'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>
</div>
<?php
if(isset($_GET['erreur'])&&$_GET['erreur']=='1'){
?>
<p class="message"><?php echo $this->traductions['erreur-1'][$_SESSION['lang']]; ?></p>
<?php
}
elseif(isset($message)&&!empty($message)){
?>
<p class="message"><b><?php echo $message; ?></b></p>
<?php
}
else {
?>
<form action="index.php?page=inscription_validation" method="post">
<?php
//  token de sécurité
if(isset($_SESSION['inscription_token'])&&!empty($_SESSION['inscription_token'])){$token = $_SESSION['inscription_token'];}
else {$token = "NA";}
?>
<input type="hidden" name="_token" value="<?php echo $token; ?>" />
<div class="account_mail_label_inscription" ><?php echo $this->traductions['adresse-mail'][$_SESSION['lang']]; ?> :
<input class="account_mail" type="email" name="account_mail" size=20 required></div>

<div class="account_password_label" ><?php echo $this->traductions_debut['mot-de-passe'][$_SESSION['lang']]; ?> :
<input class="account_password" type="password" name="account_password" size=20 required></div>


<a class="lien_connexion" href="index.php?page=connexion"><?php echo $this->traductions['deja-membre-se-connecter'][$_SESSION['lang']]; ?></a>

<input class="bouton_valider"  type="image" src="images/connexion_inscription/btn_valider.png" alt="Valider" />

</form>
<?php
}
?>