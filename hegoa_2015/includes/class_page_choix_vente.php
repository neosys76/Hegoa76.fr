<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageChoixVente extends Page
{
    private $account_nickname;

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_vente");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_choix_vente.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_choix_vente.php");
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connescte à la base de données
      //parent::ConnecterBD();

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>