<div class="titre">Connexion</div>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/connexion/fermer.png" >
</a>

<form name="form_connexion" action="index.php?page=connexion_validation" method="post">

<div class="account_mail_label" >Mail :
<input class="account_mail" type="text" name="account_mail" size=20></div>

<div class="account_password_label" >Mot de passe :
<input class="account_password" type="password" name="account_password" size=20></div>
</form>

<a class="lien_inscription" href="index.php?page=inscription">Pas encore inscrit ? Cliquez ici.</a>

<img class="bouton_valider" src="images/connexion/valider.png" name="bouton_valider" onclick="document.form_connexion.submit();"  >



