<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageConnexionValidation extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "connexion_validation" );

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connescte à la base de données
      parent::ConnecterBD();

      // - On controle le formulaire
      $iErreur = 0;

      $account_mail     = $_POST["account_mail"];
      $account_password = $_POST["account_password"];

      if ( $account_mail == "" || $account_password == "" )
      {
        $iErreur += 1;
      }
      else
      {
        // - Verification de l'existence du compte
        if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"ACCOUNT\" WHERE email = '$account_mail' and password = '$account_password'") != 1 )
        {
          $iErreur += 10;
        }
      }

      // - Une erreur on doit retourné sur le formulaire
      if ( $iErreur > 0 )
      {
        header('Location: index.php?page=connexion&erreur=' . $iErreur);
        exit;
      }

      // - On récupère l'id
      $sql  = "SELECT account_id FROM \"libertribes\".\"ACCOUNT\" WHERE email = '$account_mail'";

      $result = parent::Requete( $sql );
      if ($result)
      {
        $row = pg_fetch_row($result);
        if ($row)
        {
          $account_id = $row[0];
        }
      }

      // - gestion spécifique de la page
      $_SESSION['account_id']   = $account_id;
      $_SESSION['account_mail'] = $account_mail;

      // - redirection vers la page d'accueil du jeu
      //parent::Afficher();
      header('Location: index.php?page=tdb');

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>