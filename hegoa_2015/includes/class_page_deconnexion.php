<?php
// ======================================================================
// Auteurs : Dominique Dehareng, Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageDeconnexion extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

    }

    // - Affichage de la page
    public function Afficher()
    {
    	//  mettre le joueur offline
    	        //  on spécifie alors que le joueur et l'avatar sont offline
        $sql = "UPDATE \"libertribes\".\"COMPTE\"  SET statut = 'offline' where compte_id = '".$_SESSION["compte"]->id."'"; 
        $this->db_connexion->Requete( $sql );
        $sql = "UPDATE \"libertribes\".\"AVATAR\"  SET statut = 'offline' where avatar_id = '".$_SESSION["djun_choisi"]->id."'"; 
        $this->db_connexion->Requete( $sql );
        
    		session_destroy();
       // - redirection vers la page d'accueil
 	   header('Location: index.php?page=accueil');
 	   exit();   

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>