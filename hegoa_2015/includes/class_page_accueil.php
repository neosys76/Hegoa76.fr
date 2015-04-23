<?php
// ======================================================================
// Auteurs : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page, classe de base

class PageAccueil extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "accueil","Accueil");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_accueil.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_accueil.php");

      // - on ajoute les menus utiles
      //  		 Pas de menu
    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>