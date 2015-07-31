
<div class="colonisation">   <!--   container  -->

<?php
if(isset($message)&&!empty($message)){
	echo $message;
}
else {
$case = urldecode($_GET['case']);
?>
<h2>Choisissez votre type de colonisation ou d'action sur la case choisie</h2>
<form action="?page=jeu&espace=colonisation" method="POST">
<input type="hidden" value="<?php echo $_GET['terrain']; ?>" name="terrain">
<input type="hidden" value="<?php echo $case; ?>" name="case">
<input id="village" type="radio" name="type_colonisation" value="village" checked><label for="village"><span><span></span></span>: Construire un village</label> <br/>
<input id="campement" type="radio" name="type_colonisation" value="campement"><label for="campement"><span><span></span></span>: Installer un campement de troupe</label><br/> 
<input  id="livraison" type="radio" name="type_colonisation" value="livraison"><label for="livraison"><span><span></span></span>: Effectuer une livraison</label><br/> 
<input  id="espionnage" type="radio" name="type_colonisation" value="espionnage"><label for="espionnage"><span><span></span></span>: Espionner</label><br/> 
<input  id="attaque" type="radio" name="type_colonisation" value="attaque"><label for="attaque"><span><span></span></span>: Attaquer</label><br/> 
<input  id="marche" type="radio" name="type_colonisation" value="marche"><label for="marche"><span><span></span></span>: Etablir un marché</label><br/> <br/> <br/> 

<input type="image" src="images/valider_ok.png" name="choix_colonisation"><br/><br/>
</form>

<?php
}

?>

</div><!--  etat_case -->