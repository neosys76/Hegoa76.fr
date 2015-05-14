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
      parent::SetAffichageMenu( 0 );
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
      if(!isset($_SESSION['avatar_djun_id_max'])||empty($_SESSION['avatar_djun_id_max'])){
      		include "constantes.inc.php";
      		$_SESSION['avatar_djun_id_max'] = MAX_DJUNS;
      	}
		
      $account_id           = $_SESSION['account_id'];

      $avatar_name          = "";
      $avatar_image         = "";


      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>