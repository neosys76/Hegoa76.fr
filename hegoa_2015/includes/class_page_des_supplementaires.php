<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageDesSupplementaires extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "des_supplementaires","Dés supplémentaires");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_des_supplementaires.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_des_supplementaires.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("accueil","Accueil");
    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();

    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
		$traductions["des-supplementaires"] = array(
    		"fr"=>"dés supplémentaires",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["presentation-1"] = array(
    		"fr"=>"L&#39;achat de dés supplémentaires vous permet d&#39;obtenir ou de choisir la meilleure solution parmi trois tirages",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>