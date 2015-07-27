<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageChoixDjun extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_djun","Choix du D'jun");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );

      $this->AjouterCSS("page_choix_djun.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_choix_djun.php");

      // - on ajoute les menus utiles
      //   pas de menu
    }

    // - Affichage de la page
    public function Afficher()
    {
    	if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
      	//   on détermine le nombre d'images associées aux D'juns 
      		if(!isset($_SESSION['avatar_djun_images'])||empty($_SESSION['avatar_djun_images'])){
      			$dir_images = getcwd()."/images/djuns/";
      			$handle = opendir($dir_images);
      			$nombre_images=0;
      			$pattern = "/^djun[0-9]{1,3}.png$/";
      			while($file=readdir($handle)){
      				if($file!="."&&$file!=".."&&!is_dir($dir_images.$file)&&preg_match($pattern,$file)>0){$nombre_images++;}
      			}
      			$_SESSION['avatar_djun_images'] = $nombre_images;
      		}
	
	      parent::Afficher();
		}
		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}

    }// - Fin de la fonction Afficher

}// - Fin de la classe

?>