<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageCompteSuppression extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte_suppression","Suppression de compte");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_compte.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_compte_suppression.php");

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

      // - gestion spécifique de la page

    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
		$traductions["erreur-suppression-compte-re-essai"] = array(
    		"fr"=>"Votre compte n&#39;a pas pu être supprimé correctement. Réessayez.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["suppression-compte"] = array(
    		"fr"=>"Suppression du compte",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["texte-avertissement"] = array(
    		"fr"=>"vous êtes sur le point de supprimer votre compte !!<br /><br />Etes-vous sûr de vouloir le supprimer ?<br /><br />Cette opération est irréversible !<br />Vous perdrez tous vos D&#39;juns créés.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	
    	return $traductions;
    }   

}// - Fin de la classe

?>