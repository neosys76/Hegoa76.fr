<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageCompteUpdate extends Page
{
    private $account_nickname;

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte", "Mon Profil");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 1 );
      parent::SetAffichageFooter( 0 );
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_compte.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_compte_update.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){

      		parent::Afficher();
		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
    	$traductions["mon-compte-mise-a-jour"] = array(
    		"fr"=>"Mon compte: mise à jour",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
		$traductions["naissance-j-m-a"] = array(
    		"fr"=>"Date de naissance (jour-mois-année)",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["votre-presentation"] = array(
    		"fr"=>"Votre présentation",
    		"en"=>"Your introduction",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["uniquement-si-change-mot-de-passe"] = array(
    		"fr"=>"Uniquement Si Vous Voulez Changer De Mot De Passe",
    		"en"=>"Only If You Want To Change Your Password",
    		"es"=>"Sólo Si Desea Cambiar Su Contraseña",
    		"de"=>"Nur, wenn Sie wollen Passwort ändern"
    	);
    	
    	return $traductions;
    }    
    

}// - Fin de la classe

?>