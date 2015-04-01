<div class="titre">Choisir un peuple</div>

<a class="lien_fermer" href="index.php?page=tdb">
<img class="image_fermer" name="image_fermer" src="images/choix_peuple/fermer.png" >
</a>

<form name="form_choix" action="index.php?page=choix_peuple_validation" method="post">

<input type="hidden" name="choix_peuple" value="humain">

 <img class="image_humain"   src="images/peuples/humain.png"   name="choix_peuple_humain"   onclick="document.form_choix.choix_peuple.value='humain';document.form_choix.submit();"  >

 <img class="image_bunsif"   src="images/peuples/bunsif.png"   name="choix_peuple_bunsif"   onclick="document.form_choix.choix_peuple.value='bunsif';document.form_choix.submit();"  >

<br />

 <img class="image_sulmis"   src="images/peuples/sulmis.png"   name="choix_peuple_sulmis"   onclick="document.form_choix.choix_peuple.value='sulmis';document.form_choix.submit();"  >

 <img class="image_nimhsine" src="images/peuples/nimhsine.png" name="choix_peuple_nhymsine" onclick="document.form_choix.choix_peuple.value='nimhsine';document.form_choix.submit();"  >

</form>
