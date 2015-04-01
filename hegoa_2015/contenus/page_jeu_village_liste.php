<?php
if( $_SESSION['jeu_espace'] == "village" &&
    $_SESSION['village_type'] == "liste")
{
  $iNbvillage_liste  = $_SESSION['village_liste_compteur'];
  $iNoPage      = $_SESSION['village_liste_no_page'];
  $iNbPages     = $_SESSION['village_liste_nb_pages'];
?>

  <div class="panneau_village_liste">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/village_liste/indicateur.png" >

    <div class="contenu_village_liste">

    <form name="formvillage_liste" action="index.php?page=jeu&espace=village_liste_navigation" method="post">
    <input type="hidden" name="village_liste_action" value="valider">
    <input type="hidden" name="village_liste_no_page" value="<?=$_SESSION['village_liste_no_page']?>">

    <div id="bouton_prev">
<?php
      //if ( $iNoPage > 1 )
      {
?>
      <img class="image_prev" src="images/jeu/village_liste/prev.png" name="village_liste_prev" onclick="document.formvillage_liste.village_liste_action.value='prev';document.formvillage_liste.submit();">
<?php
      }
?>
    </div>

<?php
    echo "<div class=\"liste_village_liste\">";

    for($i = 0; $i < $iNbvillage_liste; $i++)
    {
      // - on récupère les infos
      $village_liste_id        = $_SESSION['village_liste_id'][$i];
      $village_liste_nom       = $_SESSION['village_liste_nom'][$i];

      // - On formate le code html
      echo "<div class=\"village_liste\">";

      echo "$village_liste_nom";

      echo "</div> <!-- village_liste -->";
    }

    echo "</div> <!-- liste_village_liste -->";
?>

    <div id="bouton_next">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_next" src="images/jeu/village_liste/next.png" name="village_liste_next" onclick="document.formvillage_liste.village_liste_action.value='next';document.formvillage_liste.submit();">
<?php
    }
?>
    </div>

</form>


<?php

 echo "<div class=\"numerotation\">" . $iNoPage . " / " . $iNbPages . "</div>";

 echo "</div> <!-- contenu_village_liste -->";

 echo "</div> <!-- panneau_village_liste -->"; //
}
?>

