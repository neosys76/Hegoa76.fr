<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageCompteValidation extends Page
{

    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "compte_validation","Validation du compte" );

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
    	if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
      		// - gestion spécifique de la page
      		$deja_ecrit = 0;
      		$account_id           = $_SESSION['compte']->id;
      		$sql  = "UPDATE  \"libertribes\".\"COMPTE\"  SET ";
      		if(isset($_POST["compte_nom"])&&!empty($_POST["compte_nom"])){
      			$nom = htmlspecialchars($_POST["compte_nom"]);
      			$_SESSION["compte"]->nom = $nom;
      			$sql .= "nom='".$nom."'";
      			$deja_ecrit = 1;
      		}
      		if(isset($_POST["compte_prenom"])&&!empty($_POST["compte_prenom"])){
      			$prenom = htmlspecialchars($_POST["compte_prenom"]);
      			$_SESSION["compte"]->prenom = $prenom;
      			if($deja_ecrit==0){
      				$sql .= "prenom='".$prenom."'";
      				$deja_ecrit = 1;
      			}
      			else {
      				$sql .= ", prenom='".$prenom."'";
      			}
      		}
      		if(isset($_POST["compte_email"])&&!empty($_POST["compte_email"])){
      			$email = htmlspecialchars($_POST["compte_email"]);
      			$_SESSION["compte"]->email = $email;
      			if($deja_ecrit==0){
      				$sql .= "email='".$email."'";
      				$deja_ecrit = 1;
      			}
      			else {
      				$sql .= ", email='".$email."'";
      			}
      		}
      		if(isset($_POST["compte_ville"])&&!empty($_POST["compte_ville"])){
      			$ville = htmlspecialchars($_POST["compte_ville"]);
      			$_SESSION["compte"]->ville = $ville;
      			if($deja_ecrit==0){
      				$sql .= "ville='".$ville."'";
      				$deja_ecrit = 1;
      			}
      			else {
      				$sql .= ", ville='".$ville."'";
      			}
      		}
      		if(isset($_POST["compte_pays"])&&!empty($_POST["compte_pays"])){
      			$pays = htmlspecialchars($_POST["compte_pays"]);
      			$_SESSION["compte"]->pays = $pays;
      			if($deja_ecrit==0){
      				$sql .= "pays='".$pays."'";
      				$deja_ecrit = 1;
      			}
      			else {
      				$sql .= ", pays='".$pays."'";
      			}
      		}
      		if(isset($_POST["le_jour"])&&!empty($_POST["le_jour"])){
      			$le_jour = htmlspecialchars($_POST["le_jour"]);
      		}
      		else {
      			$le_jour = "00";
      		}
      		if(isset($_POST["le_mois"])&&!empty($_POST["le_mois"])){
      			$le_mois = htmlspecialchars($_POST["le_mois"]);
      		}
      		else {
      			$le_mois = "00";
      		}
      		if(isset($_POST["l_annee"])&&!empty($_POST["l_annee"])){
      			$l_annee = htmlspecialchars($_POST["l_annee"]);
      		}
      		else {
      			$l_annee = "0000";
      		}
      		$date_anniv = $l_annee."-".$le_mois."-".$le_jour;
      		if($date_anniv != "0000-00-00"){
      			$_SESSION["compte"]->date_anniv = $date_anniv;
      			if($deja_ecrit==0){
      				$sql .= "date_anniv='".$date_anniv."'";
      				$deja_ecrit = 1;
      			}
      			else {
      				$sql .= ", date_anniv='".$date_anniv."'";
      			}
      		}
      		if(isset($_POST["compte_presentation"])&&!empty($_POST['compte_presentation'])){
      			$presentation = str_replace("'","&#39",htmlentities($_POST["compte_presentation"]));
      			$_SESSION["compte"]->presentation = $presentation;
      			if($deja_ecrit==0){
      				$sql .= "presentation='".$presentation."'";
      				$deja_ecrit = 1;
      			}
      			else {
      				$sql .= ", presentation='".$presentation."'";
      			}
      		}
      		if(isset($_POST["nouveau_password"])&&!empty($_POST["nouveau_password"])){
      			$nouveau_password = crypt($_POST["nouveau_password"],SALT);
      			$_SESSION["compte"]->password = $nouveau_password;
      			if($deja_ecrit==0){
      				$sql .= "password='".$nouveau_password."'";
      				$deja_ecrit = 1;
      			}
      			else {
      				$sql .= ", password='".$nouveau_password."'";
      			}
      		}
      		$sql .= " WHERE compte_id = ".$account_id;
      // - On insère les données

      $result = $this->db_connexion->Requete( $sql );
      if ( ! $result)
      {
        // - redirection vers la page d'accueil du jeu
        header('Location: index.php?page=compte&erreur=1');
        exit;
      }

      // - redirection vers la page d'accueil du jeu
      header('Location: index.php?page=tdb');
      exit;
		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}
    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>