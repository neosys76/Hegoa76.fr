<?php
// ======================================================================
// Auteur : Dominique DEHARENG
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageChargeNouveauPanneau extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();
 		//  les traductions spécifiques
       $this->traductions = $this->getTraductions();   
      
		if(isset($_GET['absx'])&&isset($_GET['ordy'])){
			//   On met les coordonnées transmises par GET dans la BDD et dans l'avatar sauvé en SESSION
			$point = "(".$_GET['absx'].",".$_GET['ordy'].")";
   		   $sql  = "UPDATE \"libertribes\".\"AVATAR\" set derniere_position = '".$point."' ";
   		   $sql .= "WHERE avatar_id = '".$_SESSION['djun_choisi']->id."'";
   		   $_SESSION['djun_choisi']->derniere_position = $point;
   		   if(!$this->db_connexion->Requete( $sql )){
   		   		$this->message = "<span style='color:#f00;'>!!! ".$this->traductions["cette-position-pas-sauvegardee"][$_SESSION['lang']]."</span>";
   		   }		
   		}
    }

    // - Affichage de la page
    public function Afficher()
    {
    	if(isset($_GET['absx'])&&isset($_GET['ordy'])){
    		header("Location:index.php?page=jeu");
    		exit;
    	}
    	else {
    		header("Location:index.php?page=jeu&rafraichi=oui");
    		exit;
    	}
    	
    }// - Fin de la fonction Afficher
    
   	public function getTraductions(){
    	$traductions["cette-position-pas-sauvegardee"] = array(
    		"fr"=>"Cette position n&#39;a pas pu être sauvegardée comme votre &quot;dernière position &quot; en base de données",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>