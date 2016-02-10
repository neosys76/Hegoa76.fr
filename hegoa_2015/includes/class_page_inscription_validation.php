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
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();
      
      $this->AjouterCSS("page_inscription_connexion.css");
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
			$sujet = $this->traductions["sujet"][$_SESSION['lang']];
			$cle = substr($password,5,8);
			$email_message = $this->traductions["email-message-1"][$_SESSION['lang']];
			$email_message .= "http://hegoa.eu/index.php?page=inscription_confirmation&email=".urlencode($courriel)."&cle=".urlencode($cle)."\n".$this->traductions["email-message-2"][$_SESSION['lang']]."\n\nHEGOA\n\n";       
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
    
    
	public function getTraductions(){
		$traductions["email-message-1"] = array(
    		"fr"=>"Cher ami d&#39;Hégoa,\nVous êtes bientôt inscrit dans la liste des joueurs et nous en sommes très heureux.\nIl ne vous reste plus qu&#39;à confirmer votre inscription en introduisant l&#39;adresse suivante dans votre barre de navigateur.\n",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["email-message-2"] = array(
    		"fr"=>"Lorsque l&#39;opération sera terminée, vous pourrez nous rejoindre dans la plateforme du jeu.\n\nA très bientôt.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["sujet"] = array(
    		"fr"=>"Confirmation de votre inscription sur hegoa.eu",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["message-bienvenue"] = array(
    		"fr"=>"Félicitations !<br /><br />Vous faites à présent partie des tribus d&#39;&nbsp;Hégoa...<br /><br />(Un message de confirmation arrive sur votre boite mail.)<br /><br/>Merci de confirmer avant d&#39;incarner un D&#39;jun,<br />l&#39;esprit protecteur de votre future tribu.<br />",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	
    	return $traductions;
    }

}// - Fin de la classe

?>