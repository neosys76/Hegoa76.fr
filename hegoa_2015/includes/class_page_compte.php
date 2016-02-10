<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageCompte extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte", "Mon Profil");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu(0);
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_compte.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_compte.php");

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
		$traductions["data-non-mises-en-bdd-re-essai"] = array(
    		"fr"=>"Vos données n&#39;ont pas pu être insérées dans la base de données. Réessayez",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["mise-a-jour-compte"] = array(
    		"fr"=>"Mettre le compte à jour",
    		"en"=>"Update the account",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["suppression-compte"] = array(
    		"fr"=>"Supprimer le compte",
    		"en"=>"Remove the account",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["mon-compte-gestion"] = array(
    		"fr"=>"Mon compte: gestion",
    		"en"=>"My account: management",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	
    	return $traductions;
    }    
    
    

}// - Fin de la classe

?>