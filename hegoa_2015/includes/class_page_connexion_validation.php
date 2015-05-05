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
      // - On se connecte à la base de données
      parent::ConnecterBD();
		 include "constantes.inc.php";
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
        if ( parent::RequeteNbLignes("SELECT * FROM \"libertribes\".\"ACCOUNT\" WHERE email = '$account_mail' and password = '$account_password' and confirmation='TRUE'") != 1 )
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
      $sql  = "SELECT account_id FROM \"libertribes\".\"ACCOUNT\" WHERE email = '$account_mail'";

      $result = parent::Requete( $sql );
      if ($result)
      {
        $row = pg_fetch_row($result);
        if ($row)
        {
          $account_id = $row[0];
        }
      }

      // - gestion spécifique de la page
      $_SESSION['account_id']   = $account_id;
      $_SESSION['account_mail'] = $account_mail;

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