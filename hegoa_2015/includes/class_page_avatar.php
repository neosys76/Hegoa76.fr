<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageAvatar extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "avatar", "Mon histoire de D'jun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu(0);
      parent::SetAffichageFooter( 0 );

      	//  les traductions spécifiques
      $this->traductions = $this->getTraductions();
      
      $this->AjouterCSS("page_avatar.css");

      $this->AjouterContenu("contenu", "contenus/page_avatar.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){

      		parent::Afficher();
      		
		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher
    
    
    public function getTraductions(){
    	$traductions["index_agressivite"] = array(
    		"fr"=>"Index Agressivité",
    		"en"=>"Aggressiveness Index",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["index_efficacite"] = array(
    		"fr"=>"Index Efficacité",
    		"en"=>"Efficiency Index",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["index_escroquerie"] = array(
    		"fr"=>"Index Escroquerie",
    		"en"=>"Fraud Index",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["index_commerce"] = array(
    		"fr"=>"Index Commerce",
    		"en"=>"Commercial Index",
    		"es"=>"",
    		"de"=>""
    	);

    	$traductions["mon_histoire"] = array(
    		"fr"=>"Mon histoire",
    		"en"=>"My history",
    		"es"=>"",
    		"de"=>""
    	);

    	return $traductions;
    }
    

}// - Fin de la classe

?>