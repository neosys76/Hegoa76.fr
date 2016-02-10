<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageComptePremium extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte_premium","Compte Premium");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_compte.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_compte_premium.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("accueil","Accueil");
    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();

    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
		$traductions["compte-premium"] = array(
    		"fr"=>"compte Premium",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["presentation-1"] = array(
    		"fr"=>"Le compte Premium, c&#39;est la possibilité d&#39;augmenter toutes les caractéristiques de vos villages et de vos actions ....",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    	}    

}// - Fin de la classe

?>