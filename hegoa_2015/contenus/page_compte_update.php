<div class="titre_update"><?php echo $this->traductions['mon-compte-mise-a-jour'][$_SESSION['lang']]; ?>
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>

<form action="index.php?page=compte_validation" method="post">

<span><?php echo ucfirst($this->traductions_debut['nom-de-famille'][$_SESSION['lang']]); ?> :</span>&nbsp;&nbsp;&nbsp;
<input type="text" name="compte_nom" value="<?php if(isset($_SESSION['compte']->nom)){echo $_SESSION['compte']->nom;} ?>" size="30">&nbsp;&nbsp;&nbsp;
<span ><?php echo ucfirst($this->traductions_debut['prenom'][$_SESSION['lang']]); ?> :</span>&nbsp;&nbsp;&nbsp;
<input type="text" name="compte_prenom" value="<?php if(isset($_SESSION['compte']->prenom)){echo $_SESSION['compte']->prenom;} ?>" size="30">

<div >Email :</div>
<input  type="email" name="compte_email" value="<?php if(isset($_SESSION['compte']->email)){echo $_SESSION['compte']->email;} ?>" size="50">

<div ><?php echo $this->traductions['naissance-j-m-a'][$_SESSION['lang']]; ?>:</div>
<?php
	if(isset($_SESSION['compte']->date_anniv)){
		$jour = substr($_SESSION["compte"]->date_anniv,8,2);
		$mois = substr($_SESSION["compte"]->date_anniv,5,2);
		$annee =substr($_SESSION["compte"]->date_anniv,0,4);
	}
?>
<input  type="text" name="le_jour"  size="2" pattern="[0-9]{2}" value="<?php if(isset($jour)){echo $jour;} ?>"  > /
<input type="text" name="le_mois"  size="2" pattern="[0-9]{2}"  value="<?php if(isset($mois)){echo $mois;} ?>"  > /
<input  type="text" name="l_annee" size="4" pattern="[0-9]{4}"  value="<?php if(isset($annee)){echo $annee;} ?>" >

<div ><?php echo ucfirst($this->traductions_debut['ville'][$_SESSION['lang']]); ?> :</div>
<input type="text" name="compte_ville" value="<?php if(isset($_SESSION['compte']->ville)){echo $_SESSION['compte']->ville;} ?>">

<div ><?php echo ucfirst($this->traductions_debut['pays'][$_SESSION['lang']]); ?> :</div>
<input  type="text" name="compte_pays" value="<?php if(isset($_SESSION['compte']->pays)){echo $_SESSION['compte']->pays;} ?>">

<div ><?php echo ucfirst($this->traductions['votre-presentation'][$_SESSION['lang']]); ?> :</div>
<textarea class="account_presentation" name="compte_presentation" rows="5" cols="50"><?php if(isset($_SESSION['compte']->presentation)){echo $_SESSION['compte']->presentation;} ?></textarea>
<br/><br/>
<span><span class="attention"><?php echo $this->traductions["uniquement-si-change-mot-de-passe"][$_SESSION['lang']]; ?> ! ! </span><br/><span class="mot_de_passe"><?php echo ucfirst($this->traductions_debut['mot-de-passe'][$_SESSION['lang']]); ?> :</span></span>
<input type="password" name="nouveau_password"  size="32">
<br/><br/>

<input class="bouton_valider"  type="image" src="images/compte/enregistrer.png"  alt="<?php echo ucfirst($this->traductions_debut['soumettre'][$_SESSION['lang']]); ?>" >
</form>
<p>&nbsp;<br/></p>