<?php
if( $_SESSION['jeu_espace'] == "science"  &&
    $_SESSION['science_type'] == "liste")
{
  $iNbScience  = $_SESSION['science_compteur'];
  $iNoPage   = $_SESSION['science_no_page'];
  $iNbPages  = $_SESSION['science_nb_pages'];
?>

  <div class="panneau_science_liste">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/science/indicateur.png" >

    <div class="contenu_science">

    <form name="formScience" action="index.php?page=jeu&espace=science_navigation" method="post">
    <input type="hidden" name="science_action" value="valider">
    <input type="hidden" name="science_no_page" value="<?=$_SESSION['science_no_page']?>">

    <div id="bouton_prev">
<?php
      //if ( $iNoPage > 1 )
      {
?>
      <img class="image_prev" src="images/jeu/science/prev.png" name="science_prev" onclick="document.formScience.science_action.value='prev';document.formScience.submit();">
<?php
      }
?>
    </div>

<?php
    echo "<div class=\"liste_science\">";

    for($i = 0; $i < $iNbScience; $i++)
    {
      // - on récupère les infos
      $science_id        = $_SESSION['science_id'][$i];
      $science_image     = $_SESSION['science_image'][$i];
      $science_titre     = $_SESSION['science_titre'][$i];
      $science_info      = $_SESSION['science_info'][$i];
      $science_livre     = $_SESSION['science_livre'][$i];
      $science_is_active = $_SESSION['science_is_active'][$i];

      // - On formate le code html
      echo "<div class=\"science\">";
      echo "<div class=\"info\">";

      if ( $_SESSION['science_info'][$i] == 1 )
      {
        // - Renseigner le lien correctement
/*
        echo "<a class=\"lien_info\" href=\"index.php?page=jeu&espace=science_info&no_science=$science_id\">";
        echo "<img class=\"science_info\" src=\"images/jeu/science/info.png\" name=\"science_info\" alt=\"Informations sur la science\">";
        echo "</a>";
*/
      }

      echo "</div>";

      echo "<div class=\"livre\">";

      if ( $_SESSION['science_livre'][$i] == 1 )
      {
        // - Renseigner le lien correctement
/*
        echo "<a class=\"lien_livre\" href=\"index.php?page=jeu&espace=science_livre&no_sciencet=$science_id\">";
        echo "<img class=\"science_livre\" src=\"images/jeu/science/livre.png\" name=\"science_livre\" alt=\"???\">";
        echo "</a>";
*/
      }

      echo "</div>";

      echo "<img class=\"science_image\" src=\"$science_image\" name=\"science_image\" alt=\"$science_titre\">";

      echo "</div>";
    }

    echo "</div>";  // liste_science
?>

    <div id="bouton_next">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_next" src="images/jeu/science/next.png" name="science_next" onclick="document.formScience.science_action.value='next';document.formScience.submit();">
<?php
    }
?>
    </div>

</form>

<?php

 echo "<div class=\"numerotation\">" . $iNoPage . " / " . $iNbPages . "</div>";

 echo "</div>"; // liste_science

 echo "</div>"; // panneau_science
}
?>


