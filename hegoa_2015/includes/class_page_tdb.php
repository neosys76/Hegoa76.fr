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
      parent::SetNomPage( "tdb","Tableau de bord");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_tdb.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_tdb.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - on vide les varaibles de session
      $_SESSION['avatar_name'] = "";
      $_SESSION['avatar_djun_id'] = "";

      // - On se connecte à la base de données
      parent::ConnecterBD();
		include "constantes.inc.php";
		$max_djuns_par_joueur = MAX_DJUNS;
      // - on récupère des infos de la session
      $account_id           = $_SESSION['account_id'];

      $_SESSION['tdb_djun_name'] = array();
      $_SESSION['tdb_djun_race'] = array();

      // - On récupère les données des djuns
      $sql  = "SELECT avatar_name, race_name, numero_image FROM \"libertribes\".\"AVATAR\" WHERE account_id = $account_id";
      $result = parent::Requete( $sql );
      if (isset($result)&&!empty($result))
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les D'juns
          $_SESSION['tdb_djun_name'][$iCpt]    = $row[0];
          $_SESSION['tdb_djun_race'][$iCpt]    = $row[1];
          $_SESSION['tdb_djun_image'][$iCpt]    = $row[2];

          $iCpt++;
        }

        for( $i = $iCpt; $i < $max_djuns_par_joueur; $i++)
        {
          $_SESSION['tdb_djun_name'][$iCpt]    = "";
          $_SESSION['tdb_djun_race'][$iCpt]    = "";
			$_SESSION['tdb_djun_image'][$iCpt]    = "";
          $iCpt++;
        }

        $_SESSION['tdb_djun_compteur'] = $iCpt;
      }



      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>