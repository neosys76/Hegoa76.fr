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
      parent::SetAffichageMenu( 0 );
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
    /* 
      *  traitement du formulaire d'inscription
    */
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
		/*
		*  fin de traitement du formulaire d'inscription
		*/
		
      // - On insère les données
      $sql  = "INSERT INTO \"libertribes\".\"ACCOUNT\" ( email, password, confirmation, status )";
      $sql .= " values ('$courriel','$password', FALSE, 'offline')";
      if(!parent::Requete( $sql )){
      		$this->message .= "Erreur: L'enregistrement en base de données n'a pas pu avoir lieu.";
			header('Location: index.php?page=inscription');
			exit;
      		}
      
		else {
		// - On envoi un email  pour la confirmation
		include "constantes.inc.php";
		$admin_email = ADMIN_EMAIL;
		$sujet = "Confirmation de votre inscription sur hegoa.eu";
		$cle = substr($password,5,8);
		$message = "Cher ami d'Hégoa,\nVous êtes bientôt inscrit dans la liste des joueurs et nous en sommes très heureux.\nIl ne vous reste plus qu'à confirmer votre inscription en introduisant l'adresse suivante dans votre barre de navigateur.\n";
		$message .= "http://hegoa.eu/index.php?page=inscription_confirmation&email=".."&cle=".$cle."\nLorsque l'opération sera terminée, vous pourrez nous rejoindre dans la plateforme du jeu.\n\nA très bientôt.\n\nHEGOA\n\n";
		$headers = "From: ".$admin_email;
		//if(mail($courriel,$sujet,$message,$headers)){
		if(true){
      		$this->message .= "Un mail de confirmation vous a été envoyé avec une adresse URL pour finaliser votre inscription. ";
			header('Location: index.php?page=inscription_validation');
			exit;			
		}
		else {
      		$this->message .= "Problème de mailer: le mail de confirmation n'a pas pu vous être envoyé.";
			header('Location: index.php?page=inscription');
			exit;		
		}
		
		}
		}
		else {$this->message = "Pas de connexion possible - mauvais token";}
      // - Gestion de l'affichage
      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>