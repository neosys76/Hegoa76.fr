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
      parent::SetNomPage( "choix_djun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_choix_djun.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_choix_djun.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("accueil","Accueil");
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connescte à la base de données
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


/*
      // - On insère les données
      $sql  = "SELECT lastname, firstname, email, password, date_anniv, ville, pays, presentation FROM \"libertribes\".\"ACCOUNT\" WHERE account_id = $account_id";
      $result = parent::Requete( $sql );
      if ($result)
      {
        $row = pg_fetch_row($result);
        if ($row)
        {
          $account_lastname     = $row[0];
          $account_firstname    = $row[1];
          $account_mail         = $row[2];
          $account_password     = $row[3];
          $account_anniv        = $row[4];
          $account_ville        = $row[5];
          $account_pays         = $row[6];
          $account_presentation = $row[7];

          $account_jour         = substr($account_anniv,0,4);
          $account_mois         = substr($account_anniv,5,2);
          $account_annee        = substr($account_anniv,8,2);

        }
      }

      // - On stocke dans la session
      $_SESSION['avatar_name']            = $avatar_name;
      $_SESSION['avatar_image']           = $avatar_image;
*/
      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>