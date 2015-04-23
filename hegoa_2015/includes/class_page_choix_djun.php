<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageChoixDjun extends Page
{
    private $account_nickname;

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_djun","Choix du D'jun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_choix_djun.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_choix_djun.php");

      // - on ajoute les menus utiles
      //   pas de menu
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      $account_id           = $_SESSION['account_id'];

      $avatar_name          = "";
      $avatar_image         = "";

      if( empty($_SESSION['avatar_djun_id']) )
      {
        $_SESSION['avatar_djun_id']     = 1;
        $_SESSION['avatar_djun_id_max'] = 2;
        $_SESSION['avatar_image']       = "images/djuns/djun1.png";
      }

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>