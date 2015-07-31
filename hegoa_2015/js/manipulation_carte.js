
//  fonction de manipulation du panneau chargé
function manipulation_carte(nom_panneau) {

	//   nom_panneau est l'étiquette du nom du panneau chargé
	//  recherche des coordonnées dans le panneau
	var deux_indices = nom_panneau.substring(4);
	var indices = deux_indices.split("-");
	var num_sur_y = indices[0]-1;
	var num_sur_x = indices[1]-1;
	var num_sur_x_max = Math.round(largeur_carte_totale/largeur_panneau)-1;
	var num_sur_y_max = Math.round(hauteur_carte_totale/hauteur_panneau)-1;

	var panneau_coord_x = carte_coord_x - num_sur_x*largeur_panneau;
	var panneau_coord_y = carte_coord_y - num_sur_y*hauteur_panneau;
	//  dimensions des sections 
	var lesDims = defineDimensions();

	var section1 = $('#plage_jeu_2');
	var image_carte = $('#carte');
	var csswidth = lesDims["section2Width"];
	var cssheight = lesDims["section2Height"];
	image_carte.css("width",csswidth);
	image_carte.css("height",cssheight);
	var displx = -Math.round((ratio_affich_panneau*panneau_coord_x - fenetre_visible_x/2));
	var disply = -Math.round((ratio_affich_panneau*panneau_coord_y - fenetre_visible_y/2));

	var $panzoom = section1.find('.panzoom').panzoom();
	$panzoom.panzoom("pan",displx,disply);
	$panzoom.parent().on('mousewheel.plage_jeu', function( e ) {
		e.preventDefault();
		var delta = e.delta || e.originalEvent.wheelDelta;
		var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
		$panzoom.panzoom('zoom', zoomOut, {
			increment: 0.1,
			animate: false,
			focal: e,
			minScale:1
			});
	});
		
			//   quand on double-clique, on charge le panneau associé aux 2e niveau de zoom
	$panzoom.parent().on('dblclick', function( e ) {
		
		var pos1 = findPos(this);
		var x1 = e.pageX - pos1.x;
		var y1 = e.pageY - pos1.y;
		//  chargement de la carte codes-couleurs dans le canvas pour déterminer la couleur associée aux coordonnées
		//  NB: cette carte couleur n'est pas chargée à la "vraie" dimension, mais avec un facteur de zoom 
		// il faut déterminer les indices correspondant à la case et déterminer si la case est une frontière (plusieurs terrains=> non constructible) ou un terrain d'un seul tenant

		var lesDims = defineDimensions();
		var largeur_carte = lesDims["carteWidth"];
		var hauteur_carte = lesDims["carteHeight"];
		var largeur_panneau = lesDims["panelWidth"];
		var hauteur_panneau = lesDims["panelHeight"];
		var largeur_panneau_code = lesDims["panelCodeWidth"];
		var hauteur_panneau_code = lesDims["panelCodeHeight"];
		//   pour l'image jpg
		var largeur_section2 = lesDims["section2Width"];				
		var hauteur_section2 = lesDims["section2Height"];
		//  pour les codes couleurs
		var largeur_section1 = lesDims["section1Width"];				
		var hauteur_section1 = lesDims["section1Height"];
		var ratio1X = largeur_section1/largeur_panneau_code;
		var ratio1Y = hauteur_section1/hauteur_panneau_code;
		var ratio2X = largeur_section2/largeur_panneau;
		var ratio2Y = hauteur_section2/hauteur_panneau;

		//  transformation de ces coordonnées de fenêtre en "vraies" coordonnées dans la carte totale
		var matrix = 	$panzoom.panzoom("getMatrix");	
		var xp = largeur_section2*(matrix[0]-1)/2 - matrix[4];
		var yp = hauteur_section2*(matrix[0]-1)/2 - matrix[5];
		var ratioX = largeur_section1/largeur_section2;
		var ratioY = hauteur_section1/hauteur_section2;
		//   coordonnées dans le panneau couleurs-codes dans les dimensions affichées
		var realx_in_section1 = (xp+x1)*ratioX/matrix[0];
		var realy_in_section1 = (yp+y1)*ratioY/matrix[0];
		//   coordonnées dans le panneau image dans les dimensions affichées
		var realx_in_section2 = (xp+x1)/matrix[0];
		var realy_in_section2 = (yp+y1)/matrix[0];
		//   coordonnées dans le panneau code à dimensions réelles déclarées dans le SVG
		var realx_in_panneauSVG = realx_in_section1/ratio1X;
		var realy_in_panneauSVG = realy_in_section1/ratio1Y;
		if(realx_in_panneauSVG<0){realx_in_panneauSVG=0;}
		if(realy_in_panneauSVG<0){realy_in_panneauSVG=0;}
		if(realx_in_panneauSVG>largeur_panneau_code){realx_in_carte=largeur_panneau_code;}
		if(realy_in_panneauSVG>hauteur_panneau_code){realy_in_carte=hauteur_panneau_code;}
		var realx_in_carte = Math.round(realx_in_section2/ratio2X + num_sur_x*largeur_panneau);
		var realy_in_carte = Math.round(realy_in_section2/ratio2Y + num_sur_y*hauteur_panneau);
		var check_probleme = 0;
		if(realx_in_carte<0){realx_in_carte=0;check_probleme=1;}
		if(realy_in_carte<0){realy_in_carte=0;check_probleme=1;}
		if(realx_in_carte>largeur_carte){realx_in_carte=largeur_carte;check_probleme=1;}
		if(realy_in_carte>hauteur_carte){realy_in_carte=hauteur_carte;check_probleme=1;}
		//  test pour contrôler que les coordonnées sont encore dans le panneau affiché
		
		var check_num_sur_y = Math.floor(realy_in_carte/hauteur_panneau);
		var check_num_sur_x = Math.floor(realx_in_carte/largeur_panneau);
		
		
		var section2 = $('#plage_jeu_1');
		section2.css("width",largeur_section1);
		section2.css("height",hauteur_section1);
		
		var myImage=document.getElementById("imgcodes"); 

		myImage.style.cssheight=hauteur_section1+"px";
		myImage.style.csswidth=largeur_section1+"px";
		var ctx = createContextCanvas("codes",largeur_panneau_code,hauteur_panneau_code);    	
		ctx.scale(ratio1X,ratio1Y);
		ctx.drawImage(myImage, 0, 0); 
		var p = ctx.getImageData(realx_in_section1, realy_in_section1, 1, 1).data; 
   		var hex = rgbToHex(p[0], p[1], p[2]);
   		if(((check_num_sur_x!=num_sur_x)||(check_num_sur_y!=num_sur_y))||check_probleme!=0){
   			//   les coordonnées pointées sortent du panneau affiché
   			// contrôle de l'existence du panneau
   			if(check_probleme==0){	
   				window.location.href = "index.php?page=charge_nouveau_panneau&absx="+realx_in_carte+"&ordy="+realy_in_carte;
   			}
   			else {
   				check_probleme=0;
   				alert("Il n'y a pas de panneau associé à ces coordonnées");
   				window.location.href = "index.php?page=charge_nouveau_panneau";
   			}
   		}
   		else {
   			var contenu_actions= afficheaction(realx_in_carte,realy_in_carte,hex);
   			$("#actions").html(contenu_actions);
   			$("#actions").css("z-index",300);
   		}

   	});			//  fin de panzoom-dblclick
   	
}		//  fin de la fonction manipulation
