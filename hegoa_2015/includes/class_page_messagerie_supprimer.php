<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageMessagerieSupprimer extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "messagerie_supprimer","Messagerie");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_messagerie_supprimer.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_messagerie_supprimer.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - on récupère des infos de la session
      $account_id = $_SESSION['account_id'];

      // - on récupère les paramètres
      $message_id = $_GET['no_message'];

      // - On récupère les données
/*
      $sql  = "SELECT is_read, object, message, date_envoi FROM \"libertribes\".\"MESSAGE\" WHERE account_id = $account_id AND message_id = $message_id AND type = 1 AND is_delete = 0";
      $result = parent::Requete( $sql );
      if ($result)
      {
        $row = pg_fetch_row($result);
        if ($row)
        {
          // - on stocke le message
          $_SESSION['messagerie_lire_id']           = $message_id;
          $_SESSION['messagerie_lire_is_read']      = $row[0];
          $_SESSION['messagerie_lire_object']       = $row[1];
          $_SESSION['messagerie_lire_message']      = $row[2];
          $_SESSION['messagerie_lire_date_envoi']   = $row[3];
          $_SESSION['messagerie_lire_heure_envoi']  = "XXhXX";
         }
      }
*/

      parent::Afficher();

      // - gestion spécifique de la page

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>