
//  fonction anonyme de départ 
function manipulation_carte() {

	//  dimensions des sections 
	var lesDims = defineDimensions();
	//   URL du site, pour des appels ajax
	var siteurl = "http://localhost:8888/hegoa_eu/working_21-07-15_go-on-restruct/";
	//   seule la carte est visible
	$("#actions").hide();

	var section1 = $('#plage_jeu_2');
	var image_carte = $('#carte');
	var csswidth = lesDims["section2Width"];
	var cssheight = lesDims["section2Height"];
	image_carte.css("width",csswidth);
	image_carte.css("height",cssheight);
	var $panzoom = section1.find('.panzoom').panzoom();
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
		//  transformation de ces coordonnées de fenêtre en "vraies" coordonnées dans la carte totale
		var xcode,ycode;
		//  exemple de test
		xcode=1000; 
		ycode=500;
		//  chargement de la carte codes-couleurs dans le canvas pour déterminer la couleur associée aux coordonnées
		//  NB: cette carte couleur n'est pas chargée à la "vraie" dimension, mais avec un facteur de zoom 
		// il faut déterminer les indices correspondant à la case et déterminer si la case est une frontière (plusieurs terrains=> non constructible) ou un terrain d'un seul tenant
		
		var lesDims = defineDimensions();
		/*
		var largeur1 = lesDims["section1Width"];
		var hauteur1 = lesDims["section1Height"];
		*/
		var largeur1 = lesDims["carteWidth"];
		var hauteur1 = lesDims["carteHeight"];
		var section2 = $('#plage_jeu_1');
		section2.css("width",largeur1);
		section2.css("height",hauteur1);
		//section2.css("z-index",200);
		//var section3 = $('#codes');
		//section3.css("z-index",210);

		var myImage = new Image(largeur1, hauteur1);

		//ctx.globalAlpha = 0.1;			//   ??  nécessaire  car css ??
	
var ctx = createContextCanvas("codes",largeur1,hauteur1);
    	
    	myImage.onload = function(){
    		alert(ycode);
    		ctx.drawImage(myImage, 0, 0, largeur1, hauteur1, 0, 0, largeur1, hauteur1);
    		var p = ctx.getImageData(xcode, ycode, 1, 1).data; 
    		var hex = "#" + rgbToHex(p[0], p[1], p[2]);
    		alert(hex);
    		}
    	myImage.onerror = function(){alert("PROUTTT");}
    	
    	myImage.src = "images/cartes/carte_codes-couleurs.svg";
    	
   	});			//  fin de panzoom-dblclick


}		//  fin de la fonction anonyme 
