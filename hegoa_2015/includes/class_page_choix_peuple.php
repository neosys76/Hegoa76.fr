<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageChoixPeuple extends Page
{
    private $account_nickname;

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_peuple","Choix du peuple");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_choix_peuple.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_choix_peuple.php");

      // - on ajoute les menus utiles
      //  pas de menu
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On récupère l'info de l'avatar_name
      if( ! empty($_GET['avatar']) )
      {
        $_SESSION['avatar_name'] = $_GET['avatar'];
      }

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>