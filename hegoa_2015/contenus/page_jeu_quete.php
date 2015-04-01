<?php
if( $_SESSION['jeu_espace'] == "quete" )
{
?>

  <div class="panneau_quete">
    <div class="titre">Qu&ecirc;tes</div>

    <div class="onglet_<?=$_SESSION['quete_type']?>">

        <a class="lien_ajouter" href="index.php?page=jeu&espace=quete&type=create">
          <img class="image_ajouter" name="image_ajouter" src="images/quete/ajouter.png" >
        </a>

        <a class="lien_current" href="index.php?page=jeu&espace=quete&type=list_current">En cours</a>
        <a class="lien_create"  href="index.php?page=jeu&espace=quete&type=list_create">Cr&eacute;es</a>
        <a class="lien_finish"  href="index.php?page=jeu&espace=quete&type=list_finish">Achev&eacute;es</a>
    </div>

<?php

  $iNbQuete = $_SESSION['quete_compteur'];
  $iNoPage  = $_SESSION['quete_no_page'];
  $iNbPages = $_SESSION['quete_nb_pages'];

?>

<form name="formQuete" action="index.php?page=quete_navigation" method="post">
<input type="hidden" name="quete_action" value="valider">
<input type="hidden" name="quete_no_page" value="<?=$_SESSION['quete_no_page']?>">
<input type="hidden" name="quete_type" value="<?=$_SESSION['quete_type']?>">

<div class="contenu_quete">

<div id="bouton_prev">
<?php
if ( $iNoPage > 1 )
{
?>
  <img class="image_prev" src="images/quete/prev.png" name="quete_prev" onclick="document.formQuete.quete_action.value='prev';document.formQuete.submit();">
<?php
}
?>
</div>

<?php
echo "<div class=\"liste_quete\">";

for($i = 0; $i < $iNbQuete; $i++)
{
  // - on récupère les infos
  $quete_id =  $_SESSION['quete_id'][$i];

  // - On formate le code html
  if ( $i % 2 == 0 )
  {
    echo " <div class=\"quete\">\n";
  }
  else
  {
    echo " <div class=\"quete interligne\">\n";
  }

  if ( $_SESSION['quete_is_read'][$i] == 1 )
  {
    echo "<img class=\"quete_is_read\" src=\"images/quete/parchemin_read.png\" name=\"quete_is_read\">";
  }
  else
  {
    echo "<img class=\"quete_is_read\" src=\"images/quete/parchemin.png\" name=\"quete_is_read\">";
  }

  echo " <div class=\"quete_titre\">";
  echo $_SESSION['quete_titre'][$i];
  echo " ( x=" . $_SESSION['quete_coord_x'][$i] . " " . "y=" . $_SESSION['quete_coord_y'][$i] . " )";
  echo " </div>";

  echo " <div class=\"quete_recompense_libelle\">";
  echo " R&eacute;compense :";
  echo " </div>";

  echo " <div class=\"quete_recompense\">";
  echo $_SESSION['quete_recompense'][$i];
  echo " </div>";

  echo "<a class=\"lien_info\" href=\"index.php?page=quete_lire&no_quete=$quete_id\">";
  echo "<img class=\"image_info\" src=\"images/quete/info.png\" name=\"image_info\">";
  echo "</a>";

  echo "<img class=\"image_interligne\" src=\"images/quete/interligne.png\" name=\"image_interligne\">";

  echo "</div>"; // liste_quete
}

echo "</div>";

?>

<div id="bouton_next">
<?php
if ( $iNoPage > $iNbPages )
{
?>
  <img class="image_nect" src="images/quete/next.png" name="quete_next" onclick="document.formQuete.quete_action.value='next';document.formQuete.submit();">
<?php
}
?>
</div> <!-- bouton_next -->

</div> <!-- contenu_quete -->



</form>

<?php
  echo "<div class=\"quete_pages\">" . $iNoPage . " / " . $iNbPages . "</div>";
}
?>

</div><!-- panneau_quete -->
