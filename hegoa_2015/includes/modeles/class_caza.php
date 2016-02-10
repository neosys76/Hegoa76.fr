<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);
if($connexion_incluse==0){
require "class_connexion.php";                                              // - On inclut la classe Connexion
$connexion_incluse=1;
}

class Caza
{	
	public $id;
	public $coord;
	public $occupee_par;
	public $occupant_id;
	public $nom_terrain;
	public $panneau;
	public $svg;
	
    function __construct($row)
    {
    	if(!empty($row)){
    		if(is_array($row)){
      			//  on a transmis des données venant soit de la BDD, soit d'un choix; la variable row est un tableau contenant les champ de la case
      			//    si on transmet des données, il est possible que le champ id ne soit pas défini (en table, c'est une séquence auto-incrémentale)
      			if(isset($row['id'])&&!empty($row['id'])){$this->id = $row['id'];}
      			$this->coord = $row['coord'];
      			$this->occupee_par = $row['occupee_par'];
      			$this->occupant_id = $row['occupant_id'];    
      			$this->nom_terrain = $row['nom_terrain'];	
      			$this->panneau = $row['panneau'];
      			$this->svg = $row['svg'];
      		}
      		else {
				// - on  établit une connexion car on n'a pas transmis de données venant déjà de la BDD; la variable row doit être le point coordonnée
      			$connexion = new Connexion();
				$sql  = "SELECT * FROM \"libertribes\".\"CASE\" WHERE coord ~= '".$row."' ";	
      			$result = $connexion->Requete( $sql );
      			if (isset($result)&&!empty( $result ))
      			{
      				while ($row = pg_fetch_array($result)) 
      				{
      					$this->id = $row['id'];
      					$this->coord = $row['coord'];
      					$this->occupee_par = $row['occupee_par'];
      					$this->occupant_id = $row['occupant_id'];    
      					$this->nom_terrain = $row['nom_terrain'];	
      					$this->panneau = $row['panneau'];
      					$this->svg = $row['svg'];
      				}
      			}
      		}
      }	
     }
     
     public function save(){
     	$connexion = new Connexion();
     	$sql  = "INSERT INTO \"libertribes\".\"CASE\" (coord,occupee_par, occupant_id,nom_terrain,panneau,svg)  VALUES ('".$this->coord."', '".$this->occupee_par."','".$this->occupant_id."', '".$this->nom_terrain."', '".$this->panneau."', '".$this->svg."' )";     
     	return ($connexion->Requete($sql));
     }
     
     public function update(){
     	$connexion = new Connexion();
     	$sql = "";
     	$sql  = "UPDATE \"libertribes\".\"CASE\" set coord = '".$this->coord."', occupee_par = '".$this->occupee_par."', occupant_id = '".$this->occupant_id."', nom_terrain = '".$this->nom_terrain."', panneau = '".$this->panneau."', svg = '".$this->svg."' ";    
      $sql .= "WHERE id = '".$this->id."'";
     	return ($connexion->Requete($sql));
     }
     
 }
 ?>