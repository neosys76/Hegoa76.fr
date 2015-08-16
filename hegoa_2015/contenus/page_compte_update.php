<div class="titre">Mon compte: mise à jour</div>

<a class="lien_fermer" href="index.php?page=tdb">
<img class="image_fermer" name="image_fermer" src="images/compte/fermer.png" >
</a>

<form name="form_compte" action="index.php?page=compte_validation" method="post">

<div class="account_lastname_label" >Nom :</div>
<input class="account_lastname" type="text" name="compte_nom" value="<?php if(isset($_SESSION['compte']->nom)){echo $_SESSION['compte']->nom;} ?>" size="30">

<div class="account_firstname_label" >Pr&eacute;nom :</div>
<input class="account_firstname" type="text" name="compte_prenom" value="<?php if(isset($_SESSION['compte']->prenom)){echo $_SESSION['compte']->prenom;} ?>" size="30">

<div class="account_mail_label" >Adresse mail :</div>
<input class="account_mail" type="email" name="compte_email" value="<?php if(isset($_SESSION['compte']->email)){echo $_SESSION['compte']->email;} ?>" size="50">

<div class="account_naissance_label">Date de naissance (jour-mois-année):</div>
<?php
	if(isset($_SESSION['compte']->date_anniv)){
		$jour = substr($_SESSION["compte"]->date_anniv,8,2);
		$mois = substr($_SESSION["compte"]->date_anniv,5,2);
		$annee =substr($_SESSION["compte"]->date_anniv,0,4);
	}
?>
<input class="account_jour"  type="text" name="le_jour"  size="2" pattern="[0-9]{2}" value="<?php if(isset($jour)){echo $jour;} ?>"  > /
<input class="account_mois"  type="text" name="le_mois"  size="2" pattern="[0-9]{2}"  value="<?php if(isset($mois)){echo $mois;} ?>"  > /
<input class="account_annee" type="text" name="l_annee" size="4" pattern="[0-9]{4}"  value="<?php if(isset($annee)){echo $annee;} ?>" >

<div class="account_ville_label" >Ville :</div>
<input class="account_ville" type="text" name="compte_ville" value="<?php if(isset($_SESSION['compte']->ville)){echo $_SESSION['compte']->ville;} ?>">

<div class="account_pays_label" >Pays :</div>
<input class="account_pays" type="text" name="compte_pays" value="<?php if(isset($_SESSION['compte']->pays)){echo $_SESSION['compte']->pays;} ?>">

<div class="account_presentation_label">Votre pr&eacute;sentation :</div>
<textarea class="account_presentation" name="compte_presentation" rows="5" cols="50"><?php if(isset($_SESSION['compte']->presentation)){echo $_SESSION['compte']->presentation;} ?></textarea>

<div class="account_password_label" ><span style="color:#f00;">Uniquement Si Vous Voulez Changer De Mot De Passe ! ! </span><br/>Mot de passe :</div>
<input class="account_password" type="password" name="nouveau_password"  size="32">
<br/>

<input class="bouton_valider"  type="image" src="images/compte/enregistrer.png"  alt="Soumettre" >
</form>
