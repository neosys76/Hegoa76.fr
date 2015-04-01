<div class="titre">Inscription</div>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/inscription/fermer.png" >
</a>

<form name="form_inscription" action="index.php?page=inscription_validation" method="post">

<div class="account_mail_label" >Adresse mail :
<input class="account_mail" type="text" name="account_mail" size=20></div>

<div class="account_password_label" >Mot de passe :
<input class="account_password" type="password" name="account_password" size=20></div>
</form>

<a class="lien_connexion" href="index.php?page=connexion">D&eacute;j&agrave; membre. Se connecter.</a>

<img class="bouton_valider" src="images/inscription/valider.png" name="bouton_valider" onclick="document.form_inscription.submit();"  >