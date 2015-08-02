<?php
if(!isset($nom_panneau)){
	$nom_panneau = "pan_1-1";
}
if(!isset($carte_x)){
	$carte_x = 0;
	$carte_y = 0;
}
if(isset($_GET["rafraichi"])&&$_GET["rafraichi"]=="oui"){
	$style_action = "style=\"display:none;\" ";
}
//  pour transmettre les cases occupées par l'avatar au script JS manipulation_carte.js, on récupère toutes les cases occupées et mises en SESSION, sous forme JSON
$classe_vide = new stdClass();
$json_array_vide = array($classe_vide);
$mes_cases_occupees_json = json_encode($json_array_vide);
if(!empty($_SESSION['djun_choisi']->mes_cases)&&(isset($_SESSION['djun_choisi']->mes_cases[0])&&!empty($_SESSION['djun_choisi']->mes_cases[0]))){
	$mes_cases_occupees_json = json_encode($_SESSION['djun_choisi']->mes_cases);
}

//  on calcule le top, left and co pour la div d'emphase de la case centrale
$coin_ajuste = -DIM_CASE/2;			//  valable pour top et left
$taille = DIM_CASE;
?>

<!--   le panneau_jeu est le contenant: 942x663px   -->
<div class="panneau_carte">   <!--   container de la carte  -->
	
	<div id="plage_jeu"> 
		<div id="actions" <?php if(isset($style_action)){echo $style_action;} ?> >
		</div>
		<section id="plage_jeu_1">		<!-- première section, correspondant à la carte totale en svg pour les codes couleurs-->
				<img id="imgcodes" src="images/cartes/panneaux/<?php  echo $nom_panneau; ?>.svg" >
				<canvas id="codes">Your browser does not support the HTML5 canvas tag.</canvas>
		</section>
		<section id="plage_jeu_2">		<!-- deuxième section, correspondant au panneau à charger-->
			<div class="panzoom">
				<img id="carte" src="images/cartes/panneaux/<?php  echo $nom_panneau; ?>.jpg" alt="dernière position sur la carte">
			</div> 
		</section>
		<div id="entoure_case">
			<div id="commentaire">
				Ceci est la dernière case visitée			
			</div>
		</div>
	</div>

</div><!-- panneau_carte -->
<noscript>MERDEEEEEEEEEEE</noscript>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.panzoom.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/fonctions_carte.js"></script>
<script type="text/javascript" src="js/manipulation_carte.js"></script>
<script type="text/javascript">
transmettre_coordonnees("<?php echo $carte_x; ?>","<?php echo $carte_y; ?>");
transmettre_dimensions_fenetre("<?php echo LARGEUR_FENETRE; ?>","<?php echo HAUTEUR_FENETRE; ?>");
transmettre_dimensions_carte("<?php echo LARGEUR_CARTE; ?>","<?php echo HAUTEUR_CARTE; ?>");
transmettre_dimensions_panneau("<?php echo LARGEUR_PANNEAU; ?>","<?php echo HAUTEUR_PANNEAU; ?>","<?php echo RATIO_AFFICH_PANNEAU; ?>");
transmettre_dimensions_panneau_codes("<?php echo LARGEUR_PANNEAU_CODES; ?>","<?php echo HAUTEUR_PANNEAU_CODES; ?>","<?php echo RATIO_AFFICH_PANNEAU_CODES; ?>");
transmettre_cote_casa("<?php echo DIM_CASE; ?>");
manipulation_carte("<?php echo $nom_panneau; ?>","<?php echo $mes_cases_occupees_json; ?>");
var newtop = (parseInt($("#entoure_case").css("top"))+parseInt("<?php echo $coin_ajuste; ?>")).toString()+"px";
var newleft = (parseInt($("#entoure_case").css("left"))+parseInt("<?php echo $coin_ajuste; ?>")).toString()+"px";
var newtaille = (parseInt("<?php echo $taille; ?>")).toString()+"px";
$("#entoure_case").css("top",newtop);
$("#entoure_case").css("left",newleft);
$("#entoure_case").css("width",newtaille);
$("#entoure_case").css("height",newtaille);
setTimeout(function(){ $("#entoure_case").remove(); }, 3900);
</script>