<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page


class PageTdb extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "tdb","Tableau de bord");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_tdb.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_tdb.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
    	// si on n'est pas connecté, on ne peut pas afficher cette page
    	if(isset($_SESSION['compte'])){

      parent::Afficher();
     }
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}

    }// - Fin de la fonction Afficher
    
    
	public function getTraductions(){
		$traductions["tableau-de-bord"] = array(
    		"fr"=>"tableau de bord",
    		"en"=>"dashboard",
    		"es"=>"salpicadero",
    		"de"=>"Armaturenbrett"
    	);
    	$traductions["vers-le-compte"] = array(
    		"fr"=>"Vers le compte",
    		"en"=>"Back to the account",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["cliquez-pour-jouer"] = array(
    		"fr"=>"Cliquez pour jouer",
    		"en"=>"Click to play",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["choix-du-djun"] = array(
    		"fr"=>"Choix du D&#39;jun",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["achat-de-des"] = array(
    		"fr"=>"Achat de dés",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["compte-premium"] = array(
    		"fr"=>"Compte Premium",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["compte-gold"] = array(
    		"fr"=>"Compte Gold",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-1"] = array(
    		"fr"=>"La mise à jour du choix du peuple n&#39;a pas pu avoir lieu dans la BDD",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-2"] = array(
    		"fr"=>"Pas encore d&#39;avatar défini? ",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>