<?php
if( $_SESSION['jeu_espace'] == "hua" &&
    $_SESSION['hua_onglet'] == "armee" &&
    $_SESSION['hua_type']   == "defaut"  )
{
?>


<a class="lien_hua_parcourir" href="index.php?page=jeu&espace=hua&onglet=armee&type=liste">
  <img class="hua_bouton_parcourir" src="images/jeu/hua/bouton_parcourir.png">
</a>

<a class="lien_hua_ajouter" href="index.php?page=jeu&espace=hua&onglet=armee&type=creation">
  <img class="hua_bouton_ajouter"  src="images/jeu/hua/bouton_ajouter.png" >
</a>

<a class="lien_hua_supprimer" href="index.php?page=jeu&espace=hua&onglet=armee&type=suppression">
  <img class="hua_bouton_supprimer"  src="images/jeu/hua/bouton_supprimer.png" >
</a>

<?php
}
?>


