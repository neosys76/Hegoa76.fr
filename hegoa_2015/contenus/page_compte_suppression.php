<div class="titre">Suppression du compte</div>
<?php
if(isset($_GET['erreur'])){
	if($_GET['erreur']==1){
		?>
		<p class="erreur">
			Votre compte n'a pas pu être supprimé correctement. Réessayez.<br/>
			<a href="index.php?page=compte_suppression"><img src="images/compte_suppression/valider.png" alt="Supprimer"></a>
		</p>
		<?php
	}

}
else {
?>
<a class="lien_fermer" href="index.php?page=compte">
<img class="image_fermer" name="image_fermer" src="images/compte_suppression/fermer.png" >
</a>

<p class="texte">Attention,<br />
vous &ecirc;tes sur le point de supprimer votre compte !!<br />
<br />
Etes-vous s&ucirc;r de vouloir le supprimer ?<br />
<br />
Cette op&eacute;ration est irr&eacute;versible !<br />
Vous perdrez tous vos D'juns cr&eacute;&eacute;s.
</p>

<form name="form_suppression" action="index.php?page=compte_suppression_validation" method="post">
<input class="image_valider" type="image" src="images/compte_suppression/valider.png" alt="Supprimer" >
</form>
<?php
}
?>