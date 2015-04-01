<?php
if( $_SESSION['jeu_espace'] == "batiment" )
{
  $iNbBatiment  = $_SESSION['batiment_compteur'];
  $iNoPage      = $_SESSION['batiment_no_page'];
  $iNbPages     = $_SESSION['batiment_nb_pages'];
?>

  <div class="panneau_batiment">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/batiment/indicateur.png" >

    <div class="contenu_batiment">

    <form name="formBatiment" action="index.php?page=jeu&espace=batiment_navigation" method="post">
    <input type="hidden" name="batiment_action" value="valider">
    <input type="hidden" name="batiment_no_page" value="<?=$_SESSION['batiment_no_page']?>">

    <div id="bouton_prev">
<?php
      //if ( $iNoPage > 1 )
      {
?>
      <img class="image_prev" src="images/jeu/batiment/prev.png" name="batiment_prev" onclick="document.formBatiment.batiment_action.value='prev';document.formBatiment.submit();">
<?php
      }
?>
    </div>

<?php
    echo "<div class=\"liste_batiment\">";

    for($i = 0; $i < $iNbBatiment; $i++)
    {
      // - on récupère les infos
      $batiment_id        = $_SESSION['batiment_id'][$i];
      $batiment_image     = $_SESSION['batiment_image'][$i];
      $batiment_titre     = $_SESSION['batiment_titre'][$i];
      $batiment_info      = $_SESSION['batiment_info'][$i];
      $batiment_livre     = $_SESSION['batiment_livre'][$i];
      $batiment_is_active = $_SESSION['batiment_is_active'][$i];

      // - On formate le code html
      echo "<div class=\"batiment\">";
      echo "<div class=\"info\">";

      if ( $batiment_info == 1 )
      {
        // - Renseigner le lien correctement
/*
        echo "<a class=\"lien_info\" href=\"index.php?page=jeu&espace=batiment_info&no_batiment=$batiment_id\">";
        echo "<img class=\"batiment_info\" src=\"images/jeu/batiment/info.png\" name=\"batiment_info\" alt=\"Informations sur le batiment\">";
        echo "</a>";
*/
      }

      echo "</div>";

      echo "<div class=\"livre\">";

      if ( $batiment_livre == 1 )
      {
        // - Renseigner le lien correctement
/*
        echo "<a class=\"lien_livre\" href=\"index.php?page=jeu&espace=batiment_ilivre&no_batiment=$batiment_id\">";
        echo "<img class=\"batiment_livre\" src=\"images/jeu/batiment/livre.png\" name=\"batiment_livre\" alt=\"???\">";
        echo "</a>";
*/
      }

      echo "</div>";

      if ( $batiment_is_active == 1 )
      {
        echo "<a href=\"index.php?page=jeu&espace=batiment&type=construire\">";
        echo "<img class=\"batiment_image\" src=\"$batiment_image\" name=\"batiment_image\" alt=\"$batiment_titre\">";
        echo "</a>";
      }
      else
      {
        echo "<img class=\"batiment_image\" src=\"$batiment_image\" name=\"batiment_image\" alt=\"$batiment_titre\">";
      }



      echo "</div>";
    }

    echo "</div>";  // liste_batiment
?>

    <div id="bouton_next">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_next" src="images/jeu/batiment/next.png" name="batiment_next" onclick="document.formBatiment.batiment_action.value='next';document.formBatiment.submit();">
<?php
    }
?>
    </div>

</form>

<?php

 echo "<div class=\"numerotation\">" . $iNoPage . " / " . $iNbPages . "</div>";

 echo "</div>"; // liste_batiment

 echo "</div>"; // panneau_batiment
}
?>

