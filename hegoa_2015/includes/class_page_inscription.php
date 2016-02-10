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
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_inscription_connexion.css");

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
					$this->message = $this->traductions["erreur-1"][$_SESSION['lang']];
					break;
				case "2":
					$this->message = $this->traductions["erreur-2"][$_SESSION['lang']];
					break;
				case "3":
					$this->message = $this->traductions["erreur-3"][$_SESSION['lang']];
					break;
				case "4":
					$this->message = $this->traductions["erreur-4"][$_SESSION['lang']];
					break;
				case "5":
					$this->message = $this->traductions["erreur-5"][$_SESSION['lang']];
					break;
				case "6":
					$this->message = $this->traductions["erreur-6"][$_SESSION['lang']];
					break;
				case "7":
					$this->message = $this->traductions["erreur-7"][$_SESSION['lang']];
					break;					
				
				}
			}
      parent::Afficher();

    }// - Fin de la fonction Afficher
    
    
	public function getTraductions(){
		$traductions["erreur-1"] = array(
    		"fr"=>"Vous êtes déjà inscrit avec cet email.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-2"] = array(
    		"fr"=>"Pas d&#39;inscription possible - URL de provenance non valide",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-3"] = array(
    		"fr"=>"Erreur: L&#39;enregistrement en base de données n&#39;a pas pu avoir lieu.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-4"] = array(
    		"fr"=>"Problème de mailer: le mail de confirmation n&#39;a pas pu vous être envoyé.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-5"] = array(
    		"fr"=>"Vous vous êtes trompé dans votre URL de confirmation. Réintroduisez l&#39;URL envoyé dans votre barre de navigateur.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-6"] = array(
    		"fr"=>"L&#39;adresse email fournie n&#39;a pas été trouvée, soit à cause d&#39;un problème d&#39;accès à la base de données, soit parce que l&#39;email n&#39;existe pas. Réessayez.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["erreur-7"] = array(
    		"fr"=>"La mise à jour de confirmation n&#39;a pas pu être réalisée en BDD. Recommencez.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["adresse-mail"] = array(
    		"fr"=>"Adresse mail",
    		"en"=>"Email address",
    		"es"=>"Correo electrónico",
    		"de"=>""
    	);
    	$traductions["deja-membre-se-connecter"] = array(
    		"fr"=>"Déjà membre. Se connecter.",
    		"en"=>"Already registered. Login.",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>