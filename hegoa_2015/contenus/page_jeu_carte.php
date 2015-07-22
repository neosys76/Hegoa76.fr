<?php
if(!isset($nom_panneau)){
	$nom_panneau = "pan_1-1";
}
if(!isset($carte_x)){
	$carte_x = 0;
	$carte_y = 0;
}

?>

<!--   le panneau_jeu est le contenant: 942x663px   -->
<div class="panneau_carte">   <!--   container de la carte  -->
	
	<div id="plage_jeu"> 
		<div id="actions">
		</div>
		<section id="plage_jeu_1">		<!-- première section, correspondant à la carte totale en svg pour les codes couleurs-->
			<div class="panzoom">
				<canvas id="codes" width="1450" height="1000">Your browser does not support the HTML5 canvas tag.</canvas>
			</div> 
		</section>
		<section id="plage_jeu_2">		<!-- deuxième section, correspondant au panneau à charger-->
			<div class="panzoom">
				<img id="carte" src="images/cartes/panneaux/<?php  echo $nom_panneau; ?>.jpg" alt="dernière position sur la carte"/>
			</div> 
		</section>
	</div>

</div><!-- panneau_carte -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.panzoom.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/fonctions_carte.js"></script>
<script type="text/javascript" src="js/manipulation_carte.js"></script>
<script type="text/javascript">
transmettre_coordonnees("<?php echo $carte_x; ?>","<?php echo $carte_y; ?>");
transmettre_dimensions_carte("<?php echo LARGEUR_CARTE; ?>","<?php echo HAUTEUR_CARTE; ?>");
transmettre_dimensions_panneau("<?php echo LARGEUR_PANNEAU; ?>","<?php echo HAUTEUR_PANNEAU; ?>");
manipulation_carte();
</script>