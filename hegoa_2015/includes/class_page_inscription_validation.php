<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                              // - On inclut la class Page


class PageInscriptionValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "inscription_validation" );
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );
      $this->AjouterCSS("page_inscription_validation.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_inscription_validation.php");

      // - on ajoute les menus utiles
      //$this->AjouterMenu("accueil","Accueil");
      //$this->AjouterMenu("connexion","Connexion");
    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connescte à la base de données
      parent::ConnecterBD();

      // - On controle le formulaire
      $bErreur = 0;

      //$nickname = $_POST["account_nickname"];
      $courriel = $_POST["account_mail"];
      $password = $_POST["account_password"];

/*
      // - Verifier unicité nickname
      if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"ACCOUNT\" WHERE nickname = '$nickname'") > 0 )
      {
        $bErreur++;
      }
*/
      // - Verifier unicité account mail
      // blocage des inscription
      //if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"ACCOUNT\" WHERE email = '$courriel'") > 0 )
      {
        $bErreur++;
      }

      // - Une erreur on doit retourné sur le formulaire
      if ( $bErreur > 0 )
      {
        header('Location: index.php?page=inscription&erreur=1');
        exit;
      }

      // - On insère les données
      $sql  = "INSERT INTO \"libertribes\".\"ACCOUNT\" ( email, password, confirmation, status )";
      $sql .= " values ('$courriel','$password', FALSE, 'offline')";

      parent::Requete( $sql );

      // - On envoi un email

      // - Gestion de l'affichage
      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>