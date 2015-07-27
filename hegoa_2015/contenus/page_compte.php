<div class="titre">Mon compte: gestion</div>

<a class="lien_fermer" href="index.php?page=tdb">
<img class="image_fermer" name="image_fermer" src="images/compte/fermer.png" >
</a>
<?php
if(isset($_GET["erreur"])){
	if($_GET["erreur"]==1){
	?>
	<p class="erreur">Vos données n'ont pas pu être insérées dans la base de données. Réessayez</p><br/>
	<a href="index.php?page=compte"><img src="images/compte/valider.png" alt="OK"></a>
	<?php
	}
}
else {
?>
<a class="lien_update" href="index.php?page=compte_update">
<img class="image_supprimer" name="image_supprimer" src="images/compte/update.png" >
</a>


<a class="lien_supprimer" href="index.php?page=compte_suppression">
<img class="image_supprimer" name="image_supprimer" src="images/compte/supprimer.png" >
</a>
<?php
}
?>
