<div class="titre">Inscription</div>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/inscription/fermer.png" >
</a>
<?php
if(isset($_GET['erreur'])&&$_GET['erreur']=='1'){
?>
<p style="text-align: center;font-family:Kleymissky;font-size:26px;color:#330000;margin:0;"><b>Cette adresse email existe déjà.</br> Seriez-vous déjà inscrit?</b></p>
<?php
}
elseif(isset($message)&&!empty($message)){
?>
<p style="text-align: center;font-family:Kleymissky;font-size:26px;color:#330000;margin:0;"><b><?php echo $message; ?></b></p>
<?php
}
else {
?>
<form name="form_inscription" action="index.php?page=inscription_validation" method="post">
<?php
//  token de sécurité
if(isset($_SESSION['inscription_token'])&&!empty($_SESSION['inscription_token'])){$token = $_SESSION['inscription_token'];}
else {$token = "NA";}
?>
<input type="hidden" name="_token" value="<?php echo $token; ?>" />
<div class="account_mail_label" >Adresse mail :
<input class="account_mail" type="email" name="account_mail" size=20 required></div>

<div class="account_password_label" >Mot de passe :
<input class="account_password" type="password" name="account_password" size=20 required></div>


<a class="lien_connexion" href="index.php?page=connexion">D&eacute;j&agrave; membre. Se connecter.</a>

<input class="bouton_valider"  type="image" src="images/inscription/valider.png" alt="Valider" />

</form>
<?php
}
?>