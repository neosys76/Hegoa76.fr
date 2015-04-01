<?php
if( $_SESSION['jeu_espace'] == "magie" &&
    $_SESSION['magie_type'] == "liste")
{
  $iNbMagie  = $_SESSION['magie_compteur'];
  $iNoPage   = $_SESSION['magie_no_page'];
  $iNbPages  = $_SESSION['magie_nb_pages'];
?>

  <div class="panneau_magie_liste">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/magie/indicateur.png" >

    <div class="contenu_magie">

    <form name="formMagie" action="index.php?page=jeu&espace=magie_navigation" method="post">
    <input type="hidden" name="magie_action" value="valider">
    <input type="hidden" name="magie_no_page" value="<?=$_SESSION['magie_no_page']?>">

    <div id="bouton_prev">
<?php
      //if ( $iNoPage > 1 )
      {
?>
      <img class="image_prev" src="images/jeu/magie/prev.png" name="magie_prev" onclick="document.formMagie.magie_action.value='prev';document.formMagie.submit();">
<?php
      }
?>
    </div>

<?php
    echo "<div class=\"liste_magie\">";

    for($i = 0; $i < $iNbMagie; $i++)
    {
      // - on récupère les infos
      $magie_id        = $_SESSION['magie_id'][$i];
      $magie_image     = $_SESSION['magie_image'][$i];
      $magie_titre     = $_SESSION['magie_titre'][$i];
      $magie_info      = $_SESSION['magie_info'][$i];
      $magie_livre     = $_SESSION['magie_livre'][$i];
      $magie_is_active = $_SESSION['magie_is_active'][$i];

      // - On formate le code html
      echo "<div class=\"magie\">";
      echo "<div class=\"info\">";

      if ( $_SESSION['magie_info'][$i] == 1 )
      {
        // - Renseigner le lien correctement
/*
        echo "<a class=\"lien_info\" href=\"index.php?page=jeu&espace=magie_info&no_magie=$magie_id\">";
        echo "<img class=\"magie_info\" src=\"images/jeu/magie/info.png\" name=\"magie_info\" alt=\"Informations sur la magie\">";
        echo "</a>";
*/
      }

      echo "</div>";

      echo "<div class=\"livre\">";

      if ( $_SESSION['magie_livre'][$i] == 1 )
      {
        // - Renseigner le lien correctement
/*
        echo "<a class=\"lien_livre\" href=\"index.php?page=jeu&espace=magie_livre&no_magie=$magie_id\">";
        echo "<img class=\"magie_livre\" src=\"images/jeu/magie/livre.png\" name=\"magie_livre\" alt=\"???\">";
        echo "</a>";
*/
      }

      echo "</div>";

      echo "<img class=\"magie_image\" src=\"$magie_image\" name=\"magie_image\" alt=\"$magie_titre\">";

      echo "</div>";
    }

    echo "</div>";  // liste_magiee
?>

    <div id="bouton_next">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_next" src="images/jeu/magie/next.png" name="magie_next" onclick="document.formMagiet.magie_action.value='next';document.formMagie.submit();">
<?php
    }
?>
    </div>

</form>

<?php

 echo "<div class=\"numerotation\">" . $iNoPage . " / " . $iNbPages . "</div>";

 echo "</div>"; // liste_magie

 echo "</div>"; // panneau_magie
}
?>


