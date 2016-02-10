<div class="titre"><?php echo $this->traductions["titre_choix"][$_SESSION['lang']]; ?>
<a class="lien_fermer" href="index.php?page=tdb" title="<?php echo $this->traductions_debut['retour-tdb'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>

<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>

<form name="form_choix" action="index.php?page=choix_peuple_validation" method="post">

<input type="hidden" name="choix_peuple" value="humain">

 <img class="choix_race"   src="images/peuples/humain.png"   name="choix_peuple_humain"   onclick="document.form_choix.choix_peuple.value='humain';document.form_choix.submit();"  >

 <img class="choix_race"   src="images/peuples/bunsif.png"   name="choix_peuple_bunsif"   onclick="document.form_choix.choix_peuple.value='bunsif';document.form_choix.submit();"  >

<br />

 <img class="choix_race"   src="images/peuples/sulmis.png"   name="choix_peuple_sulmis"   onclick="document.form_choix.choix_peuple.value='sulmis';document.form_choix.submit();"  >

 <img class="choix_race" src="images/peuples/nimhsine.png" name="choix_peuple_nimhsine" onclick="document.form_choix.choix_peuple.value='nimhsine';document.form_choix.submit();"  >

</form>
