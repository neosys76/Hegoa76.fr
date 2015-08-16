<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);
if($connexion_incluse==0){
require   "class_connexion.php";                                                       // - On inclut la class Connexion
$connexion_incluse=1;
}

class Deplacement
{	
	public $id;
	public $case_depart;
	public $case_arrivee;
	public $duree;
	public $cout;
	
    function __construct($row)
    {
    	if(!is_array($row)){
      		// - on  établit une connexion car on n'a pas transmis de données venant déjà de la BDD; la variable row est l'ID du déplacement
      		$connexion = new Connexion();
      		// premier test, sur l'ID
			$sql  = "SELECT * FROM \"libertribes\".\"DEPLACEMENT\" WHERE deplacement_id = '".$row."'";
      		$result = $connexion->Requete( $sql );
      		if (isset($result)&&!empty( $result ))
      		{
      			while ($row = pg_fetch_array($result)) 
      			{
					$this->id = $row['deplacement_id'];
      				$this-> = $row[''];
      			}
      		}	
      	}
      	else {
      		//  on a transmis des données venant déjà de la BDD; la variable row est un tableau contenant les champ de l'avatar
      		$this->id = $row['deplacement_id'];
      		$this-> = $row[''];			
      	}
     
     }
  
 }