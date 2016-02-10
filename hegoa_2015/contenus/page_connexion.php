
<div class="titre"><?php echo ucfirst($this->traductions_debut['connexion'][$_SESSION['lang']]); ?>
<a class="lien_fermer" href="index.php?page=accueil" title="<?php echo $this->traductions_debut['retour-accueil'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>
</div>

<?php
if(isset($_GET['erreur'])&&$_GET['erreur']=='0'){
?>
<p class="message"><?php echo $this->traductions_debut['il-manque-votre-mot-de-passe'][$_SESSION['lang']]. ". ".$this->traductions_debut["recommencez"][$_SESSION['lang']]; ?><br/><br/>
<a href="index.php?page=connexion"><img src="images/connexion_inscription/btn_ok.png" alt="OK"></a>
</p>
<?php
}
elseif(isset($_GET['erreur'])&&$_GET['erreur']=='1'){
?>
<p class="message"><?php echo $this->traductions["form-incomplet-re-essai"][$_SESSION['lang']] ; ?><br/><br/>
<a href="index.php?page=connexion"><img src="images/connexion_inscription/btn_ok.png" alt="OK"></a>
</p>
<?php
}
elseif(isset($_GET['erreur'])&&$_GET['erreur']=='2'){
?>
<p class="message"><?php echo $this->traductions["token-incorrect-re-essai"][$_SESSION['lang']] ; ?><br/><br/>
<a href="index.php?page=connexion"><img src="images/connexion_inscription/btn_ok.png" alt="OK"></a>
</p>
<?php
}
elseif(isset($_GET['erreur'])&&$_GET['erreur']=='3'){
?>
<p class="message"><?php echo $this->traductions["pour-acceder-jeu-faut-etre-connecte"][$_SESSION['lang']] ; ?><br/><br/>
<a href="index.php?page=connexion"><img src="images/connexion_inscription/btn_ok.png" alt="OK"></a>
</p>
<?php
}
elseif(isset($_GET['erreur'])&&$_GET['erreur']=='10'){
?>
<p class="message"><?php echo $this->traductions["erreur-1"][$_SESSION['lang']] ; ?><br/><br/>
<a href="index.php?page=connexion"><img src="images/connexion_inscription/btn_ok.png" alt="OK"></a>
</p>
<?php
}
elseif(isset($_GET['erreur'])&&$_GET['erreur']=='100'){
?>
<p class="message"><?php echo $this->traductions["erreur-2"][$_SESSION['lang']] ; ?><br/><br/>
<a href="index.php?page=connexion"><img src="images/connexion_inscription/btn_ok.png" alt="OK"></a>
</p>
<?php
}
elseif(isset($message)&&!empty($message)){
?>
<p class="message"><?php echo $message; ?><br/><br/>
<a href="index.php?page=connexion"><img src="images/connexion_inscription/btn_ok.png" alt="OK"></a>
</p>
<?php
}
else {
?>
<form class="form_connexion" name="form_connexion" action="index.php?page=connexion_validation" method="post">
<?php
//  token de sécurité
if(isset($_SESSION['connexion_token'])&&!empty($_SESSION['connexion_token'])){$token = $_SESSION['connexion_token'];}
else {$token = "NA";}
?>
<input type="hidden" name="_token" value="<?php echo $token; ?>" />
<div class="account_mail_label_connexion" >Email :
<input class="account_mail" type="email" name="account_mail" size=20 required></div>

<div class="account_password_label" ><?php echo ucfirst($this->traductions_debut["mot-de-passe"][$_SESSION['lang']]) ; ?> :
<input class="account_password" type="password" name="account_password" size=20 ></div>

<input class="bouton_valider"  type="image" src="images/connexion_inscription/btn_connexion.png" alt="<?php echo ucfirst($this->traductions_debut['connexion'][$_SESSION['lang']]) ; ?>" />
</form>
<a class="lien_connexion" href="index.php?page=inscription"><?php echo $this->traductions["pas-encore-inscrit-cliquez-ici"][$_SESSION['lang']]; ?>.</a>
<a class="lien_connexion" href="index.php?page=nouveau_mdp"><?php echo $this->traductions["mot-de-passe-oublie-email-re-initialiser"][$_SESSION['lang']]; ?> ! </a>

<?php
}
?>
