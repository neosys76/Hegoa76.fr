<?php
// ======================================================================
// Auteurs : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                              // - On inclut la class Page


class PageInscription extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();
		// on génère le token de protection du formulaire d'inscription
		$chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#";
		$chaineshuffled = str_shuffle(str_shuffle($chaine));
		$_SESSION["inscription_token"]=substr($chaineshuffled,0,32);
      // - on renseigne qq infos du parent
      parent::SetNomPage( "inscription" , "Inscription");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_inscription.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_inscription.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_GET['erreur'])){
			$erreur = $_GET['erreur'];
			switch ($erreur)
     		 {
				case "1":
					$this->message = "Vous êtes déjà inscrit avec cet email.";
					break;
				case "2":
					$this->message = "Pas d'inscription possible - URL de provenance non valide";
					break;
				case "3":
					$this->message = "Erreur: L'enregistrement en base de données n'a pas pu avoir lieu.";
					break;
				case "4":
					$this->message = "Problème de mailer: le mail de confirmation n'a pas pu vous être envoyé.";
					break;
				case "5":
					$this->message = "Vous vous êtes trompé dans votre URL de confirmation. Réintroduisez l'URL envoyé dans votre barre de navigateur.";
					break;
				case "6":
					$this->message = "L'adresse email fournie n'a pas été trouvée, soit à cause d'un problème d'accès à la base de données, soit parce que l'email n'existe pas. Réessayez.";
					break;
				case "7":
					$this->message = "La mise à jour de confirmation n'a pas pu être réalisée en BDD. Recommencez";
					break;					
				
				}
			}
      parent::Afficher();

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>