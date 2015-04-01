<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageTdb extends Page
{
    private $account_nickname;

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "tdb");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_tdb.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_tdb.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("messagerie","Messagerie");
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - on vide les varaibles de session
      $_SESSION['avatar_name'] = "";
      $_SESSION['avatar_djun_id'] = "";

      // - On se connescte à la base de données
      parent::ConnecterBD();

      // - on récupère des infos de la session
      $account_id           = $_SESSION['account_id'];

      $_SESSION['tdb_djun_name'] = array();
      $_SESSION['tdb_djun_race'] = array();

      // - On récupère les données des djuns
      $sql  = "SELECT avatar_name, race_name FROM \"libertribes\".\"AVATAR\" WHERE account_id = $account_id";
      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les messages
          $_SESSION['tdb_djun_name'][$iCpt]    = $row[0];
          $_SESSION['tdb_djun_race'][$iCpt]    = $row[1];

          $iCpt++;
        }

        for( $i = $iCpt; $i < 4; $i++)
        {
          $_SESSION['tdb_djun_name'][$iCpt]    = "";
          $_SESSION['tdb_djun_race'][$iCpt]    = "";

          $iCpt++;
        }

        $_SESSION['tdb_djun_compteur'] = $iCpt;
      }



      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>