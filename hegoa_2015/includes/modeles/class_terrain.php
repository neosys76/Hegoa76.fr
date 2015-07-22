<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

class Terrain
{	
	public $nom;
	public $taille_minimale;
	public $taille_maximale;
	public $taille_moyenne;
	public $defense_minimale;
	public $defense_maximale;
	public $defense_moyenne;
	public $couleur;
	public $lien_regles;
	
    function __construct($row)
    {
    	$this->lien_regles = "http://wiki.hegoa.eu/Terrain";
      	//  on a transmis des données venant déjà de la BDD; la variable row est un tableau contenant les champ du terrain
      	$this->nom = $row['nom'];
      	$this->taille_minimale = $row['taille_minimale'];
      	$this->taille_maximale = $row['taille_maximale'];
      	$this->taille_moyenne = $row['taille_moyenne'];    
      	$this->defense_minimale = $row['defense_minimale'];
      	$this->defense_maximale = $row['defense_maximale'];
      	$this->defense_moyenne = $row['defense_moyenne'];   
      	$this->couleur = $row['couleur']; 			
     }
 }