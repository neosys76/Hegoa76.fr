<?php
// ======================================================================
// Auteur : Dominique DEHARENG
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page


class PageUpdateCase extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "updae-case","Mise à jour case");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      /*  Les traductions   */  
		//  les traductions spécifiques
       $this->traductions = $this->getTraductions();
		//  On récupère les traductions définies
		 $les_traductions = $this->traductions;
		
      $this->AjouterCSS("page_jeu.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_jeu.php");

      // - on ajoute les menus utiles
		//   On met les coordonnées transmises par GET dans la BDD et dans l'avatar sauvé en SESSION
		$point = "(".$_GET['absx'].",".$_GET['ordy'].")";
      $sql  = "UPDATE \"libertribes\".\"CASE\" set ";
      //   ....   à continuer

      if(!$this->db_connexion->Requete( $sql )){
      		$this->message = "<span style='color:#f00;'>!!! ".$this->traductions["cette-position-pas-sauvegardee"][$_SESSION['lang']]."</span>";
      }		
    }
    


   // - Affichage de la page
    public function Afficher()
    {
    	if(isset($_SESSION['compte'])){
    		


	      // - on ajoute le contenu du menu à gauche
			$this->AjouterContenu("contenu_menu", "contenus/page_jeu_menu.php");
      		parent::Afficher();
    	 }
		else {
			$this->message = "Erreur ...";
			header('Location: index.php?page=mise-a-jour-case');
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
    	$traductions["vous-avez-choisi-une-zone-de"] = array(
			"fr"=>"Vous avez choisi une zone de",
			"en"=>"",
			"es"=>"",
			"de"=>""
    );	
    
    	$traductions["rien-possible-dans-eau"] = array(
    		"fr"=>"Rien n&#39;est possible dans l&#39;eau",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["la-case-est-libre"] = array(
    		"fr"=>"La case est libre",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["coloniser"] = array(
    		"fr"=>"coloniser",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["retour-a-la-carte"] = array(
    		"fr"=>"Retour à la carte",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	$traductions["la-case-est-occupee-par-un"] = array(
    		"fr"=>"La case est occupée par un",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    		);
    	
    	
    
    return $traductions;
    }
}// - Fin de la classe

?>