<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "hero" &&
    $_SESSION['hua_type']   == "suppression"  )
{
?>

<a class="lien_retour" href="index.php?page=jeu&espace=hua&onglet=hero&type=detail">
<img class="image_retour" name="image_retour" src="images/jeu/hua/hero/supprimer/bouton_retour.png" >
</a>

<div class="">Vous &ecirc;tes sur le point de supprimer<br/>
&lt;Nom du h&eacute;ro&gt;
</div>

<?php
}
?>


