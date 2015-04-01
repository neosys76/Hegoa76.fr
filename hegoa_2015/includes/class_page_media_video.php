<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageMediaVideo extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "media_video");
      //parent::SetFonctionBodyOnLoad("javascript:preloadThumbnails()");
      parent::SetAffichageHeader( -1 );
      //parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_media_video.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_media_video.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("inscription","Inscription");
      //$this->AjouterMenu("connexion","Connexion");
    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>