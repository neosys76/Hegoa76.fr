<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageMessagerie extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "messagerie","Messagerie");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_messagerie.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_messagerie.php");
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - on récupère des infos de la session
      $account_id = $_SESSION['account_id'];                                    // Ajouter l'avatar_name
      $type = $_GET['type'];                                                    // On recupère le type de message

      // - Parcours des messages
      $_SESSION['message_compteur']    = 0;
      $_SESSION['message_id']          = array();
      $_SESSION['message_is_read']     = array();
      $_SESSION['message_object']      = array();
      $_SESSION['message_date_envoi']  = array();
      $_SESSION['message_is_delete']   = array();
      $_SESSION['message_type']        = array();

      // - On récupère les données
      $sql  = "SELECT message_id, is_read, object, date_envoi, is_delete, type FROM \"libertribes\".\"MESSAGE\" WHERE account_id = $account_id ";

      // - Quel type de message ?
      if ($type == "delete")
      {
        // - Messages supprimés
        $_SESSION['messages_type'] = $type;
        $sql .= " AND is_delete = 1";
      }
      else
      {
        if ($type == "send")
        {
          // - Messages envoyés
          $_SESSION['messages_type'] = $type;
          $sql .= " AND type = 2 AND is_delete = 0";
        }
        else
        {
          // - Messages reçus
          $_SESSION['messages_type'] = "receive";
          $sql .= " AND type = 1 AND is_delete = 0";
        }
      }

      // - Tri par date d'envoi
      $sql  .= " order by date_envoi";

      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les messages
          $_SESSION['message_id'][$iCpt]         = $row[0];
          $_SESSION['message_is_read'][$iCpt]    = $row[1];
          $_SESSION['message_object'][$iCpt]     = $row[2];
          $_SESSION['message_date_envoi'][$iCpt] = $row[3];
          $_SESSION['message_is_delete'][$iCpt]  = $row[4];
          $_SESSION['message_type'][$iCpt]       = $row[5];

          $iCpt++;
        }

        $_SESSION['message_compteur'] = $iCpt;
      }


      parent::Afficher();

      // - gestion spécifique de la page

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>