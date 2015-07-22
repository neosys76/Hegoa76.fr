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

      $this->AjouterCSS("page_tdb.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_tdb.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
    	// si on n'est pas connecté, on ne peut pas afficher cette page
    	if(isset($_SESSION['account_id'])){
    		
      parent::Afficher();
     }
      else {
			header("Location: ?page=connexion");
      }

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>