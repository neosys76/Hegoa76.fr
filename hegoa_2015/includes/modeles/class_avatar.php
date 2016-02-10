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
if($village_inclus==0){
require   "class_village.php";                                                       // - On inclut la class Village
$village_inclus=1;
}
if($caza_incluse==0){
require   "class_caza.php";                                                       // - On inclut la class Caza
$caza_incluse=1;
}

class Avatar
{	
	public $id;
	public $nom;
	public $date_creation;
	public $agressivite;
	public $efficacite;
	public $commerce;
	public $escroquerie;
	public $compte_id;
	public $race;
	public $niveau;
	public $num_image;
	public $derniere_position;
	public $derniere_connexion;
	public $histoire;
	//   les 4 propriétés suivantes ne proviennent pas de la table AVATAR mais sont mises à jour à chaque connexion, dans la page connexion
	public $bois;
	public $fer;
	public $cyniam;
	public $mana_villages;
	public $mana_total;
	public $lien_regles;
	public $villages;								//   tous les villages de l'avatar
	public $mes_cases;								//   toutes les cases occupées par l'avatar, y compris les cases villages
	
    function __construct($row)
    {
    	$this->lien_regles = "http://wiki.hegoa.eu/Personnage";
    	if(!is_array($row)){
      		// - on  établit une connexion car on n'a pas transmis de données venant déjà de la BDD; la variable row est soit l'ID de l'avatar soit le nom (qui doit être unique)
      		$connexion = new Connexion();
      		// premier test, sur l'ID
			$sql  = "SELECT * FROM \"libertribes\".\"AVATAR\" WHERE avatar_id = '".$row."'";
      		$result = $connexion->Requete( $sql );
      		if (isset($result)&&!empty( $result ))
      		{
      			$num_rows = pg_num_rows($result);
      			while ($row = pg_fetch_array($result)) 
      			{
					$this->id = $row['avatar_id'];
      				$this->nom = $row['avatar_nom'];
      				$this->date_creation = $row['date_creation'];
      				$this->agressivite = $row['niveau_agressivite'];
     				$this->efficacite = $row['niveau_efficacite'];
      				$this->commerce = $row['niveau_commerce'];
      				$this->escroquerie = $row['niveau_escroquerie'];
      				$this->compte_id = $row['compte_id'];
      				$this->race = $row['race'];
      				$this->niveau = $row['niveau'];
      				$this->num_image = $row['numero_image'];
      				$this->derniere_position = $row['derniere_position'];
      				$this->derniere_connexion = $row['derniere_connexion'];
      				$this->histoire = $row['histoire'];
      			}
      		}
      		
      		if(!isset($num_rows)||(!$num_rows)||$num_rows==0){
      			// deuxième test, sur le nom
				$sql  = "SELECT * FROM \"libertribes\".\"AVATAR\" WHERE avatar_nom = '".$row."'";
      			$result = $connexion->Requete( $sql );
      			if (isset($result)&&!empty( $result ))
      			{
      				while ($row = pg_fetch_array($result)) 
      				{
      					$this->id = $row['avatar_id'];
      					$this->nom = $row['avatar_nom'];
      					$this->date_creation = $row['date_creation'];
      					$this->agressivite = $row['niveau_agressivite'];
     					$this->efficacite = $row['niveau_efficacite'];
      					$this->commerce = $row['niveau_commerce'];
      					$this->escroquerie = $row['niveau_escroquerie'];
      					$this->compte_id = $row['compte_id'];
      					$this->race = $row['race'];
      					$this->niveau = $row['niveau'];
      					$this->num_image = $row['numero_image'];
      					$this->derniere_position = $row['derniere_position'];
      					$this->derniere_connexion = $row['derniere_connexion'];
      					$this->histoire = $row['histoire'];
      				}
      			}    
      		}  		
      	}
      	else {
      		//  on a transmis des données venant déjà de la BDD; la variable row est un tableau contenant les champ de l'avatar
      		$this->id = $row['avatar_id'];
      		$this->nom = $row['avatar_nom'];
      		$this->date_creation = $row['date_creation'];
      		$this->agressivite = $row['niveau_agressivite'];
     		$this->efficacite = $row['niveau_efficacite'];
      		$this->commerce = $row['niveau_commerce'];
      		$this->escroquerie = $row['niveau_escroquerie'];
      		$this->compte_id = $row['compte_id'];
      		$this->race = $row['race'];
      		$this->niveau = $row['niveau'];
      		$this->num_image = $row['numero_image'];
      		$this->derniere_position = $row['derniere_position'];
      		$this->derniere_connexion = $row['derniere_connexion'];    		
      		$this->histoire = $row['histoire'];	
      	}
      	
      	//  on charge tous les villages de l'avatar, ainsi que toutes les autres cases occupées

     	if(!isset($connexion)){$connexion = new Connexion();}
     	$villages = array();
     	$i=0;
		$sql  = "SELECT * FROM \"libertribes\".\"VILLAGE\" WHERE avatar_iden = '".$this->id."' ORDER BY date_creation DESC";
		
      	$result = $connexion->Requete( $sql );
      	if (isset($result)&&!empty( $result ))
      	{
      		while ($row = pg_fetch_array($result)) 
      		{
      			$villages[$i] = new Village($row['village_id']);
      			$i++;
      		}
      	}
      	
      	$mes_cases = array();
     	$i=0;
		$sql  = "SELECT * FROM \"libertribes\".\"CASE\" WHERE occupant_id = '".$this->id."'";
		
      	$result = $connexion->Requete( $sql );
      	if (isset($result)&&!empty( $result ))
      	{
      		while ($row = pg_fetch_array($result)) 
      		{
      			$mes_cases[$i] = new Caza($row);
      			$i++;
      		}
      	}
      	
     $this->villages = $villages;
     $this->mes_cases = $mes_cases;
     $this->calculProductionVillages();
     $this->calculManaTotal();
     
     }
     
     public function calculProductionVillages(){
     	$bois = 0;
     	$fer = 0;
     	$mana = 0;
     	$cyniam = 0;
     	if(!empty($this->villages)&&count($this->villages)>0){
     		//  des villages existent déjà pour cet avatar
			foreach($this->villages as $village){
				$bois += $village->bois;
				$fer += $village->fer;
				$cyniam += $village->cyniam;
				$mana += $village->valeur_mana;
			}
     	}
     	$this->bois = $bois;
		$this->fer = $fer;
		$this->cyniam = $cyniam;
		$this->mana_villages = $mana;
     }
     
     public function calculManaTotal(){
     	$mana = 0;
     	//   calcul mana total ????
     	//  .......
     	
     	$this->mana_total = $mana;
     }
  
 }