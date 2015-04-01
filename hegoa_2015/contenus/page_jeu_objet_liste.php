<?php
if( $_SESSION['jeu_espace'] == "objet" &&
    $_SESSION['objet_type'] == "liste")
{

  $iNbObjet  = $_SESSION['objet_compteur'];
  $iNoPage   = $_SESSION['objet_no_page'];
  $iNbPages  = $_SESSION['objet_nb_pages'];

?>

  <div class="panneau_objet_liste">
    <img class="image_indicateur" name="image_indicateur" src="images/jeu/objet/liste/indicateur.png" >

    <a class="lien_ajouter" href="index.php?page=jeu&espace=objet&type=creation">
      <img class="image_ajouter" name="image_ajouter" src="images/jeu/objet/liste/bouton_creation.png" >
    </a>

  </div>

    <form name="formObjet" action="index.php?page=jeu&espace=objet&action=navigation" method="post">
    <input type="hidden" name="objet_action" value="valider">
    <input type="hidden" name="objet_no_page" value="<?=$_SESSION['objet_no_page']?>">

    <div id="bouton_prev">
<?php
      if ( $iNoPage > 1 )
      {
?>
      <img class="image_prev" src="images/jeu/objet/liste/prev.png" name="objet_prev" onclick="document.formObjet.objet_action.value='prev';document.formObjet.submit();">
<?php
      }
?>
    </div>

<?php
    if ( $iNbObjet > 0 )
    {
      echo "<div class=\"liste_objet\">";
    }

    echo "Page : $iNoPage<br/>";

    for($i = 0; $i < $iNbObjet; $i++)
    {
      if ( $i >= (($iNoPage-1) * 8) && $i < ($iNoPage * 8) )
      {
        echo "$i => $iNoPage<br/>";

        // - on récupère les infos
        $objet_id        = $_SESSION['objet_id'][$i];
        $objet_image     = $_SESSION['objet_image'][$i];
        $objet_titre     = $_SESSION['objet_titre'][$i];
        $objet_info      = $_SESSION['objet_info'][$i];
        $objet_livre     = $_SESSION['objet_livre'][$i];
        $objet_is_active = $_SESSION['objet_is_active'][$i];

        // - On formate le code html
        echo "<div class=\"objet\">";

        echo "<a href=\"index.php?page=jeu&espace=objet&type=detail&no_objet=$objet_id\">$objet_titre</a>";

        echo "</div>";

/*
      echo "<div class=\"info\">";

      if ( $_SESSION['objet_info'][$i] == 1 )
      {
        // - Renseigner le lien correctement
        echo "<a class=\"lien_info\" href=\"index.php?page=jeu&espace=objet_info&no_objet=$objet_id\">";
        echo "<img class=\"objet_info\" src=\"images/jeu/objet/info.png\" name=\"objet_info\" alt=\"Informations sur l'objet\">";
        echo "</a>";

      }

      echo "</div>";
*/
/*
      echo "<div class=\"livre\">";

      if ( $_SESSION['objet_livre'][$i] == 1 )
      {
        // - Renseigner le lien correctement
        echo "<a class=\"lien_livre\" href=\"index.php?page=jeu&espace=objet_livre&no_objet=$objet_id\">";
        echo "<img class=\"objet_livre\" src=\"images/jeu/objet/livre.png\" name=\"objet_livre\" alt=\"???\">";
        echo "</a>";
      }

      echo "</div>";
*/

      } // Fin de la condition
    }

    if ( $iNbObjet > 0 )
    {
      echo "</div>";
    }
?>

    <div id="bouton_next">
<?php
    if ( $iNoPage < $iNbPages )
    {
?>
      <img class="image_next" src="images/jeu/objet/liste/next.png" name="objet_next" onclick="document.formObjet.objet_action.value='next';document.formObjet.submit();">
<?php
    }
?>
    </div>

</form>

<?php

 echo "<div class=\"objet_pages\">" . $iNoPage . " / " . $iNbPages . "</div>";
}
?>


