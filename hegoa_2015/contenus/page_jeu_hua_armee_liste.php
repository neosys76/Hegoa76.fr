<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "armee" &&
    $_SESSION['hua_type']   == "liste"  )
{
  $iNbArmee_liste   = $_SESSION['armee_liste_compteur'];
  $iNoPage          = $_SESSION['armee_liste_no_page'];
  $iNbPages         = $_SESSION['armee_liste_nb_pages'];
?>

<div class="contenu_armee_liste">

  <a class="lien_ajouter" href="index.php?page=jeu&espace=hua&onglet=armee&type=creation">
  <img class="image_ajouter" name="image_ajouter" src="images/jeu/hua/armee/liste/bouton_ajouter.png" >
  </a>


    <form name="formarmee_liste" action="index.php?page=jeu&espace=hua&onglet=armee&type=navigation" method="post">
    <input type="hidden" name="armee_liste_action" value="valider">
    <input type="hidden" name="armee_liste_no_page" value="<?=$_SESSION['armee_liste_no_page']?>">


    <div id="bouton_prev">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_prev" src="images/jeu/hua/armee/liste/bouton_prev.png" name="armee_liste_prev" onclick="document.formarmee_liste.armee_liste_action.value='prev';document.formarmee_liste.submit();">
<?php
    }
?>
    </div>


<?php
    echo "<div class=\"liste_armee_liste\">";

    for($i = 0; $i < $iNbarmee_liste; $i++)
    {
      // - on récupère les infos
      $armee_liste_id        = $_SESSION['armee_liste_id'][$i];
      $armee_liste_nom       = $_SESSION['armee_liste_nom'][$i];

      // - On formate le code html
      echo "<div class=\"armee_liste\">";

      echo "$armee_liste_nom";

      echo "</div>";
    }

    echo "</div>";  // liste_village_liste
?>

    <div id="bouton_next">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_next" src="images/jeu/hua/armee/liste/bouton_next.png" name="armee_liste_next" onclick="document.formarmee_liste.armee_liste_action.value='next';document.formarmee_liste.submit();">
<?php
    }
?>
    </div>

    </form>

</div>


<?php

 echo "<div class=\"numerotation\">" . $iNoPage . " / " . $iNbPages . "</div>";
}
?>


