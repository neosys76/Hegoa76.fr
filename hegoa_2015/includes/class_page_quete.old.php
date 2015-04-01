<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageQuete extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "quete");
      parent::SetAffichageHeader( 0 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_quete.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_quete.php");

      // - on ajoute les menus utiles
/*
      $this->AjouterMenu("compte","Compte");
      $this->AjouterMenu("village","Village");
      $this->AjouterMenu("avatar","Avatar");
      $this->AjouterMenu("messagerie","Messagerie");
      $this->AjouterMenu("carte","Carte");
      $this->AjouterMenu("commerce","Commerce");
      $this->AjouterMenu("unite","Unit�s");
      $this->AjouterMenu("objet","Objet");
      $this->AjouterMenu("hero","H�ros");
      $this->AjouterMenu("quete","Qu�tes");
      $this->AjouterMenu("guilde","Guildes");
      $this->AjouterMenu("guilde_recherche","Recherche Guilde");
      $this->AjouterMenu("diplomatie","Diplomatie");
*/
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte � la base de donn�es
      parent::ConnecterBD();

      // - on r�cup�re des infos de la session
      $account_id = $_SESSION['account_id'];

      // - on r�cup�re les infos de l'url
      $type = "";
      if ( ! isset( $_GET['type'] ) )
      {
        $type = "current";
      }
      else
      {
        $type = $_GET['type'];
      }
      $_SESSION['quete_type'] = $type;

      // - Parcours des messages
      $_SESSION['quete_titre']         = array();
      $_SESSION['quete_coord_x']       = array();
      $_SESSION['quete_coord_y']       = array();
      $_SESSION['quete_recompense']    = array();
      $_SESSION['quete_is_read']       = array();

      // - On r�cup�re les donn�es
      $sql  = "SELECT quete_id, is_read, titre, coord_x, coord_y, recompense FROM \"libertribes\".\"QUETE\" WHERE account_id = $account_id and type = '$type'";
      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les messages
          $_SESSION['quete_id'][$iCpt]            = $row[0];
          $_SESSION['quete_is_read'][$iCpt]       = $row[1];
          $_SESSION['quete_titre'][$iCpt]         = $row[2];
          $_SESSION['quete_coord_x'][$iCpt]       = $row[3];
          $_SESSION['quete_coord_y'][$iCpt]       = $row[4];
          $_SESSION['quete_recompense'][$iCpt]    = $row[5];


          $iCpt++;
        }

        $_SESSION['quete_compteur'] = $iCpt;
      }

      // - Gestion du nb de pages
      $iNbPages = ceil( $_SESSION['quete_compteur'] / 5 );
      if( $iNbPages == 0 )
      {
        $iNbPages = 1;
      }

      $_SESSION['quete_nb_pages'] = $iNbPages;

      // - Gestion du no de page
      if ( ! isset($_POST['quete_no_page']) )
      {
        $_SESSION['quete_no_page'] = 1;
      }
      else
      {
        $iPage = $_POST['quete_no_page'];

        if ( $iPage < 0 )
        {
          $iPage = 1;
        }

        if ( $iPage > $iNbPages )
        {
          $iPage = $iNbPages;
        }

        $_SESSION['quete_no_page'] = $iPage;
      }


      parent::Afficher();

      // - gestion sp�cifique de la page

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>