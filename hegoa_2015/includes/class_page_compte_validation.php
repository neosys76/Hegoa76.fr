<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageCompteValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte_validation","Validation du compte" );

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - gestion spécifique de la page
      $account_id           = $_SESSION['account_id'];
      $account_lastname     = $_POST['account_lastname'];
      $account_firstname    = $_POST['account_firstname'];
      $account_mail         = $_POST['account_mail'];
      $account_password     = $_POST['account_password'];
      $account_jour         = $_POST['account_jour'];
      $account_mois         = $_POST['account_mois'];
      $account_annee        = $_POST['account_annee'];
      $account_ville        = $_POST['account_ville'];
      $account_pays         = $_POST['account_pays'];
      $account_presentation = $_POST['account_presentation'];

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
      $_SESSION['account_presentation']   = $account_presentation;

      // - Controle des données
      if (
          ( strlen($account_jour) != 0 && strlen($account_jour) != 2) ||
          ( strlen($account_mois) != 0 && strlen($account_mois) != 2) ||
          ( strlen($account_annee) != 0 && strlen($account_annee) != 4)
         )
      {
        header('Location: index.php?page=compte&erreur=1');
        exit;
      }

      // - Préparation de la date
      $account_anniv = "";
      if ( strlen($account_jour) == 2 && strlen($account_mois) == 2 && strlen($account_annee) == 4 )
      {
        $account_anniv = "$account_annee-$account_mois-$account_jour";
      }

      // - On insère les données
      $sql  = "UPDATE  \"libertribes\".\"ACCOUNT\"  ";
      $sql .= " SET lastname = '$account_lastname', firstname = '$account_firstname', email = '$account_mail', password = '$account_password'";
      if ( strlen($account_anniv) == 10 )
      {
            $sql .= ", date_anniv = '$account_anniv'";
      }
      $sql .= ", ville = '$account_ville', pays = '$account_pays', presentation = '$account_presentation'  ";
      $sql .= " where account_id = $account_id";

      echo $sql;
      $result = parent::Requete( $sql );
      if ( ! $result)
      {
        // - redirection vers la page d'accueil du jeu
        header('Location: index.php?page=compte&erreur=2');
        exit;
      }

      // - redirection vers la page d'accueil du jeu
      header('Location: index.php?page=tdb');
      exit;

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>