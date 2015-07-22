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
	define("MAX_DJUNS","1");				//  Maximum 1 D'Jun par joueur
	define("LARGEUR_CARTE","4350");					//   largeur de la carte totale du monde, en px
	define("HAUTEUR_CARTE","3000");					//   hauteur de la carte totale du monde, en px
	define("LARGEUR_PANNEAU","1450");					//   largeur d'un panneau, en px
	define("HAUTEUR_PANNEAU","1000");					//   hauteur d'un panneau, en px
	

}// - fin du if
?>
