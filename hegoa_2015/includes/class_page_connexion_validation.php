<?php
// ======================================================================
// Auteur : Donatien CELIA
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

      // - On controle le formulaire
      $iErreur = 0;

      $account_mail     = $_POST["account_mail"];
      //  crytage du mot de passe, avec un sel définit dans le fichier constantes
      $account_password = crypt($_POST["account_password"],SALT);

      if ( $account_mail == "" || $account_password == "" )
      {
        $iErreur += 1;
      }
      else
      {
        // - Verification de l'existence du compte
        if ($this->db_connexion->RequeteNbLignes("SELECT * FROM \"libertribes\".\"COMPTE\" WHERE email = '$account_mail' and password = '$account_password' and confirmation='TRUE'") != 1 )
        {
          $iErreur += 10;
        }
      }

      // - Une erreur on doit retourné sur le formulaire
      if ( $iErreur > 0 )
      {
        header('Location: index.php?page=connexion&erreur=' . $iErreur);
        exit;
      }

      // - On récupère l'id
      $sql  = "SELECT compte_id,type_compte FROM \"libertribes\".\"COMPTE\" WHERE email = '$account_mail'";

      $result = $this->db_connexion->Requete( $sql );
      if ($result)
      {
        $row = pg_fetch_row($result);
        if ($row)
        {
          $account_id = $row[0];
          $type_compte = $row[1];
        }
        //  on spécifie alors que le joueur est online
        $sql = "UPDATE \"libertribes\".\"COMPTE\"  SET statut = 'online' where compte_id = '".$account_id."'"; 
        $this->db_connexion->Requete( $sql );
      }

		//  on charge alors les avatars et villages du joueur, une fois pour toute, pour éviter des accès trop fréquents à la BDD, ainsi que les caractéristiques des terrains possibles, le tout mis en variable de SESSION
			//  Avatars 		
			$sql  = "SELECT * FROM \"libertribes\".\"AVATAR\" WHERE compte_id = ".$account_id;
			$result = $this->db_connexion->Requete( $sql );
     		 if (isset($result)&&pg_num_rows( $result )>0)
     		 {
     		 	$avatars = array();
      			while ($row = pg_fetch_array($result)) {
      				$avatars[] = new Avatar($row);			//   NB  les villages des avatars sont inclus dans la classe
      			}
      		}
			
      // - gestion spécifique de la page
      $_SESSION['account_id']   = $account_id;
      $_SESSION['account_mail'] = $account_mail;
      $_SESSION['compte'] = $type_compte;
		if(isset($avatars)){$_SESSION['avatars'] = $avatars;}
      // - redirection vers la page d'accueil du jeu
      //parent::Afficher();
      header('Location: index.php?page=tdb');
		}
		else {
			header('Location: index.php?page=connexion&erreur=2');
			}

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>