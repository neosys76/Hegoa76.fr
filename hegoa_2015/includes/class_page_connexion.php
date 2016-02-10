<?php
// ======================================================================
// Auteurs : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageConnexion extends Page
{

    function __construct()
    {
    	// on génère le token de protection du formulaire de connexion
		$chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#";
		$chaineshuffled = str_shuffle(str_shuffle($chaine));
		
      // - on appele le constructeur du parent
      parent::__construct();
		$_SESSION["connexion_token"]=substr($chaineshuffled,0,32);
      // - on renseigne qq infos du parent
      parent::SetNomPage( "connexion","Connexion" );
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();
      $this->AjouterCSS("page_inscription_connexion.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_connexion.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On initialise la session
      if(isset($_SESSION['compte'])){unset($_SESSION['compte']);}
      if(isset($_SESSION['inscription_token'])){unset($_SESSION['inscription_token']);}
      $notice="";
      	if(isset($_GET["notice"])){$notice = $_GET['notice'];}
		switch ($notice)
     		 {
				case "1":
					$this->message = $this->traductions["inscription-confirmee-commencez-jeu"][$_SESSION['lang']].".<br/><br/><a href='?page=connexion'>".ucfirst($this->traductions_debut['connexion'][$_SESSION['lang']])."</a>";
					break;
			}

      parent::Afficher();

    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
		$traductions["form-incomplet-re-essai"] = array(
    		"fr"=>"Le formulaire n&#39;est pas complet. Réessayez.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["token-incorrect-re-essai"] = array(
    		"fr"=>"Le jeton de sécurité est incorrect. Réessayez.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["pour-acceder-jeu-faut-etre-connecte"] = array(
    		"fr"=>"Pour accéder au jeu, il faut être connecté.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-1"] = array(
    		"fr"=>"Soit le compte est en attente de validation, soit le compte n&#39;existe pas et il faut alors vous inscrire, soit les données introduites sont incorrectes et il faut réessayez.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-2"] = array(
    		"fr"=>"Pour demander un nouveau mot de passe, vous devez fournir l&#39;adresse email avec laquelle vous vous êtes inscrit. Sinon, réinscrivez-vous avec une autre adresse.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["pas-encore-inscrit-cliquez-ici"] = array(
    		"fr"=>"Pas encore inscrit ? Cliquez ici",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["mot-de-passe-oublie-email-re-initialiser"] = array(
    		"fr"=>"Mot de passe oublié? Fournissez votre email et réinitialisez",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["inscription-confirmee-commencez-jeu"] = array(
    		"fr"=>"Votre inscription a été confirmée et vous pouvez vous connecter dès à présent",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);    	
    	
    	
    	return $traductions;
    }

}// - Fin de la classe

?>