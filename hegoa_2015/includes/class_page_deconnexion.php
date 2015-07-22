<?php
// ======================================================================
// Auteur : Donatien CELIA
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
    	        //  on spécifie alors que le joueur est online
        $sql = "UPDATE \"libertribes\".\"COMPTE\"  SET statut = 'offline' where compte_id = '".$_SESSION['account_id']."'"; 
        $this->db_connexion->Requete( $sql );
    		session_destroy();
       // - redirection vers la page d'accueil
 	   header('Location: index.php?page=accueil');
 	   exit();   

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>