<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "armee" &&
    $_SESSION['hua_type']   == "suppression"  )
{
?>

<a class="lien_retour" href="index.php?page=jeu&espace=hua&onglet=armee&type=detaile">
<img class="image_retour" name="image_retour" src="images/jeu/hua/armee/supprimer/bouton_retour.png" >
</a>

<div class="">Vous &ecirc;tes sur le point de supprimer<br/>
&lt;Nom de l'arm&eacute;e&gt;
</div>

<?php
}
?>


