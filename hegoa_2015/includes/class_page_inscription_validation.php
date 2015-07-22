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
      // - On controle le formulaire
      $bErreur = 0;
      //$nickname = $_POST["account_nickname"];
      $courriel = $_POST["account_mail"];
      //  crytage du mot de passe, avec un sel définit dans le fichier constantes
      $password = crypt($_POST["account_password"],SALT);
      
      // - Verifier unicité account mail
      // blocage des inscription
      $sql = "SELECT * FROM \"libertribes\".\"COMPTE\" WHERE email = '".$courriel."'";
      $nlines = $this->db_connexion->RequeteNbLignes($sql);
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
      $sql  = "INSERT INTO \"libertribes\".\"COMPTE\" ( email, password, confirmation, statut )";
      $sql .= " values ('$courriel','$password', FALSE, 'offline')";
      if(!$this->db_connexion->Requete( $sql )){
      		// L'enregistrement dans la table COMPTE n'a pas pu se faire
			header('Location: index.php?page=inscription&erreur=3');
			exit;
      		}
		else {
			// - On envoi un email  pour la confirmation
			$admin_email = ADMIN_EMAIL;
			$sujet = "Confirmation de votre inscription sur hegoa.eu";
			$cle = substr($password,5,8);
			$email_message = "Cher ami d'Hégoa,\nVous êtes bientôt inscrit dans la liste des joueurs et nous en sommes très heureux.\nIl ne vous reste plus qu'à confirmer votre inscription en introduisant l'adresse suivante dans votre barre de navigateur.\n";
			$email_message .= "http://hegoa.eu/index.php?page=inscription_confirmation&email=".urlencode($courriel)."&cle=".urlencode($cle)."\nLorsque l'opération sera terminée, vous pourrez nous rejoindre dans la plateforme du jeu.\n\nA très bientôt.\n\nHEGOA\n\n";
			$headers = "From: ".$admin_email."\n";
			//if(!mail($courriel,$sujet,$email_message,$headers)){
			if(false){
      			//  le mail de confirmation n'a pas pu avoir lieu
				header('Location: index.php?page=inscription&erreur=4');
				exit;		
			}
		}     
     		//   tout est OK => affichage      
      		// - Gestion de l'affichage
     	 parent::Afficher();
      }			//   test sur le token de provenance:  est OK
      
      else {
			header('Location: index.php?page=inscription&erreur=2');
			exit;
      	}
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>