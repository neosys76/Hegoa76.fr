
<div class="titre"><?php echo ucfirst($this->traductions['tableau-de-bord'][$_SESSION['lang']]); ?>
<a class="lien_fermer" href="index.php?page=accueil" title="<?php echo $this->traductions_debut['retour-accueil'][$_SESSION['lang']]; ?>">
<img src="images/connexion_inscription/fermer.png" alt="Close" >
</a>


<a class="lien_compte" href="index.php?page=compte" title="<?php echo $this->traductions['vers-le-compte'][$_SESSION['lang']]; ?>" >
<img src="images/tdb/compte.png" alt="Compte">
</a>


<a class="lien_deconnexion" href="index.php?page=deconnexion" title="<?php echo ucfirst($this->traductions_debut['deconnexion'][$_SESSION['lang']]); ?>" >
<img src="images/deconnexion.png"  alt="Déconnexion">
</a>
</div>
<?php

if(!isset($this->message)||empty($this->message)){
	
$iNbDjun = 0;

if(isset($_SESSION['avatars'])&&!empty($_SESSION['avatars'])){
	$iNbDjun = count($_SESSION['avatars']);
	}

if($iNbDjun>MAX_DJUNS){$iNbDjun=MAX_DJUNS;}

if ( $iNbDjun > 0 )
{
  echo "<div class=\"liste_djun\">\n";

  // - on récupère les infos: NB  on reste sur des tableaux pour le cas où on reviendrait à plusieurs D'juns (voir la classe)

for($i = 0; $i < MAX_DJUNS; $i++)
{
  $djun_no = "";
  $djun_name =  "";
  $djun_race =  "";

if(isset($_SESSION['avatars'][$i])&&!empty($_SESSION['avatars'][$i])){
  $djun_no = $_SESSION['avatars'][$i]->num_image;
  $djun_name =  $_SESSION['avatars'][$i]->nom;
  $djun_race =  $_SESSION['avatars'][$i]->race;
  }

  echo "<div class=\"djun\">";

  // - On formate le code html
  if ($djun_name != "" )
  {
  	?>
  	<p class="choix"><?php echo $this->traductions["cliquez-pour-jouer"][$_SESSION['lang']]; ?></p>
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
  	<p class="choix"><?php echo $this->traductions["choix-du-djun"][$_SESSION['lang']]; ?></p>
<?php
    $page = "choix_djun";
    $image = "images/tdb/djun_vide.png";
  }
?>
	<a href = "index.php?page=<?php echo $page; ?>">
   <img src="<?php echo $image; ?>" alt="<?php echo $this->traductions['choix-du-djun'][$_SESSION['lang']]; ?>" >
  </a>

  </div>   <!--    fin div class djun   -->
  <?php
	}  			//	Fin  de la boucle for sur le nombre de D'jun

}			//   fin du if sur ( $iNbDjun > 0 )
else {				//  $iNbDjun ==0, pas encore choisi de Djun
for($j=0;$j<MAX_DJUNS;$j++){
?>
	<div class="djun">
  		<p class="choix"><?php echo $this->traductions["choix-du-djun"][$_SESSION['lang']]; ?></p>
		<?php
   			 $page = "choix_djun";
   			 $image = "images/tdb/djun_vide.png";
		?>
		<a  href="index.php?page=<?php echo $page; ?>" >
			<img  src="<?php echo $image; ?>" alt="<?php echo $this->traductions['choix-du-djun'][$_SESSION['lang']]; ?>">
		</a>
	</div>
<?php
}		//   fin de boucle du MAX_DJUNS
} 				//  fin du else

	//   cadres pour passage compte premium et achat de dés supplémentaires.
?>
	<div class="djun des_sup">
		<a class="marges"  href="?page=des_supplementaires"><?php echo $this->traductions["achat-de-des"][$_SESSION['lang']]; ?></a>
	</div>
	<?php
	//   un cadre pour un upgrade de compte
	if(isset($_SESSION['compte']->type_compte)&&$_SESSION['compte']->type_compte=="base"){
		?>
	<div class="djun premium">
		<a class="marges" href="?page=compte_premium"><?php echo $this->traductions["compte-premium"][$_SESSION['lang']]; ?></a>
	</div>

<?php	
	}
	elseif(isset($_SESSION['compte']->type_compte)&&$_SESSION['compte']->type_compte=="premium"){
		?>
		<!--   POUR LE MOMENT, compte Gold non prévu
	<div class="djun premium">
		<a href="?page=compte_gold"><?php echo $this->traductions["compte-gold"][$_SESSION['lang']]; ?></a>
	</div>
	-->
<?php	
	} 			//  fin du if sur compte-premium
	
//    place pour un message d'erreur

if(isset($_GET['erreur'])){
	$message = $this->traductions_debut["probleme-non-identifie"][$_SESSION['lang']];
	if($_GET['erreur']==1){
			//   erreur = 1   signifie pas de mise à jour du peuple dans la BDD
		$message = $this->traductions["erreur-1"][$_SESSION['lang']];
	}
	if($_GET['erreur']=="no_djun"){
		//   erreur = "no_djun"  vient de la page djun, on n'a pas encore mis les avatars en mémoire, ou il n'y en a pas encore 
		$message = $this->traductions["erreur-2"][$_SESSION['lang']];
	}
?>
	<div class="tdb_erreur">
	<?php echo $message; ?>
	</div>
<?php
}			//    fin du if sur get-erreur

?>
  </div>			<!--  fermeture de div  liste_djun -->
<?php
}
else {
?>
	<div class="tdb_erreur">
	<?php echo $this->message; ?>
	</div>
<?php
}
?>


