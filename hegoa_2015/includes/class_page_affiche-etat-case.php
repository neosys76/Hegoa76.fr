<?php
// ======================================================================
// Auteur : Dominique DEHARENG
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageAfficheEtatCase extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "affiche-etat-case","Etat de la case");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
   
      $this->AjouterCSS("page_jeu.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_jeu.php");

      // - on ajoute les menus utiles
		//   On met les coordonnées transmises par GET dans la BDD et dans l'avatar sauvé en SESSION
		$point = "(".$_GET['absx'].",".$_GET['ordy'].")";
      $sql  = "UPDATE \"libertribes\".\"AVATAR\" set derniere_position = '".$point."' ";
      $sql .= "WHERE avatar_id = '".$_SESSION['djun_choisi']->id."'";
      $_SESSION['djun_choisi']->derniere_position = $point;
      if(!$this->db_connexion->Requete( $sql )){
      		$this->message = "<span style='color:#f00;'>!!! Cette position n'a pas pu être sauvegardée comme votre 'dernière position' en base de données</span>";
      }		
    }

    // - Affichage de la page
    public function Afficher()
    {
    	$couleur = "#".$_GET['couleur'];
    	$coord_case = "(".$_GET['absx'].",".$_GET['ordy'].")";
    	// - On se connecte à la base de données
      parent::ConnecterBD();

      // - On cherche le terrain
      $sql  = "SELECT * FROM \"libertribes\".\"TERRAIN\" WHERE couleur = '".$couleur."' ";
      $result = parent::Requete( $sql );
      if ($result)
      {
      		$row = pg_fetch_array($result);
      	}
      	if($row){
      		if($row['nom']=="eau"){
				//   si on est dans l'eau, on ne peut rien faire
				$this->message = "Rien n'est possible dans l'eau";
			}
			else{
				//  contrôler si la case est encore disponible, dans la table CASE
				$req = "SELECT * FROM \"libertribes\".\"CASE\" WHERE coord ~= '".$coord_case."' ";			//   l'opérateur ~= est "same as" pour des types géométriques de postgresql
		
				$resu = parent::Requete( $req );	
				if($resu){$ligne = 	pg_fetch_array($resu);}
				if($ligne){
					$this->message = "La case est occupée par un ".$ligne['occupee_par'];
				}
				else {
					$this->message = "La case est libre";
				}
			}
      	}
      	$this->AjouterCSS("page_etat_case.css");
      $this->AjouterContenu("contenu_etat_case", "contenus/page_etat_case.php");
	      // - on ajoute le contenu du menu à gauche
      $this->AjouterContenu("contenu_menu", "contenus/page_jeu_menu.php");
      parent::Afficher();
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>