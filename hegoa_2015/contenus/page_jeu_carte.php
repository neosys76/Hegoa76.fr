

<!--   le panneau_jeu est le contenant: 942x663px   -->
<div class="panneau_carte">   <!--   container  -->
	<div id="actions">
	</div>
	<div id="plage_jeu"> 
		<section id="plage_jeu_1" class="jeu_section">		<!-- première section, correspondant à ce qui est affiché au départ, ie la carte du 1er niveau de zoom -->
			<div class="parent">
				<div class="panzoom">
					<img id="carte1" src="images/cartes/carte_900x650.jpg" alt="la carte départ"/>
				</div> 
			</div>
		</section>
		<section id="plage_jeu_2" class="jeu_section">		<!-- deuxième section, correspondant à  la carte du 2e niveau de zoom -->
			<div class="parent">
				<div class="panzoom">
					<img id="carte2" src="images/cartes/carte_1800x1300_v3.jpg" alt="la carte 2e niveau de zoom"/>
				</div> 
			</div>
		</section>
		<section id="plage_jeu_3" class="jeu_section">			<!--  troisième section, correspondant aux panneaux à charger en relation avec les coordonnées du curseur; contient un canvas vide au départ  -->
			<div class="parent">
				<div class="panzoom">
					<canvas id="panneau">Your browser does not support the HTML5 canvas tag.</canvas>
				</div> 
			</div>
		</section>
	</div>

</div><!-- panneau_carte -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.panzoom.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/carte.js"></script>