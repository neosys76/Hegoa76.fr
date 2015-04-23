<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageCompte extends Page
{
    private $account_nickname;

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte", "Mon Profil");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_compte.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_compte.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      $account_id           = $_SESSION['account_id'];
      $account_lastname     = "";
      $account_firstname    = "";
      $account_mail         = "";
      $account_password     = "";
      $account_jour         = "";
      $account_mois         = "";
      $account_annee        = "";
      $account_ville        = "";
      $account_pays         = "";
      $account_presentation = "";

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

          $account_annee        = substr($account_anniv,0,4);
          $account_mois         = substr($account_anniv,5,2);
          $account_jour         = substr($account_anniv,8,2);

        }
      }

      // - On stocke dans la session
      $_SESSION['account_lastname']       = $account_lastname;
      $_SESSION['account_firstname']      = $account_firstname;
      $_SESSION['account_mail']           = $account_mail;
      $_SESSION['account_password']       = $account_password;
      $_SESSION['account_jour']           = $account_jour;
      $_SESSION['account_mois']           = $account_mois;
      $_SESSION['account_annee']          = $account_annee;
      $_SESSION['account_ville']          = $account_ville;
      $_SESSION['account_pays']           = $account_pays;
      $_SESSION['$account_presentation']  = $account_presentation;

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>