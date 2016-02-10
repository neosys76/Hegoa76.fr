<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageUnivers extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "univers","L'Univers du Jeu");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_univers.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_univers.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
      parent::Afficher();
    }// - Fin de la fonction Afficher
    
	public function getTraductions(){
    	$traductions["bienvenue-sur-hegoa"] = array(
    		"fr"=>"Bienvenue sur les terres d&#39;&nbsp;Hégoa",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["presentation-libertribes"] = array(
    		"fr"=>"&quot;LiberTribes - Les Tribus d&#39;Hégoa&quot; est un MMORPG médiéval fantastique, orienté gestion et stratégie, où les joueurs incarnent un &quot;D&#39;jun&quot;, l&#39;esprit protecteur d&#39;une tribu. Que le D&#39;jun préside à la destinée d&#39;une tribu d&#39;Humains, de Nimhsinés, de Bunsif ou de Sulmis, cet étrange peuple d&#39;hommes-scorpions, l&#39;enjeu est le même : assurer la survie et la croissance de son clan. Expansion territoriale, développement culturel, sorcellerie, commerce, diplomatie ou combat, tous les moyens sont bons pour garantir la prospérité de sa tribu.",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	$traductions["qui-es-tu"] = array(
    		"fr"=>"Qui es-tu?",
    		"en"=>"Who are you?",
    		"es"=>"¿Quién eres?",
    		"de"=>"Wer sind Sie?"
    	);
    	$traductions["salutations-qui-es-tu"] = array(
    		"fr"=>"Je te salue, l&#39;ami, et te souhaite la bienvenue parmi nous. Te voici sur le point de franchir le seuil qui mène vers les terres d&#39;Hégoa, aussi, permets-moi de te conter l&#39;histoire de ces contrées que tu vas explorer sous peu. Comment ? Tu ne sais pas qui je suis ? Mais je suis un D&#39;jun bien sûr, tout comme toi ! Tu vas me dire que tu ignores ce qu&#39;est un D&#39;jun... Bien. Si je dois t&#39;initier aux secrets d&#39;Hégoa, autant commencer par le commencement, ou presque... ",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	
    	return $traductions;
    }

}// - Fin de la classe

?>