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

if(isset($_SESSION['avatars'])&&!empty($_SESSION['avatars'])){
	$iNbDjun = count($_SESSION['avatars']);
	}
if($iNbDjun>MAX_DJUNS){$iNbDjun=MAX_DJUNS;}

if ( $iNbDjun > 0 )
{
  echo "<div class=\"liste_djun\">\n";

  // - on récupère les infos: NB  on reste sur des tableaux pour le cas où on reviendrait à plusieurs D'juns (voir la classe)

for($i = 0; $i < $iNbDjun; $i++)
{

  $djun_no = $_SESSION['avatars'][$i]->num_image;
  $djun_name =  $_SESSION['avatars'][$i]->nom;
  $djun_race =  $_SESSION['avatars'][$i]->race;

  echo "<div class=\"djun\">";

  // - On formate le code html
  if ($djun_name != "" )
  {
  	?>
  	<p class="titre_djun">Cliquez pour jouer</p>
  	<?php
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
  }			//  fin du if//djun_name
  else
  {
?>  	
  	<p class="titre_djun">Choix du D'jun</p>
<?php
    $page = "choix_djun";
    $image = "images/tdb/djun_vide.png";
  }
?>

<?php
  echo "<a class=\"lien_choix_djun\" href=\"index.php?page=$page\">\n";
  echo "  <img class=\"image_choix_djun\" width=100 height=100 name=\"image_choix_djun\" src=\"$image\" >\n";
  echo "</a>\n";

  echo "</div>"; // fin div class djun
	}  			//	Fin  de la boucle for sur le nombre de D'jun

}			//   fin du if sur ( $iNbDjun > 0 )
else {				//  $iNbDjun ==0
?>
	<div class="djun">
  		<p class="titre_djun">Choix du D'jun</p>
		<?php
   			 $page = "choix_djun";
   			 $image = "images/tdb/djun_vide.png";
		?>
		<a class="lien_choix_djun" href="index.php?page=<?php echo $page; ?>" >
		<img class="image_choix_djun" width=100 height=100 name="image_choix_djun" src="<?php echo $image; ?>" >
		</a>
	</div>
<?php
} 				//  fin du else

	//   cadres pour passage compte premium et achat de dés supplémentaires.
?>
	<div class="djun des_sup">
		<a href="?page=des_supplementaires">Achat de dés</a>
	</div>
	<?php
	//   un cadre pour un upgrade de compte
	if(isset($_SESSION['compte'])&&$_SESSION['compte']=="base"){
		?>
	<div class="djun premium">
		<a href="?page=compte_premium">Compte Premium</a>
	</div>

<?php	
	}
	elseif(isset($_SESSION['compte'])&&$_SESSION['compte']=="premium"){
		?>
		<!--   POUR LE MOMENT, compte Gold non prévu
	<div class="djun premium">
		<a href="?page=compte_gold">Compte Gold</a>
	</div>
	-->
<?php	
	} 			//  fin du if sur compte-premium
	
//    place pour un message d'erreur

if(isset($_GET['erreur'])){
	$message = "Erreur inconnue";
	if($_GET['erreur']==1){
			//   erreur = 1   signifie pas de mise à jour du peuple dans la BDD
		$message = "La mise à jour du choix du peuple n'a pas pu avoir lieu dans la BDD";	
	}
	if($_GET['erreur']=="no_djun"){
		//   erreur = "no_djun"  vient de la page djun, on n'a pas encore mis les avatars en mémoire, ou il n'y en a pas encore 
		$message = "Pas encore d'avatar défini? ";	
	}
?>
	<div class="tdb_erreur">
	<?php echo $message; ?>
	</div>
<?php
}			//    fin du if sur get-erreur

?>
  </div>			<!--  fermeture de div  liste_djun -->


