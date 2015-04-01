<div class="titre">Inscription &agrave; la Newsletter</div>

<a class="lien_fermer" href="index.php?page=accueil">
<img class="image_fermer" name="image_fermer" src="images/newsletter/fermer.png" >
</a>

<form name="form_newsletter" action="index.php?page=newsletter_validation" method="post">

<div class="account_mail_label" >Adresse mail :</div>
<input class="account_mail" type="email" name="account_mail" required="required">

<img class="bouton_valider" src="images/newsletter/valider.png" name="bouton_valider" onclick="document.form_newsletter.submit();"  >
</form>