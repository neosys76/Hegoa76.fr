<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageMessagerieEcrire extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "messagerie_ecrire","Messagerie - écriture");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_messagerie_ecrire.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_messagerie_ecrire.php");

      // - on ajoute les menus utiles
      $this->AjouterMenu("messagerie","Messagerie");
    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();

      // - gestion spécifique de la page

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>