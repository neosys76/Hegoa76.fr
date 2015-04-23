<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageDjun extends Page
{
    private $account_nickname;

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "djun","Mon D'jun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_djun.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_djun.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("accueil","Accueil");
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      $account_id           = $_SESSION['account_id'];
      $avatar_name          = $_GET["avatar"];

      if ( $avatar_name == "" )
      {
        // - redirection vers la page tdb
        header('Location: index.php?page=tdb');
        exit();
      }

      if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"AVATAR\" WHERE account_id = $account_id and avatar_name = '$avatar_name'") <= 0 )
      {
        header('Location: index.php?page=tdb&erreur=no_djun');
        exit();
      }

      // - On stocke le nom du djun
      $_SESSION['djun_name'] = $avatar_name;

      // - On récupère les données
      $sql  = "SELECT race_name, level, level_agressivite, level_efficacite, level_commerce, level_escroquerie, 0 as mana, 0 as cyniam, 0 as bois, 0 as metal FROM \"libertribes\".\"AVATAR\" WHERE account_id = $account_id and avatar_name = '$avatar_name'";
      $result = parent::Requete( $sql );
      if ($result)
      {
        $row = pg_fetch_row($result);
        if ($row)
        {
          // - on stocke le message
          $_SESSION['djun_race']        = $row[0];
          $_SESSION['djun_niveau']      = $row[1];
          $_SESSION['djun_agressivite'] = $row[2];
          $_SESSION['djun_efficacite']  = $row[3];
          $_SESSION['djun_commerce']    = $row[4];
          $_SESSION['djun_escroquerie'] = $row[5];

          $_SESSION['djun_mana']        = $row[6];
          $_SESSION['djun_cyniam']      = $row[7];
          $_SESSION['djun_bois']        = $row[8];
          $_SESSION['djun_metal']       = $row[9];
         }
      }

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>