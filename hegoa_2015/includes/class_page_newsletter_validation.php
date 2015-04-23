<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                              // - On inclut la class Page


class PageNewsletterValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "newsletter_validation" , "Newsletter");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );
      $this->AjouterCSS("page_newsletter_validation.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_newsletter_validation.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - On controle le formulaire
      $bErreur = 0;

      $courriel = $_POST["account_mail"];

      // - Verifier unicité account mail
      if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"NEWSLETTER\" WHERE email = '$courriel'") > 0 )
      {
        $bErreur++;
      }

      // - Une erreur on doit retourné sur le formulaire
      if ( $bErreur > 0 )
      {
        header('Location: index.php?page=newsletter&erreur=1');
        exit;
      }

      // - On insère les données
      $sql  = "INSERT INTO \"libertribes\".\"NEWSLETTER\" ( email )";
      $sql .= " values ('$courriel')";

      parent::Requete( $sql );

      // - On envoi un email

      // - Gestion de l'affichage
      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>