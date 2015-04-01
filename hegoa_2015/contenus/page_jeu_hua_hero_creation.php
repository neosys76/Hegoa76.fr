<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "hero" &&
    $_SESSION['hua_type']   == "creation"  )
{
?>
<a class="lien_retour" href="index.php?page=jeu&espace=hua&onglet=hero&type=liste">
<img class="image_retour" name="image_retour" src="images/jeu/hua/hero/creer/bouton_retour.png" >
</a>

<form name="form_hero_creation" action="index.php?page=jeu_hua_hero_creer_validation" method="post">

<div class="">Entrez le nom du nouveau h&eacute;ro invoqu&eacute;</div>
<div class=""><input type="text" name=""></div>

<img class="image_de" name="image_de" src="images/jeu/hua/hero/creer/icone_de.png" >

<img class="bouton_valider" src="images/jeu/hua/hero/creer/valider.png" name="bouton_valider" onclick="document.form_hero_creation.submit();"  >

</form>

<?php
}
?>


