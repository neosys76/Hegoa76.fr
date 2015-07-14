<div class="titre">Tableau de bord</div>

<a class="lien_compte" href="index.php?page=compte" title="Retour au compte" >
<img class="image_compte" name="image_compte" src="images/tdb/compte.png" >
</a>

<a class="lien_fermer" href="index.php?page=accueil" title="Retour l'accueil" >
<img class="image_fermer" name="image_fermer" src="images/tdb/fermer.png" >
</a>

<a class="lien_deconnexion" href="index.php?page=accueil" title="Déconnexion" >
<img class="image_deconnexion" src="images/deconnexion.png" >
</a>

<?php
$iNbDjun = 0;

if(isset($_SESSION['tdb_djun_compteur'])&&!empty($_SESSION['tdb_djun_compteur'])){$iNbDjun = $_SESSION['tdb_djun_compteur'];}

if ( $iNbDjun > 0 )
{
  echo "<div class=\"liste_djun\">\n";

for($i = 0; $i < $iNbDjun; $i++)
{
  // - on récupère les infos
  $djun_no = $_SESSION['tdb_djun_image'][$i];
  $djun_name =  $_SESSION['tdb_djun_name'][$i];
  $djun_race =  $_SESSION['tdb_djun_race'][$i];

  echo "<div class=\"djun\">";

  // - On formate le code html
  if ($djun_name != "" )
  {
    $image = "images/djuns/djun".$djun_no.".png";
    if ( $djun_race != "")
    {
      $page = "djun&avatar=$djun_name";
    }
    else
    {
    	$_SESSION["avatar_name"] = $djun_name;
      $page = "choix_peuple&avatar=$djun_name";
    }
  }
  else
  {
    $page = "choix_djun";
    $image = "images/tdb/djun_vide.png";
  }

  echo "<a class=\"lien_choix_djun\" href=\"index.php?page=$page\">\n";
  echo "  <img class=\"image_choix_djun\" width=100 height=100 name=\"image_choix_djun\" src=\"$image\" >\n";
  echo "</a>\n";

  echo "</div>"; // fin div class djun
}
//    place pour un message d'erreur

if(isset($_GET['erreur'])){
	$message = "Erreur inconnue";
	if($_GET['erreur']==1){
			//   erreur = 1   signifie pas de mise à jour du peuple dans la BDD
		$message = "La mise à jour du choix du peuple n'a pas pu avoir lieu dans la BDD";	
	}
?>
	<div class="tdb_erreur">
	<?php echo $message; ?>
	</div>
<?php
}

  echo "</div>\n";
}


?>