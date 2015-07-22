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

      $this->AjouterCSS("page_connexion.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_connexion.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      // - On initialise la session
      if(isset($_SESSION['account_id'])){unset($_SESSION['account_id']);}
      if(isset($_SESSION['account_mail'])){unset($_SESSION['account_mail']);}
      if(isset($_SESSION['inscription_token'])){unset($_SESSION['inscription_token']);}
      $notice="";
      	if(isset($_GET["notice"])){$notice = $_GET['notice'];}
		switch ($notice)
     		 {
				case "1":
					$this->message = "Votre inscription a été confirmée et vous pouvez vous connecter dès à présent.<br/><br/><a href='?page=connexion'>Connexion</a>";
					break;
			}

      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>