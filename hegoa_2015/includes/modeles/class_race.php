<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

class Race
{	
	public $nom;
	public $taux_natalite;
	public $vitalite_unite;
	public $batiments;
	public $sorts;
	public $lien_regles;
	
    function __construct($row)
    {
    	$this->lien_regles = "http://wiki.hegoa.eu/Races";
      	//  on a transmis des données venant déjà de la BDD; la variable row est un tableau contenant les champ de la race
      	$this->nom = $row['race_nom'];
      	$this->taux_natalite = $row['taux_natalite'];
      	$this->vitalite_unite = $row['vitalite_unite'];
      	$this->batiments = $row['batiments'];
      	$this->sorts = $row['sorts'];	
     }
 }