<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

if ( ! defined ("CONSTANTES.INC") )
{
	// - Déclaration de la constante 
	define ("CONSTANTES.INC", "1");
	
	
	// - Pour la base de données

	define("HOSTNAME",  "localhost"); // - ou localhost
	define("BASE",      "hegoa");
	define("LOGIN",     "hegoa");
	define("PASSWORD",	"Subsystem0");
	define("SALT","?5fvyk+1DV75fT?@4Wp#KrVa");
	
	//  -  Pour les données relatives au jeu
	//		La carte
	define("LARGEUR_CARTE","4350");					//   largeur de la carte totale du monde, en px
	define("HAUTEUR_CARTE","3000");					//   hauteur de la carte totale du monde, en px
	define("LARGEUR_PANNEAU","1450");					//   largeur d'un panneau, en px
	define("HAUTEUR_PANNEAU","1000");					//   hauteur d'un panneau, en px
	define("LARGEUR_PANNEAU_CODES","1088");					//   largeur d'un panneau pour les codes couleurs, en px
	define("HAUTEUR_PANNEAU_CODES","750");					//   hauteur d'un panneau pour les codes souleurs, en px
	define("LARGEUR_FENETRE","860");					//   largeur de la fenêtre visible (plage_jeu), en px, !! dans le css
	define("HAUTEUR_FENETRE","600");					//   hauteur de la fenêtre visible (plage_jeu), en px, !! dans le css
	define("RATIO_AFFICH_PANNEAU_CODES",0.9);				//   rapport entre la taille de la section définie dans la page web et la dimension du panneau code svg 
	define("RATIO_AFFICH_PANNEAU",0.9);							//   rapport entre la taille de la section définie dans la page web et la dimension du panneau image jpg
	define("DIM_CASE",50);			//   dimension du côté d'une case, en px (les cases sont carrées)
	
	//    valeurs de référence
	define("MAX_DJUNS","1");				//  Maximum 1 D'Jun par joueur
	define("VITESSE_BASE",6);					//  vitesse d'une unité de base (paysan), en kms/h
	define("RATIO_BOIS_CYNIAM",3);					//   ratio de valeur cyniam/bois (nombre d'unités de bois pour 1 de cyniam)
	define("RATIO_METAL_CYNIAM",2);					//   ratio de valeur cyniam/métal (nombre d'unités de métal pour 1 de cyniam)
	define("RATIO_CYNIAM_MANA",1);					//   ratio de valeur mana/cyniam (nombre d'unités de cyniam pour 1 de mana)

	
	//		Au départ
	define("POINTS_VIE_DEPART",10000);					//   points de vie de départ
	define("POINTS_BOIS_DEPART",3000);					//   points de bois au départ
	define("POINTS_METAL_DEPART",2000);					//   points de métal au départ
	define("POINTS_CYNIAM_DEPART",1000);					//   points de cyniam au départ

}// - fin du if
?>
