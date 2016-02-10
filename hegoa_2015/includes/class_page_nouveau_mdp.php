<?php
// ======================================================================
// Auteur : Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageNouveauMdp extends Page
{
	protected $token;
	
    function __construct()
    {
    	// on génère le token de protection du formulaire de connexion
		$chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQSRTUVWXYZ0123456789?+@#";
		$chaineshuffled = str_shuffle(str_shuffle($chaine));
		
      // - on appele le constructeur du parent
      parent::__construct();
      if(!isset($_POST['sub_new_mdp'])||empty($_POST['sub_new_mdp'])){
			$_SESSION["new_mdp_token"]=substr($chaineshuffled,0,32);
		}
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "nouveau_mdp","Nouveau MDP" );
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );   
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();
         
      $this->AjouterCSS("page_inscription_connexion.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_nouveau_mdp.php");
    }

    // - Affichage de la page
    public function Afficher()
    {
    	if(isset($_POST['sub_new_mdp'])&&!empty($_POST['sub_new_mdp'])){
    		//  partie traitement formulaire
     	 	if((isset($_POST['_tokenmdp'])&&!empty($_POST['_tokenmdp']))&&(isset($_SESSION['new_mdp_token'])&&!empty($_SESSION['new_mdp_token']))&&$_POST['_tokenmdp']==$_SESSION['new_mdp_token']){
				$this->token="OK";		
			}
			else {$this->token="NOTOK";}
			if($this->token=="OK"){
				//   token OK => on continue
	    		if(!isset($_POST["account_mail"])||empty($_POST["account_mail"])){
					header('Location: index.php?page=connexion&erreur=100');
					exit;
				}
      			else {
      				$account_mail     = $_POST["account_mail"];
   		 			
      				// - On récupère le compte sur base de l'email	
      				$sql  = "SELECT * FROM \"libertribes\".\"COMPTE\" WHERE email = '".$account_mail."'";

      				$result = $this->db_connexion->Requete( $sql );
      				if ($result)
      				{
        				$row = pg_fetch_row($result);
        				if ($row)
        				{
          				$account_id = $row[0];
        				}
        				else {
 							header('Location: index.php?page=connexion&erreur=100');
							exit;       
        				}
      					//  crytage du mot de passe, avec un sel définit dans le fichier constantes
      					$chainemdp = "azertyupqsdfghjkmwxcvbn23456789AZERTYUPQSDFGHJKMWXCVBN";
      					$new_mdp = str_shuffle(substr(str_shuffle($chainemdp),10,20));
      					$account_password = crypt($new_mdp,SALT);
		
			        	//  mettre à jour la table COMPTE avec le nouveau mot de passe
						$sql = "UPDATE \"libertribes\".\"COMPTE\"  SET password = '".$account_password."' where compte_id = '".$account_id."'"; 
        				if($this->db_connexion->Requete( $sql )){
        					$mail_message = $this->traductions["votre-nouveau-mot-de-passe-est"][$_SESSION['lang']]. ":\n".$new_mdp."\n".ucfirst($this->traductions["bonne-continuation"][$_SESSION['lang']])."\nHegoa";
        					$subject = ucfirst($this->traductions["nouveau-mot-de-passe"][$_SESSION['lang']]). " Hegoa";
        					$to = $account_mail;
        					$header = "From: ".EMAIL_ADMIN."\n";
        					if(mail($to,$subject,$mail_message,$header)){
        					//if(true){
        						$this->message = $this->traductions["vous-recevrez-nouveau-courriel-avec-mot-de-passe"][$_SESSION['lang']]." <br/>".ucfirst($this->traductions["bonne-continuation"][$_SESSION['lang']]).".";  					
        					}
        					else {
         						$this->message = $this->traductions_debut['probleme-non-identifie'][$_SESSION['lang']].", ".$this->traductions_debut['nous-sommes-desoles'][$_SESSION['lang']].". <br/>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".";   	
        					}
        				}
        				else {
         					$this->message = $this->traductions_debut['probleme-acces-bdd'][$_SESSION['lang']].", ".$this->traductions_debut['nous-sommes-desoles'][$_SESSION['lang']].".<br/>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".";      
						}
					}		//   fin du if sur result: recherche de l'email dans la table COMPTE
					else {
						$this->message = $this->traductions_debut['probleme-acces-bdd'][$_SESSION['lang']].", ".$this->traductions_debut['nous-sommes-desoles'][$_SESSION['lang']].". <br/>".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".";     
					}
				}			//   fin du else => email bien transmis
			}			//   fin de token OK
			else {	
				//   token not OK
				$this->message = $this->traductions_debut['jeton-securite-incorrect'][$_SESSION['lang']].". ".$this->traductions_debut['recommencer-operation'][$_SESSION['lang']].".";			
			}
		}		//   fin du traitement du formulaire     	
			//   affichage du formulaire
			parent::Afficher();
	}   // - Fin de la fonction Afficher
	
	
    public function getTraductions(){
		$traductions["nouveau-mot-de-passe"] = array(
    		"fr"=>"nouveau mot de passe",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["fournissez-email-enregistre"] = array(
    		"fr"=>"Fournissez votre adresse email déjà enregistrée",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["votre-nouveau-mot-de-passe-est"] = array(
    		"fr"=>"Votre nouveau mot de passe est",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["bonne-continuation"] = array(
    		"fr"=>"bonne continuation",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["vous-recevrez-nouveau-courriel-avec-mot-de-passe"] = array(
    		"fr"=>"Vous allez recevoir un courriel avec votre nouveau mot de passe",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>