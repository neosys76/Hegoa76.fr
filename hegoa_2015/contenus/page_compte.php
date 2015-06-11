<div class="titre">Mon compte</div>

<a class="lien_fermer" href="index.php?page=tdb">
<img class="image_fermer" name="image_fermer" src="images/compte/fermer.png" >
</a>

<form name="form_compte" action="index.php?page=compte_validation" method="post">

<div class="account_lastname_label" >Nom :</div>
<input class="account_lastname" type="text" name="account_lastname" value="<?=$_SESSION['account_lastname']?>" size="30">

<div class="account_firstname_label" >Pr&eacute;nom :</div>
<input class="account_firstname" type="text" name="account_firstname" value="<?=$_SESSION['account_firstname']?>" size="30">

<div class="account_mail_label" >Adresse mail :</div>
<input class="account_mail" type="text" name="account_mail" value="<?=$_SESSION['account_mail']?>" size="50">

<div class="account_password_label" >Mot de passe :</div>
<input class="account_password" type="password" name="account_password" value="<?=$_SESSION['account_password']?>" size="32">

<div class="account_naissance_label">Date de naissance :</div>
<input class="account_jour"  type="text" name="account_jour"  size="2" value="<?=$_SESSION['account_jour']?>"  size="2"> /
<input class="account_mois"  type="text" name="account_mois"  size="2" value="<?=$_SESSION['account_mois']?>"  size="2"> /
<input class="account_annee" type="text" name="account_annee" size="4" value="<?=$_SESSION['account_annee']?>" size="4">

<div class="account_ville_label" >Ville :</div>
<input class="account_ville" type="text" name="account_ville" value="<?=$_SESSION['account_ville']?>">

<div class="account_pays_label" >Pays :</div>
<input class="account_pays" type="text" name="account_pays" value="<?=$_SESSION['account_pays']?>">

<div class="account_presentation_label">Votre pr&eacute;sentation :</div>
<textarea class="account_presentation" name="account_presentation" rows="5" cols="50"><?=$_SESSION['$account_presentation']?></textarea>

<img class="bouton_valider" src="images/compte/enregistrer.png" name="bouton_valider" onclick="document.form_compte.submit();"  >
</form>

<a class="lien_supprimer" href="index.php?page=compte_suppression">
<img class="image_supprimer" name="image_supprimer" src="images/compte/supprimer.png" >
</a>
