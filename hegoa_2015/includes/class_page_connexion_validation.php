<?php
// ======================================================================
// Auteurs : Dominique Dehareng, Donatien Celia
// Licence : CeCILL v2
// ======================================================================

require "class_page.php";                                                       // - On inclut la class Page


class PageConnexionValidation extends Page
{
	protected $token;
	
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "connexion_validation","Connexion" );
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 ); 

      	if((isset($_POST['_token'])&&!empty($_POST['_token']))&&(isset($_SESSION['connexion_token'])&&!empty($_SESSION['connexion_token']))&&$_POST['_token']==$_SESSION['connexion_token']){
			$this->token="OK";		
		}
		else {$this->token="NOTOK";}

    }

    // - Affichage de la page
    public function Afficher()
    {
		if($this->token=="OK"){
			// - On controle le formulaire// mot de passe (pas de required mis dans le formulaire lui-même)
			if(!isset($_POST['account_password'])||empty($_POST['account_password'])){			
				header('Location: index.php?page=connexion&erreur=0');
        		exit;      		
			}
			else {
      			$account_mail     = $_POST["account_mail"];
      			//  crytage du mot de passe, avec un sel définit dans le fichier constantes
      			$account_password = crypt($_POST["account_password"],SALT);
		      if ( $account_mail == "" || $account_password == "" )
				{
					header('Location: index.php?page=connexion&erreur=1');
					exit;
				}
				else
      			{
					if(!isset($_SESSION["compte"])||empty($_SESSION["compte"])){
     		 			// - On charge le compte en session à partir de la base de données
      					$sql  = "SELECT * FROM \"libertribes\".\"COMPTE\" WHERE email = '$account_mail' and password = '$account_password' and confirmation='TRUE'";    
      					$result = $this->db_connexion->Requete( $sql );
      					if (isset($result)&&!empty($result))
      					{
      						$num_rows = pg_num_rows($result);
      						if($num_rows !=1){
								header('Location: index.php?page=connexion&erreur=10');
        						exit;
      						}
      						else 
      						{
      							$row = pg_fetch_array($result);
       						$compte = new Compte($row);
       						$_SESSION["compte"] = $compte;
       					}
						}
					} 					//  fin de test sur l'existence du compte en SESSION
        			//  on spécifie alors que le joueur est online
					$sql = "UPDATE \"libertribes\".\"COMPTE\"  SET statut = 'online' where compte_id = '".$_SESSION["compte"]->id."'"; 
					$this->db_connexion->Requete( $sql );
					//  on charge alors les avatars et villages du joueur, une fois pour toute, pour éviter des accès trop fréquents à la BDD, ainsi que les caractéristiques des terrains possibles, le tout mis en variable de SESSION
					//  Avatars 		
					$sql  = "SELECT * FROM \"libertribes\".\"AVATAR\" WHERE compte_id = ".$_SESSION["compte"]->id."ORDER BY date_creation DESC";
					$result = $this->db_connexion->Requete( $sql );
     				 if (isset($result)&&pg_num_rows( $result )>0)
     				 {
     				 	$avatars = array();
      					while ($row = pg_fetch_array($result)) {
      						$avatars[] = new Avatar($row);			//   NB  les villages des avatars sont inclus dans la classe
      					}
      				}

					if(isset($avatars)){$_SESSION['avatars'] = $avatars;}
					// - redirection vers la page de tableau de bord du jeu
					header('Location: index.php?page=tdb');
					exit;
				}			//    fin du processing du formulaire
			}					//    fin de test sur le champ password
		}
		else {
			header('Location: index.php?page=connexion&erreur=2');
			exit;	
		}		 
    }// - Fin de la fonction Afficher
    
}// - Fin de la classe

?>