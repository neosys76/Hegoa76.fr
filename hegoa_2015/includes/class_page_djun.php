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
      parent::SetAffichageMenu( 0 );
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
      $sql  = "SELECT * FROM \"libertribes\".\"AVATAR\" WHERE account_id = $account_id and avatar_name = '$avatar_name'";
      $result = parent::Requete( $sql );
      if ($result)
      {
        //$row = pg_fetch_row($result);
        $row = pg_fetch_array($result);
        if ($row)
        {
          // - on stocke le message

          $_SESSION['djun_race']        = $row["race_name"];
          $_SESSION['djun_niveau']      = $row["level"];
          $_SESSION['djun_agressivite'] = $row["level_agressivite"];
          $_SESSION['djun_efficacite']  = $row["level_efficacite"];
          $_SESSION['djun_commerce']    = $row["level_commerce"];
          $_SESSION['djun_escroquerie'] = $row["level_escroquerie"];
          $_SESSION['djun_image'] = $row["numero_image"];
				//   quid de mana, cyniam, bois, metal ??
          $_SESSION['djun_mana']        = 0;
          $_SESSION['djun_cyniam']      = 0;
          $_SESSION['djun_bois']        = 0;
          $_SESSION['djun_metal']       = 0;
         }
      }

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>