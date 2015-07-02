<div class="titre">Connexion</div>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/connexion/fermer.png" >
</a>
<?php
if(isset($_GET['erreur'])&&$_GET['erreur']=='1'){
?>
<p style="text-align: center;font-family:kleymisskyregular;font-size:26px;font-weight: bold;color:#330000;margin:0;"><b>Le formulaire n'est pas complet. Réessayez.</b></p>
<?php
}
elseif(isset($_GET['erreur'])&&$_GET['erreur']=='2'){
?>
<p style="text-align: center;font-family:kleymisskyregular;font-size:26px;font-weight: bold;color:#330000;margin:0;"><b>Le token de sécurité est incorrect. Réessayez.</b></p>
<?php
}
elseif(isset($_GET['erreur'])&&$_GET['erreur']=='10'){
?>
<p style="text-align: center;font-family:kleymisskyregular;font-size:26px;font-weight: bold;color:#330000;margin:0;"><b>Soit le compte est en attente de validation, soit le compte n'existe pas et il faut alors vous inscrire, soit les données introduites sont incorrectes et il faut réessayez.</b></p>
<?php
}
elseif(isset($message)&&!empty($message)){
?>
<p style="text-align: center;font-family:kleymisskyregular;font-size:26px;font-weight: bold;color:#330000;margin:0;"><b><?php echo $message; ?></b></p>
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
<div class="account_mail_label" >Mail :
<input class="account_mail" type="email" name="account_mail" size=20 required></div>

<div class="account_password_label" >Mot de passe :
<input class="account_password" type="password" name="account_password" size=20 required></div>


<a class="lien_inscription" href="index.php?page=inscription">Pas encore inscrit ? Cliquez ici.</a>

<input class="bouton_valider"  type="image" src="images/connexion/valider.png" alt="Valider" />
</form>
<?php
}
?>
