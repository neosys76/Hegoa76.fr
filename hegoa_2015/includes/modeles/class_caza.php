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
	
    function __construct($row)
    {
    	if(!empty($row)){
      		//  on a transmis des données venant soit de la BDD, soit d'un choix; la variable row est un tableau contenant les champ de la case
      		//    si on transmet des données, il est possible que le champ id ne soit pas défini (en table, c'est une séquence auto-incrémentale)
      		if(isset($row['id'])&&!empty($row['id'])){$this->id = $row['id'];}
      		$this->coord = $row['coord'];
      		$this->occupee_par = $row['occupee_par'];
      		$this->occupant_id = $row['occupant_id'];    
      		$this->nom_terrain = $row['nom_terrain'];	
      }		
     }
     
     public function save(){
     	$connexion = new Connexion();
     	$sql  = "INSERT INTO \"libertribes\".\"CASE\" (coord,occupee_par, occupant_id,nom_terrain)  VALUES ('".$this->coord."', '".$this->occupee_par."','".$this->occupant_id."', '".$this->nom_terrain."' )";     
     	return ($connexion->Requete($sql));
     }
     
     public function update(){
     	$connexion = new Connexion();
     	$sql = "";
     	$sql  = "UPDATE \"libertribes\".\"CASE\" set coord = '".$this->coord."', occupee_par = '".$this->occupee_par."', occupant_id = '".$this->occupant_id."', nom_terrain = '".$this->nom_terrain."' ";    
      $sql .= "WHERE id = '".$this->id."'";
     	return ($connexion->Requete($sql));
     }
     
 }
 ?>