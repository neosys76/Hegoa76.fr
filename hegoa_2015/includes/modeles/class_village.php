<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================
//
//     CLASSE APPELEE PAR LA CLASSE AVATAR DANS LA PAGE DE BASE 

error_reporting(E_ALL);

if($connexion_incluse == 0){
require    "class_connexion.php";                                                       // - On inclut la class Connexion
$connexion_incluse = 1;
}
if($avatar_inclus == 0){
require_once   "class_avatar.php";                                                       // - On inclut la class Avatar
$avatar_inclus = 1;
}
if($race_incluse == 0){
require  "class_race.php";                                                       // - On inclut la class Race
$race_incluse = 1;
}

class Village
{	
	public $id;
	public $nom;
	public $taille;
	public $defense;
	public $fer;
	public $bois;
	public $cyniam;
	public $case_village;
	public $avatar_id;
	public $natalite;
	public $valeur_mana;
	public $paysans;
	public $guerriers_cac;
	public $guerriers_dist;
	public $mages;
	public $chariots_guerre;
	public $chariots_transport;
	public $invocations;
	public $date_creation;
	public $lien_regles;

    function __construct($row)
    {
    	$this->lien_regles = "http://wiki.hegoa.eu/Village";
    	if(!is_array($row)){
      		// - on  établit une connexion car on n'a pas transmis de données venant déjà de la BDD; la variable row est l'ID du village ou son nom
      		//  premier test, sur l'ID
      		$connexion = new Connexion();
			$sql  = "SELECT * FROM \"libertribes\".\"VILLAGE\" WHERE village_id = ".$row;
      		$result = $connexion->Requete( $sql );
      		if (isset($result)&&!empty( $result))
      		{
      			$num_rows = pg_num_rows($result);
      			while ($row = pg_fetch_array($result)) {
      				$this->id = $row['village_id'];
      				$this->nom = $row['nom_village'];
      				$this->taille = $row['taille_village'];
      				$this->defense = $row['niveau_defense'];
      				$this->fer = $row['niveau_fer'];
      				$this->bois = $row['niveau_bois'];
      				$this->cyniam = $row['niveau_cyniam'];
      				$this->case_village = $row['case'];
     				$this->avatar_id = $row['avatar_iden'];   
     				$this->valeur_mana = $row['valeur_mana'];
     				$this->paysans = $row['paysans'];
     				$this->guerriers_cac = $row['guerriers_cac'];
     				$this->guerriers_dist = $row['guerriers_dist'];
     				$this->mages = $row['mages'];
     				$this->chariots_guerre = $row['chariots_guerre'];
     				$this->chariots_transport = $row['chariots_transport'];
     				$this->invocations = $row['invocations'];
      				$this->date_creation = $row['date_creation'];
      			}
      		}
      		
      		if(!isset($num_rows)||(!$num_rows)||$num_rows==0){
      			// deuxième test, sur le nom
      			$sql  = "SELECT * FROM \"libertribes\".\"VILLAGE\" WHERE nom_village = '".$row;"' and WHERE avatar_iden='".$_SESSION['djun_choisi']->id."'";
      			$result = $connexion->Requete( $sql );
      			if (isset($result)&&!empty( $result))
      			{
      				$num_rows = pg_num_rows($result);
      				while ($row = pg_fetch_array($result)) {
      					$this->id = $row['village_id'];
      					$this->nom = $row['nom_village'];
      					$this->taille = $row['taille_village'];
      					$this->defense = $row['niveau_defense'];
      					$this->fer = $row['niveau_fer'];
      					$this->bois = $row['niveau_bois'];
      					$this->cyniam = $row['niveau_cyniam'];
      					$this->case_village = $row['case'];
     					$this->avatar_id = $row['avatar_iden'];   
     					$this->valeur_mana = $row['valeur_mana'];
     					$this->paysans = $row['paysans'];
     					$this->guerriers_cac = $row['guerriers_cac'];
     					$this->guerriers_dist = $row['guerriers_dist'];
     					$this->mages = $row['mages'];
     					$this->chariots_guerre = $row['chariots_guerre'];
     					$this->chariots_transport = $row['chariots_transport'];
     					$this->invocations = $row['invocations'];
      					$this->date_creation = $row['date_creation'];
      				}
      			}
      		}
      		      		
      	}
      	else {
      		//  on a transmis des données venant déjà de la BDD; la variable row est un tableau contenant les champ du village
      				$this->id = $row['village_id'];
      				$this->nom = $row['nom_village'];
      				$this->taille = $row['taille_village'];
      				$this->defense = $row['niveau_defense'];
      				$this->fer = $row['niveau_fer'];
      				$this->bois = $row['niveau_bois'];
      				$this->cyniam = $row['niveau_cyniam'];
      				$this->case_village = $row['case'];
     				$this->avatar_id = $row['avatar_iden'];
     				$this->valeur_mana = $row['valeur_mana'];
     				$this->paysans = $row['paysans'];
     				$this->guerriers_cac = $row['guerriers_cac'];
     				$this->guerriers_dist = $row['guerriers_dist'];
     				$this->mages = $row['mages'];
     				$this->chariots_guerre = $row['chariots_guerre'];
     				$this->chariots_transport = $row['chariots_transport'];
     				$this->invocations = $row['invocations'];
      				$this->date_creation = $row['date_creation'];
      	}
      	//  sont calcules sur base de l'avatar
      	$this->obtenirTauxNatalite($this->avatar_id);
     }
 
 	private function obtenirTauxNatalite($avatar_id){
 		$connexion = new Connexion();
 		$sql  = "SELECT race FROM \"libertribes\".\"AVATAR\" WHERE avatar_id = ".$avatar_id;
      		$result = $connexion->Requete( $sql );
      		if (isset($result)&&!empty( $result))
      		{
      			$row = pg_fetch_row($result);
      			$larace = $row[0];
      		}   
 		
 		//  les races sont déjà mises en SESSION, dans $_SESSION['races_possibles']
 		foreach($_SESSION['races_possibles'] as $race){
 			if($larace==$race->nom){$this->natalite = $race->taux_natalite;break;}
 		}
 	}
 	
     public function calculValeurMana(){
     	$val_mana = 0;
     	return $val_mana;
     }
     
     public function calculPopulation(){
     	$population = 0;
     	return $population;
     }
          
 }