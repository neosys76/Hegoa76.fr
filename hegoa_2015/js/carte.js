//   fonction définissant les variables de dimensions

function defineDimensions() {
	//  dimensions des panneaux unitaires de découpage du dernier zoom: panelWidth et panelHeight,en px
	//  dimensions des sections d'accueil HTML pour les trois niveaux, en relation avec les CSS : section1Width, section1Height, section2Width, section2Height, section3Width, section3Height
	//  	NB: section3Width et section3Height devraient valoir 3x panelDimensions, sinon mal centré.
	// dimensions de la carte totale du dernier zoom: carterWidth, carteHeight
	
	//  retourne l'objet  dimensions
	var dimensions = {
		panelWidth : 720,
		panelHeight : 520,
		section1Width: 900,
		section1Height : 650,
		section2Width: 1800,
		section2Height : 1300,
		section3Width: 2160,
		section3Height : 1560,
		carteWidth : 3600,
		carteHeight : 2600
	};

	return dimensions;
}
      
       
//  fonction contenant l'affichage des actions sur une case
function afficheaction(absx,ordy){
	var textHtml = "<a class='lien_in_case' href='index.php?page=show-case-status&absx="+absx+"&ordy="+ordy+"'>Afficher l'état de la case</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=construire-village&absx="+absx+"&ordy="+ordy+"'>Construire un village</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=installer-armee&absx="+absx+"&ordy="+ordy+"'>Installer une armée</a><br/>";
	return textHtml;
}

//  fonction de création d'un contexte de canvas
function createContextCanvas(canvasIdName, canvasWidth, canvasHeight){
	var c = document.getElementById(canvasIdName);
   //    IMPORTANT: mettre les dimensions au canvas !!!
   c.setAttribute('width', canvasWidth);
   c.setAttribute('height', canvasHeight);
   var ctx = c.getContext("2d");
	return ctx;
}


//    fonction qui ajoute une image dans un canvas
function loadImageInCanvas(canvasContext, panelWidth, panelHeight, imageWidth, imageHeight, xclip, yclip, xpos, ypos, imagePath){
	var myImage = new Image(imageWidth,imageHeight);
	myImage.src = imagePath;
   myImage.onload = function(){
	   canvasContext.drawImage(myImage, xclip, yclip, imageWidth, imageHeight, xpos, ypos, panelWidth, panelHeight); 
	}
}

//   trouver la position x,y du curseur
function findPos(obj) {
    var curleft = 0, curtop = 0;
    if (obj.offsetParent) {
        do {
            curleft += obj.offsetLeft;
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
        return { x: curleft, y: curtop };
    }
    return undefined;
}

//  trouver les couleurs du pixel associée au curseur
function rgbToHex(r, g, b) {
    if (r > 255 || g > 255 || b > 255)
        throw "Invalid color component";
	var red = r.toString(16);
	var green = g.toString(16);
	var blue = b.toString(16);
	
    return red+green+blue;
}

//  fonction anonyme de départ 
(function() {
	$("#actions").hide();
	$("#plage_jeu_1").show();
	$("#plage_jeu_2").hide();
	$("#plage_jeu_3").hide();
	
	//   on est focalisé au départ sur la carte "entière", ie la première section, intégrée dans la section d'accueil
	var $section1 = $('#plage_jeu_1');
	var $panzoom = $section1.find('.panzoom').panzoom();
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
		var coord = "x=" + x1 + ", y=" + y1;
		//  coordonnées utilisées plus tard
		
 		//   on affiche le 2e niveau de zoom (déjà loadé, juste basculer les sections 1 et 2)
		$("#plage_jeu_1").hide();
		$("#plage_jeu_2").show();
		var $section2 = $('#plage_jeu_2');
		var $panzoom2 = $section2.find('.panzoom').panzoom();
		$panzoom2.parent().on('mousewheel.plage_jeu', function( e ) {
			e.preventDefault();
			var delta = e.delta || e.originalEvent.wheelDelta;
			var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
			$panzoom2.panzoom('zoom', zoomOut, {
				increment: 0.1,
				animate: false,
				focal: e,
				minScale:0.5
				});
			});
			//   quand on clique, on charge le panneau associé aux 3e niveau de zoom (section 3 avec canvas)
		$panzoom2.parent().on('dblclick', function( e ) {
			var lesDims = defineDimensions();
			//  nombre de panneaux sur X et Y
			var nombrePanX = lesDims["carteWidth"]/lesDims["panelWidth"];
			var nombrePanY = lesDims["carteHeight"]/lesDims["panelHeight"];
			var pos = findPos(this);
			var x = e.pageX - pos.x;
			var y = e.pageY - pos.y;
			var coord = "x=" + x + ", y=" + y;
			//  PX, PY: dimensions des panneaux unitaires
			var PX=lesDims["panelWidth"];
			var PY=lesDims["panelHeight"];
			//  CX, CY: dimensions de l'image dans la section d'accueil du 2e zoom
			var CX=lesDims["section2Width"];
			var CY=lesDims["section2Height"];
			//   taille réelle de l'image
			var Wim = lesDims["carteWidth"];
			var Him = lesDims["carteHeight"];
			//  ratios 
			var ratioX = Wim/CX;
			var ratioY = Him/CY;
			var matrix = 	$panzoom2.panzoom("getMatrix");	
			var xp = CX*(matrix[0]-1)/2 - matrix[4];
			var yp = CY*(matrix[0]-1)/2 - matrix[5];
			var realx = (xp+x)*ratioX/matrix[0];
			var realy = (yp+y)*ratioY/matrix[0];
			// à quel panneau unitaire ces coordonnées correspondent-elles? les panneaux sont notés pan_numY-numX.jpg, ie ligne-colonne, avec Y sur les lignes et X sur les colonnes
			var numX = parseInt(realx/PX)+1;	
			var numY = parseInt(realy/PY)+1;
			var num11,num12,num13,num21,num22,num23,num31,num32,num33;
			var snumY,snumYm1,snumYm2,snumYp1,snumX,snumXm1,snumXm2,snumXp1;
			var xpan, ypan;
			var xpos, ypos;
			var imagePath;
			//  cas du bord gauche, comprenant les coins
			if(numX==1){
				snumX="2";
				snumXm1="1";
				snumXp1="3";
				if(numY==1){
					//  coin haut
					snumY="2";
					snumYm1="1";
					snumYp1="3";
				}
				else if(numY==nombrePanY)	{
					//coin bas
					snumYp1=numY.toString();
					snumY = (numY-1).toString();
					snumYm1 = (numY-2).toString();		
				}
				else {
					//  bord "non coin"
					snumY=numY.toString();
					snumYm1 = (numY-1).toString();
					snumYp1 = (numY+1).toString();				
				}
				
			}
				//  cas du bord droit, comprenant les coins
			else if(numX==nombrePanX){
				snumXp1=numX.toString();
				snumX = (numX-1).toString();
				snumXm1 = (numX-2).toString();
				if(numY==1){
					//  coin haut
					snumY="2";
					snumYm1 = "1";
					snumYp1 = "3";		
				}
				else if(numY==nombrePanY)	{
					//coin bas	
					snumYp1=numY.toString();
					snumY = (numY-1).toString();
					snumYm1 = (numY-2).toString();			
				}
				else {
					//  bord "non coin"
					snumY=numY.toString();
					snumYm1 = (numY-1).toString();
					snumYp1 = (numY+1).toString();
				}	
			}		
			else {
				snumXp1=(numX+1).toString();
				snumX = numX.toString();
				snumXm1 = (numX-1).toString();
			//  ce n'est pas un bord gauche ou droit
				//  cas du bord haut, sans le coin (déjà pris en compte)
				if(numY==1){
					snumY="2";
					snumYm1="1";
					snumYp1="3";		
				}
				//  cas du bord bas, sans le coin (déjà pris en compte)
				else if(numY==nombrePanY){
					snumYp1=numY.toString();
					snumY = (numY-1).toString();
					snumYm1 = (numY-2).toString();	
				}
				else {
					//  cellule entourée par 8 autres
					snumY=numY.toString();
					snumYm1 = (numY-1).toString();
					snumYp1 = (numY+1).toString();				
				}	
			}
			
			num11=snumYm1+"-"+snumXm1;
			num12=snumYm1+"-"+snumX;
			num13=snumYm1+"-"+snumXp1;
			num21=snumY+"-"+snumXm1;
			num22=snumY+"-"+snumX;
			num23=snumY+"-"+snumXp1;
			num31=snumYp1+"-"+snumXm1;
			num32=snumYp1+"-"+snumX;
			num33=snumYp1+"-"+snumXp1;
			var listeIndices = [num11,num12,num13,num21,num22,num23,num31,num32,num33];
		
			//  charger tous les panneaux choisis dans le canvas #panneau dans la section #plage_jeu_2
			var ctx = createContextCanvas("panneau", CX, CY);
			for(var i=0;i<listeIndices.length;i++){
				xpos = PX*(i%3);
				ypos = PY*(parseInt(i/3));
				imagePath = "images/cartes/panneaux/pan_"+listeIndices[i]+".jpg";
				loadImageInCanvas(ctx, PX, PY, PX, PY, 0, 0, xpos, ypos, imagePath);
			}
		
			//  Trouver à quelles coordonnées xpan, ypan, du panneau numY-numX les coordonnées realx,realy correspondent.
			xpan = realx - PX*(numX-1)
			ypan = realy - PY*(numY-1)
 
			$("#plage_jeu_2").hide();
			$("#plage_jeu_3").show();
			var $section3 = $('#plage_jeu_3');
			var $panzoom3 = $section3.find('.panzoom').panzoom();
			$panzoom3.parent().on('mousewheel.plage_jeu', function( e ) {
				e.preventDefault();
				var delta = e.delta || e.originalEvent.wheelDelta;
				var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
				$panzoom3.panzoom('zoom', zoomOut, {
					increment: 0.1,
					animate: false,
					focal: e,
					minScale:0.1
				});
			});
			//   quand on clique, on charge le panneau associé aux actions à entreprendre
			$panzoom3.parent().on('dblclick', function( e ) {
				var contenu = afficheaction(realx,realy);
				$("#actions").html(contenu );
				//  afficher la div action
				$("#plage_jeu_3").hide();
				$("#actions").show();
				
			});			//   fin panzoom3-click
		});			//  fin de panzoom2-click
	});			//  fin de panzoom-click


})();			//  fin de la fonction anonyme 
