<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageActualiteBusiness extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "actualite");
      parent::SetAffichageHeader( -1 );
      //parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_actualite.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_actualite_business.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("inscription","Inscription");
      //$this->AjouterMenu("connexion","Connexion");
    }

    // - Affichage de la page
    public function Afficher()
    {
     // - On se connescte à la base de données
      parent::ConnecterBD();

      $_SESSION['actualite_libelle'] = array();
      $_SESSION['actualite_date_creation'] = array();

      // - On récupère les données des djuns
      $sql  = "SELECT libelle, date_creation FROM \"libertribes\".\"ACTUALITE\" WHERE type = 'BUSINESS' order by date_creation DESC";
      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les messages
          $_SESSION['actualite_libelle'][$iCpt]         = $row[0];
          $_SESSION['actualite_date_creation'][$iCpt]   = $row[1];

          $iCpt++;
        }

        $_SESSION['actualite_compteur'] = $iCpt;
      }

      parent::Afficher();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>