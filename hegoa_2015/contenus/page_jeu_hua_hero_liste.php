<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "hero" &&
    $_SESSION['hua_type']   == "liste"  )
{
  $iNbHero_liste  = $_SESSION['hero_liste_compteur'];
  $iNoPage        = $_SESSION['hero_liste_no_page'];
  $iNbPages       = $_SESSION['hero_liste_nb_pages'];
?>




<div class="contenu_hero_liste">

  <a class="lien_ajouter" href="index.php?page=jeu&espace=hua&onglet=hero&type=creation">
  <img class="image_ajouter" name="image_ajouter" src="images/jeu/hua/hero/liste/bouton_ajouter.png" >
  </a>

    <form name="formhero_liste" action="index.php?page=jeu&espace=hua&onglet=hero&type=navigation" method="post">
    <input type="hidden" name="hero_liste_action" value="valider">
    <input type="hidden" name="hero_liste_no_page" value="<?=$_SESSION['hero_liste_no_page']?>">


    <div id="bouton_prev">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_prev" src="images/jeu/hua/hero/liste/bouton_prev.png" name="hero_liste_prev" onclick="document.formhero_liste.hero_liste_action.value='prev';document.formhero_liste.submit();">
<?php
    }
?>
    </div>


<?php
    echo "<div class=\"liste_hero_liste\">";

    for($i = 0; $i < $iNbHero_liste; $i++)
    {
      // - on récupère les infos
      $hero_liste_id        = $_SESSION['hero_liste_id'][$i];
      $hero_liste_nom       = $_SESSION['hero_liste_nom'][$i];

      // - On formate le code html
      echo "<div class=\"hero_liste\">";

      echo "$hero_liste_nom";

      echo "</div>";
    }

    echo "</div>";  // liste_village_liste
?>

    <div id="bouton_next">
<?php
    //if ( $iNoPage > $iNbPages )
    {
?>
      <img class="image_next" src="images/jeu/hua/hero/liste/bouton_next.png" name="hero_liste_next" onclick="document.formhero_liste.hero_liste_action.value='next';document.formhero_liste.submit();">
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


