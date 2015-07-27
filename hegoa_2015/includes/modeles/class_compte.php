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

class Compte
{	
	public $id;
	public $nom;
	public $prenom;
	public $password;
	public $email;
	public $date_inscription;
	public $confirmation;
	public $ville;
	public $pays;
	public $date_anniv;
	public $presentation;
	public $statut;
	public $type_compte;
	
    function __construct($row)
    {
    	if(!is_array($row)){
      		// - on  établit une connexion car on n'a pas transmis de données venant déjà de la BDD; la variable row est soit l'ID du compte du joueur soit l'email (qui doit être unique)
      		$connexion = new Connexion();
      		// premier test, sur l'ID
			$sql  = "SELECT * FROM \"libertribes\".\"COMPTE\" WHERE compte_id = '".$row."'";
      		$result = $connexion->Requete( $sql );
      		if (isset($result)&&!empty( $result ))
      		{
      			$num_rows = pg_num_rows($result);
      			while ($row = pg_fetch_array($result)) 
      			{
					$this->id = $row['compte_id'];
      				$this->nom = $row['nom'];
      				$this->prenom = $row['prenom'];
      				$this->password = $row['password'];
      				$this->email = $row['email'];
      				$this->date_inscription = $row['date_inscription'];
      				$this->confirmation = $row['confirmation'];
     				$this->ville = $row['ville'];
      				$this->pays = $row['pays'];
      				$this->date_anniv = $row['date_anniv'];
      				$this->presentation = $row['presentation'];
      				$this->statut = $row['statut'];
      				$this->type_compte = $row['type_compte'];
      			}
      		}
      		
      		if(!isset($num_rows)||(!$num_rows)||$num_rows==0){
      			// deuxième test, sur l'email
				$sql  = "SELECT * FROM \"libertribes\".\"COMPTE\" WHERE email = '".$row."'";
      			$result = $connexion->Requete( $sql );
      			if (isset($result)&&!empty( $result ))
      			{
      				while ($row = pg_fetch_array($result)) 
      				{
      					$this->id = $row['compte_id'];
      					$this->nom = $row['nom'];
      					$this->prenom = $row['prenom'];
      					$this->password = $row['password'];
      					$this->email = $row['email'];
      					$this->date_inscription = $row['date_inscription'];
      					$this->confirmation = $row['confirmation'];
     					$this->ville = $row['ville'];
      					$this->pays = $row['pays'];
      					$this->date_anniv = $row['date_anniv'];
      					$this->presentation = $row['presentation'];
      					$this->statut = $row['statut'];
      					$this->type_compte = $row['type_compte'];
      				}
      			}    
      		}  		
      	}
      	else {
      		//  on a transmis des données venant déjà de la BDD; la variable row est un tableau contenant les champ de l'avatar
      		$this->id = $row['compte_id'];
      		$this->nom = $row['nom'];
      		$this->prenom = $row['prenom'];
      		$this->password = $row['password'];
      		$this->email = $row['email'];
      		$this->date_inscription = $row['date_inscription'];
      		$this->confirmation = $row['confirmation'];
     		$this->ville = $row['ville'];
      		$this->pays = $row['pays'];
      		$this->date_anniv = $row['date_anniv'];
      		$this->presentation = $row['presentation'];
      		$this->statut = $row['statut'];
      		$this->type_compte = $row['type_compte']; 			
      	}
     
     }
  
 }