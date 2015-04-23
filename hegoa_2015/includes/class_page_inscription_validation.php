<?php
// ======================================================================
// Auteurs : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                              // - On inclut la class Page



class PageInscriptionValidation extends Page
{
	protected $token;
	
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "inscription_validation","Inscription" );
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );
      $this->message="";
      $this->AjouterCSS("page_inscription_validation.css");
		if((isset($_POST['_token'])&&!empty($_POST['_token']))&&(isset($_SESSION['inscription_token'])&&!empty($_SESSION['inscription_token']))&&$_POST['_token']==$_SESSION['inscription_token']){
			$this->token="OK";		
		}
		else {$this->token="NOTOK";}
      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_inscription_validation.php");
      
      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
    	if($this->token=="OK"){
      // - On se connecte à la base de données
      parent::ConnecterBD();

      // - On controle le formulaire
      $bErreur = 0;
		 include "constantes.inc.php";
      //$nickname = $_POST["account_nickname"];
      $courriel = $_POST["account_mail"];
      //  crytage du mot de passe, avec un sel définit dans le fichier constantes
      $password = crypt($_POST["account_password"],SALT);

      // - Verifier unicité account mail
      // blocage des inscription
      $sql = "SELECT * FROM \"libertribes\".\"ACCOUNT\" WHERE email = '".$courriel."'";
      $nlines = parent::RequeteNbLignes($sql);
      if ( $nlines > 0 )
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
      if(!parent::Requete( $sql )){$this->message .= "Erreur: L'enregistrement en base de données n'a pas pu avoir lieu.";}
      // - On envoi un email

		}
		else {$this->message = "Pas de connexion possible - mauvais token";}
      // - Gestion de l'affichage
      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>