//   variables globales 
	carte_coord_x = 0;
	carte_coord_y = 0;
	largeur_carte_totale = 0;
	hauteur_carte_totale = 0;
	largeur_panneau = 0;
	hauteur_panneau = 0;

//   fonction transmettant les coordonnées du point concerné: les variables carte_coord_x et carte_coord_y  sont accessibles partour dans le script
function transmettre_coordonnees(le_x,le_y){
	carte_coord_x = parseInt(le_x);
	carte_coord_y = parseInt(le_y);
}

//   fonction transmettant les dimensions de la carte totale: les variables largeur_carte_totale et hauteur_carte_totale sont accessibles partour dans le script
function transmettre_dimensions_carte(sur_x,sur_y){
	largeur_carte_totale = parseInt(sur_x);
	hauteur_carte_totale = parseInt(sur_y);
}

//   fonction transmettant les dimensions d'un panneau: les variables largeur_panneau et hauteur_panneau sont accessibles partour dans le script
function transmettre_dimensions_panneau(sur_x,sur_y){
	largeur_panneau = parseInt(sur_x);
	hauteur_panneau =parseInt(sur_y);
}

//   fonction définissant les variables de dimensions

function defineDimensions() {
	
	//  dimensions des panneaux unitaires de découpage de la carte: panelWidth et panelHeight,en px
	//  dimensions des sections d'accueil HTML pour les trois types de carte, en relation avec les CSS : section1Width, section1Height, section2Width, section2Height
	//  		la première section contient la carte des couleurs en svg
	//		la deuxième section contient le panneau concerné par les coordonnées
	// dimensions de la carte totale: carterWidth, carteHeight
	//  dimensions d'une "case" sur la carte  (par exemple, 70x70px, ou 20x20px): caseWidth, caseHeight
	//   la variable zoom_desire est le facteur de zoom du panneau pour l'affichage initial
	//  dans ce fichier, on considère que les deux sections ont les mêmes dimensions
	
	//  retourne l'objet  dimensions
	var zoom_desire = 0.75;
	largeur_affiche_panneau_initial = zoom_desire*largeur_panneau;
	hauteur_affiche_panneau_initial = zoom_desire*hauteur_panneau;
	var dimensions = {
		panelWidth : largeur_panneau,
		panelHeight : hauteur_panneau,
		section1Width: largeur_affiche_panneau_initial,
		section1Height : hauteur_affiche_panneau_initial,
		section2Width: largeur_affiche_panneau_initial,
		section2Height : hauteur_affiche_panneau_initial,
		carteWidth : largeur_carte_totale,
		carteHeight : hauteur_carte_totale,
		caseWidth: 50, 
		caseHeight: 50
	};
 
	return dimensions;
}
 
      
//  fonction contenant l'affichage des actions sur une case
function afficheaction(absx,ordy,couleur){
	var textHtml ="<h2>Ce que vous pouvez faire sur une case</h2>";
	textHtml += "<span class='attention'>Attention: il s'agit d'une liste d'options mais la faisabilité sera contrôlée après votre choix</span><br/><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=affiche-etat-case&absx="+absx+"&ordy="+ordy+"&couleur="+couleur+"'>Afficher l'état de la case</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=construire-village&absx="+absx+"&ordy="+ordy+"&couleur="+couleur+"'>Construire un village</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=installer-campement&absx="+absx+"&ordy="+ordy+"&couleur="+couleur+"'>Installer un campement de troupe</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=livraison&absx="+absx+"&ordy="+ordy+"&couleur="+couleur+"'>Effectuer une livraison</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=espionnage&absx="+absx+"&ordy="+ordy+"&couleur="+couleur+"'>Espionnage</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=attaquer&absx="+absx+"&ordy="+ordy+"&couleur="+couleur+"'>Lancer une attaque</a><br/>";
	textHtml += "<a class='lien_in_case' href='index.php?page=etablir-marche&absx="+absx+"&ordy="+ordy+"&couleur="+couleur+"'>Installer un marché</a><br/>";
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
	var padding = 2;
	while (red.length < padding) {
        red = "0" + red;
    }
	var green = g.toString(16);
	while (green.length < padding) {
        green = "0" + green;
    }
	var blue = b.toString(16);
	while (blue.length < padding) {
        blue = "0" + blue;
    }
	
    return red+green+blue;
}
