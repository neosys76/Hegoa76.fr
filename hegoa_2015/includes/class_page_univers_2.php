<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageUnivers2 extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "univers_2","Univers - Au commencement ...");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_univers.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_univers_2.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
    	$traductions["au-commencement"] = array(
    		"fr"=>"Au commencement était ... ",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["presentation-commencement"] = array(
    		"fr"=>"Ma foi, l&#39;ami, si tu attends une réponse à cette question, je serais bien en peine de te dire ce qu&#39;il y avait au commencement, ni même s&#39;il y eut un commencement... Comment savoir ? Le monde a-t-il été créé par un Dieu unique ou par une multitude de divinités ? Est-il issu d&#39;un oeuf ou est-il lui-même un oeuf ? L&#39;univers a-t-il une origine et une finalité ou les choses ne sont-elles que l&#39;éternel recommencement du même ? Les esprits les plus perspicaces débattent sans fin de ces insondables questions... Tout ce que je peux te dire, c&#39;est qu&#39;il existe au moins deux mondes, peut-être plus... Le premier, celui qui nous abrite, nous les D&#39;juns, nous l&#39;appelons &quot;Daogad&quot;. C&#39;est un monde de pure spiritualité, les humains l&#39;appellent le monde de l&#39;invisible ou l&#39;au-delà... Le deuxième monde, celui que tu découvriras bientôt, se nomme &quot;Hégoa&quot;. C&#39;est le domaine où vivent les humains et tous les peuples de la création. Enfin, certains mystiques prétendent qu&#39;il existe encore d&#39;autres mondes, d&#39;autres niveaux d&#39;existence... Je ne sais si cette légende est fondée et si ces terres mythiques existent mais peut-être un jour aurons-nous la chance de les explorer... ",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>