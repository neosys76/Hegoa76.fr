<?php
if( $_SESSION['jeu_espace'] == "objet" &&
    $_SESSION['objet_type'] == "suppression")
{

?>

  <div class="panneau_objet_suppression">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/objet/supprimer/indicateur.png" >

    <a class="lien_retour" href="index.php?page=jeu&espace=objet&type=detail">
      <img class="image_retour" name="image_retour" src="images/jeu/objet/supprimer/bouton_retour.png" >
    </a>

    <div class="">Vous &ecirc;tes sur le point de supprimer<br/>
      &lt;Nom Objet&gt;
    </div>

  </div>

<?php
}
?>