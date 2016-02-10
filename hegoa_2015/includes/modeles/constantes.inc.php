<?php
// ======================================================================
// Auteur : Dominique Dehareng, Donatien Celia
// Licence : CeCILL v2
// ======================================================================

if ( ! defined ("CONSTANTES.INC") )
{
	// - Déclaration de la constante 
	define ("CONSTANTES.INC", "1");
	
	//   Données ADMIN
	define("EMAIL_ADMIN","neosys@tuxfamily.org");
	
	//   les dir des modèles et des utilitaires, à partir de la racine
	define("UTILPATH","includes/utilitaires/");
	define("MODELPATH","includes/modeles/");
	
	// - Pour la base de données

	define("HOSTNAME",  "localhost"); // - ou localhost
	define("BASE",      "hegoa");
	define("LOGIN",     "hegoa");
	define("PASSWORD",	"Subsystem0");
	define("SALT","?5fvyk+1DV75fT?@4Wp#KrVa");
	
	//  -  Pour les données relatives au jeu
	//		La carte
//   rapport de 1/2 entre l'affichage et la vraie valeur des panneaux
	define("RATIO_AFFICH_PANNEAU",0.5);							//   rapport entre la taille de la section définie dans la page web et la dimension du panneau image jpg

	define("LARGEUR_CARTE","26800");					//   largeur de la carte totale du monde, en px
	define("HAUTEUR_CARTE","18800");					//   hauteur de la carte totale du monde, en px
	define("LARGEUR_PANNEAU","6700");					//   largeur d'un panneau image jpg, en px
	define("HAUTEUR_PANNEAU","4700");					//   hauteur d'un panneau image jpg, en px

	define("LARGEUR_PANNEAU_CODES","13400");					//   largeur d'un panneau pour les codes couleurs, en px
	define("HAUTEUR_PANNEAU_CODES","9400");					//   hauteur d'un panneau pour les codes souleurs, en px
	
	/*
	*		Détermination du rapport panneau SVG-codes//(section définie dans la page web), fonction du rapport RATIO_AFFICH_PANNEAU et d'autres variables
	*			les deux sections contenant le SVG-codes et l'image du jeu ont les mêmes dimensions dans le fichier css
	*/
	$ratio_pans = LARGEUR_PANNEAU_CODES/LARGEUR_PANNEAU;
	$valeur = RATIO_AFFICH_PANNEAU/$ratio_pans;
	define("RATIO_AFFICH_PANNEAU_CODES",floatval($valeur));				//   rapport entre la taille de la section définie dans la page web et la dimension du panneau code svg 
	define("LARGEUR_FENETRE","860");					//   largeur de la fenêtre visible (plage_jeu), en px, !! dans le css + marge 
	define("HAUTEUR_FENETRE","600");					//   hauteur de la fenêtre visible (plage_jeu), en px, !! dans le css
	define("DIM_CASE",100);			//   dimension du côté d'une case, en px (les cases sont carrées)
	define("DIR_MAP_SVG","images/cartes/cases-svg/"); 					//    nom du répertoire contenant les fichiers svg avec les cases du jeu (3 au MAX)
	define("LE_X0",10);						//  indice X de la première case du jeu (première connexion du joueur)
	define("LE_Y0",8);						//  indice Y de la première case du jeu (première connexion du joueur)
	define("SVG_CX",67);					//   nombre de cases sur x par svg de case
	define("SVG_CY",47);					//   nombre de cases sur x par svg de case
	define("REC_CX",0);					//   recouvrement de cases sur x pour svg de panneau, car le nombre de case d'un panneau n'est pas nécessairement divisible par le nombre de panneau sur x (2 en principe)
	define("REC_CY",0);					//   recouvrement de cases sur y pour svg de panneau, car le nombre de case d'un panneau n'est pas nécessairement divisible par le nombre de panneau sur y (2 en principe)
		
	//    valeurs de référence
	define("MAX_DJUNS","1");				//  Maximum 1 D'Jun par joueur
	define("VITESSE_BASE",6);					//  vitesse d'une unité de base (paysan), en kms/h
	define("RATIO_BOIS_CYNIAM",3);					//   ratio de valeur cyniam/bois (nombre d'unités de bois pour 1 de cyniam)
	define("RATIO_METAL_CYNIAM",2);					//   ratio de valeur cyniam/métal (nombre d'unités de métal pour 1 de cyniam)
	define("RATIO_CYNIAM_MANA",1);					//   ratio de valeur mana/cyniam (nombre d'unités de cyniam pour 1 de mana)
	define("RAYON_EXTENSION",5);				//  extension maximale du rayon de la zone de colonisation (en cases), à chaque nouveau village

	
	//		Au départ
	define("POINTS_VIE_DEPART",10000);					//   points de vie de départ
	define("POINTS_BOIS_DEPART",3000);					//   points de bois au départ
	define("POINTS_METAL_DEPART",2000);					//   points de métal au départ
	define("POINTS_CYNIAM_DEPART",1000);					//   points de cyniam au départ

}// - fin du if
?>
