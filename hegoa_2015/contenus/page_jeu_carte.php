<?php

if(!isset($nom_panneau)){
	$nom_panneau = "pan_1-1";
}
if(!isset($nom_panneau_codes)){
	$nom_panneau_codes = "pan_1-1";
}
$indices_panneau = substr($nom_panneau,4);
$parts_ind_pan = explode("-",$indices_panneau);
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
$coin_ajuste = -RATIO_AFFICH_PANNEAU*DIM_CASE/2;			//  valable pour top et left
$taille = RATIO_AFFICH_PANNEAU*DIM_CASE;
?>

<!--   le panneau_jeu est le contenant: 942x663px   -->
<div class="panneau_carte">   <!--   container de la carte  -->
	
	<div id="plage_jeu"> 
	
		<div id="actions" <?php if(isset($style_action)){echo $style_action;} ?> >
		</div>
		<section id="plage_jeu_1">		<!-- première section, correspondant à la carte totale en svg pour les codes couleurs-->
				<img id="imgcodes" src="images/cartes/panneaux/<?php  echo $nom_panneau_codes; ?>.svg">
				<canvas id="codes"><?php echo $this->traductions['browser-no-canvas'][$_SESSION['lang']]; ?>	</canvas>
				<div class="waiting" style="margin-left:0;"></div>				<!--   pour cacher l'image-codes  -->
		</section>
		<section id="plage_jeu_2">		<!-- deuxième section, correspondant au panneau à charger-->
		
			<div class="panzoom">
				<img id="carte" src="images/cartes/panneaux/<?php  echo $nom_panneau; ?>.jpg" alt="<?php echo $this->traductions['ceci-derniere-case'][$_SESSION['lang']]; ?>	">
				<script src="js/jquery-1.11.0.min.js"></script>				
				<script type="text/javascript">		
				//$("#carte").css("z-index","0");
				//$("#carte").hide();
				$("#carte").css("visibility","hidden");
				</script>
				<?php
					if(isset($this->svgfileuri)&&!empty($this->svgfileuri)){
						foreach($this->svgfileuri as $svgimage){
					?>
						<img class="cases_joueurs" src="<?php echo  $svgimage; ?>" > 
					<?php
						}
					}
					if(isset($this->rayon_constructible)&&!empty($this->rayon_constructible)){
						$new_top = -(intval($parts_ind_pan[0])-1)*HAUTEUR_PANNEAU*RATIO_AFFICH_PANNEAU;
						$new_left = -(intval($parts_ind_pan[1])-1)*LARGEUR_PANNEAU*RATIO_AFFICH_PANNEAU;
				?>
				<div class="rayon" style="top:<?php echo $new_top; ?>px;left:<?php echo $new_left; ?>px;">
				<?php
					$width = RATIO_AFFICH_PANNEAU * LARGEUR_CARTE;
					$height = RATIO_AFFICH_PANNEAU * HAUTEUR_CARTE;
					$rayon = $this->rayon_constructible * RATIO_AFFICH_PANNEAU;
					$parts_case_ref = explode(",",$this->case_reference);
					$cx = round(RATIO_AFFICH_PANNEAU * DIM_CASE * (intval(substr($parts_case_ref[0],1))-0.5));
					$cy = round(RATIO_AFFICH_PANNEAU * DIM_CASE * (intval($parts_case_ref[1])-0.5));
				?>
				<svg width="<?php echo $width; ?>" height="<?php echo $height; ?>" viewBox="0 0 <?php echo $width; ?> <?php echo $height; ?>" xmlns="http://www.w3.org/2000/svg">
					<circle cx="<?php echo $cx; ?>" cy="<?php echo $cy; ?>" r="<?php echo $rayon; ?>" stroke="red" stroke-width="10" fill="rgba(0,0,255,0.15)" />
				</svg>
				</div>
				<?php
					}
					?>
			</div> 
		</section>
		
		<div id="entoure_case">
			<div id="commentaire">
				<?php echo $this->traductions['ceci-derniere-case'][$_SESSION['lang']]; ?>		
			</div>
		</div>
</div><!-- plage_jeu -->
</div>  <!-- panneau_carte -->

		<div id="waiting" class="waiting" >
		<img src="images/animated-waiting.gif">
		<p class="message_chargement"><?php echo $this->traductions['chargement-carte'][$_SESSION['lang']]; ?>	</p>
		</div>
</div> <!-- panneau_jeu -->
<noscript><?php echo $this->traductions['activer-javascript'][$_SESSION['lang']]; ?>		</noscript>

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
manipulation_carte("<?php echo $nom_panneau; ?>",'<?php echo $mes_cases_occupees_json; ?>',"<?php echo $_SESSION['lang']; ?>");

setTimeout(function(){ 
		$("#carte").css("visibility","visible");
		$("#waiting").remove();
	
	setTimeout(function(){ 
		$("#entoure_case").addClass("entoure_case");
		var newtop = (parseInt($(".entoure_case").css("top"))+parseInt("<?php echo $coin_ajuste; ?>")).toString()+"px";
		var newleft = (parseInt($(".entoure_case").css("left"))+parseInt("<?php echo $coin_ajuste; ?>")).toString()+"px";
		var newtaille = (parseInt("<?php echo $taille; ?>")).toString()+"px";
		$("#entoure_case").css("top",newtop);
		$("#entoure_case").css("left",newleft);
		$("#entoure_case").css("width",newtaille);
		$("#entoure_case").css("height",newtaille);
		setTimeout(function(){ $("#entoure_case").remove(); }, 3000);
		},500);
},3000);
</script>