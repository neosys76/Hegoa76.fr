<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageMediaFond extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "media_fond","Media - Fonds d'écran");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      //$this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_media_fond.css");
      $this->AjouterCSS("lightbox.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_media_fond.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    


}// - Fin de la classe

?>