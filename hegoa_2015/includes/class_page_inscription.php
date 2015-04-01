<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                              // - On inclut la class Page


class PageInscription extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "inscription" );
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_inscription.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_inscription.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("accueil","Accueil");
    }

    // - Affichage de la page
    public function Afficher()
    {

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>