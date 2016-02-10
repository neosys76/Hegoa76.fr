<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageUnivers3 extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "univers_3","Univers - Le Mana, nectar des D'juns");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_univers.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_univers_3.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
    public function getTraductions(){
    	$traductions["au-commencement-suite"] = array(
    		"fr"=>"Au commencement était ... (suite)",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["presentation-commencement-suite"] = array(
    		"fr"=>"Ce que nous sommes... Tu viens de t&#39;éveiller, tu es encore déboussolé et tu ne sais même pas qui tu es, c&#39;est naturel. Laisse-moi donc t&#39;en dire plus sur notre peuple. Nous sommes les D&#39;juns, les &quot;Esprits&quot; comme disent les humains. Nous sommes les plus anciennes formes de conscience à avoir parcouru le monde - du moins à ma connaissance. Nous sommes le souffle vital, l&#39;âme de toute chose, la force intangible qui anime chaque élément de la création : l&#39;arbre, l&#39;épée, les nuages, l&#39;homme, le scorpion... Nous sommes là pour assurer et stimuler la vitalité des êtres auxquels nous sommes liés. Nous sommes des légions mais bien peu ont, comme toi, la chance d&#39;être lié avec une forme de vie consciente d&#39;elle-même. En effet, tu es appelé à guider la destinée d&#39;un clan, à conseiller et protéger l&#39;une des nombreuses tribus d&#39;Hégoa. Pourquoi devrais-tu assumer cette tâche ? Mais tout simplement parce que ta propre destinée en dépend. Pour mieux me faire comprendre, il faut que je m&#39;attarde sur cette denrée si précieuse à nos yeux : le Mana. ",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>