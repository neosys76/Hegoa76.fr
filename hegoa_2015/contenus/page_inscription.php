<div class="titre">Inscription</div>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/inscription/fermer.png" >
</a>
<?php
if(isset($_GET['erreur'])&&$_GET['erreur']=='1'){
?>
<p style="padding-left:2em;font-family:hegoa_regular;font-size:2.5em;color:#d30;margin:0;">Cette adresse email existe déjà. Seriez-vous déjà inscrit?</p>
<?php
}
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