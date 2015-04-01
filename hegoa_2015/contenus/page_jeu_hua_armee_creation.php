<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "armee" &&
    $_SESSION['hua_type']   == "creation"  )
{
?>

<a class="lien_retour" href="index.php?page=jeu&espace=hua&onglet=armee&type=liste">
<img class="image_retour" name="image_retour" src="images/jeu/hua/armee/creer/bouton_retour.png" >
</a>

<form name="form_armee_creation" action="index.php?page=jeu_hua_armee_creer_validation" method="post">

<div class="">Entrez le nom de la nouvelle arm&eacute;e</div>
<div class=""><input type="text" name=""></div>

<img class="bouton_valider" src="images/jeu/hua/armee/creer/valider.png" name="bouton_valider" onclick="document.form_armee_creation.submit();"  >

</form>

<?php
}
?>


