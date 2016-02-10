<?php
// ======================================================================
// Auteur : Donatien CELIA, Dominique Dehareng
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageChoixPeupleVoir extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "choix_peuple_voir","Présentation des peuples");
      parent::SetAffichageHeader( 1 );
      parent::SetAffichageMenu( 0 );
      parent::SetAffichageFooter( 0 );
      
      //  les traductions spécifiques
      $this->traductions = $this->getTraductions();

      $this->AjouterCSS("page_choix_peuple_voir.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_choix_peuple_voir.php");

      // - on ajoute les menus utiles

    }

    // - Affichage de la page
    public function Afficher()
    {
		if(isset($_SESSION["compte"])&&!empty($_SESSION["compte"])){
   		   parent::Afficher();
   		}
   		else {
			header('Location: index.php?page=connexion&erreur=3');
			exit;
		}

    }// - Fin de la fonction Afficher
    
        public function getTraductions(){
        	$traductions["titre_choix"] = array(
    		"fr"=>"Choisir un peuple: Description",
    		"en"=>"Choose a race: Description",
    		"es"=>"",
    		"de"=>""
    		);
    		$traductions["choix_description_bunsif"] = array(
				"fr"=>"À l&#39;origine, les Bunsifs étaient des machines, créées par les Naelys afin de se libérer de certaines tâches. Contrôlés par les Naelys grâce à la conscience commune, celle-ci permit aux Bunsifs de passer du statut de machines serviles à celui de machines douées d'intelligence. Selon la légende, l'extinction des Naelys permit aux Bunsifs de se libérer du joug de la conscience commune, et ainsi d&#39;acquérir une véritable indépendance. Naturellement résistants car composés de silice, leur corps est recouvert de cristaux qui agissent comme récepteurs et émetteurs d&#39;ondes, leur permettant ainsi de communiquer entre eux. Leur coeur est animé par une réaction nucléaire, celle-ci confère aux Bunsifs une telle longévité que nul ne parvient à la mesurer. Bien qu&#39;ils maîtrisent tous les langages, les Bunsifs préfèrent vivre entre eux. Malgré tout, bâtisseurs dans l&#39;âme ils aiment participer à la réalisation de grands édifices. Fins stratèges militaires, cette qualité compense une certaine sensibilité à la magie.",
				"en"=>"",
				"es"=>"",
				"de"=>""
			);
			$traductions["choix_description_humain"] = array(
				"fr"=>"Le peuple humain est le premier à avoir habité Hégoa. Ils ressemblent aux humains que nous connaissons mis à part leurs tatouages fait de Cyniam. Ils sont réalisés comme ceux du premier homme qui a été en relation avec le Djun \"Gjiure\". Leur Djun leur permet de contrôler leurs technologies, qui associent la mécanique et la nature grâce à la magie produite par le Cyniam, et leur enseignent comment le trouver ainsi que l&#39;exploiter. Lors de leurs recherches avec les Bunsifs pour dégeler Hégoa, ils ont créé des animaux, \"les Bélims\". Un Bélim cale sa gestation avec celle de son maître pour que leur enfant voit le jour en même temps et ainsi unir leurs destins. Ils vivent dans des huttes solides, en bois ou en pierre, qui se fondent dans la nature. Leur société est régie par les anciens qui vont partager leurs expériences et leurs savoirs avec les nouvelles générations. Ils maîtrisent la magie.",
				"en"=>"",
				"es"=>"",
				"de"=>""
			);
			$traductions["choix_description_sulmis"] = array(
				"fr"=>"Nés d&#39;une incantation magique, les Sulmis apparaissent au monde sur les ruines du massacre perpétré par le terrible \"Nilbrock\". De grande taille, ces êtres à la croisée de l&#39;homme et du scorpion, extrêmement résistants grâce à la carapace qui les enveloppe, sont pourvus d'une queue qui s&#39;avère être une arme redoutable. Ils communiquent grâce à leurs mandibules et aux capteurs olfactifs disséminés sous leur carapace. De par leur histoire, les Sulmis exècrent la violence bien qu'ils n&#39;hésitent pas à se défendre, préférant ainsi utiliser la diplomatie dans les conflits. C&#39;est un peuple qui voue sa vie à la connaissance : férus d'histoire, de philosophie et de politique, leur organisation en castes développe et enrichit les talents de chacun. Les Sulmis terminent leur vie par la rédaction d&#39;ouvrages qui relatent leurs vécus et leurs expériences. Attachés à la spiritualité, ils croient en Molsrreft, \"celui qui est, celui qui offre\".",
				"en"=>"",
				"es"=>"",
				"de"=>""
			);
			$traductions["choix_description_nimhsines"] = array(
				"fr"=>"Lors de l&#39;Eqyast, les humains et les Sulmis ont été contraints de se retrancher dans les souterrains d&#39;Hégoa. Dans leur laboratoire, ils ont cherché une solution pour dégeler leur planète et vont réussir à créer un végétal intelligent : les Nimhsinés. Elles sont fertiles et très résistantes aux intempéries. Leur faiblesse est d&#39;être frêles physiquement. Malgré un aspect différent selon leur graine d'origine, elles ont deux particularités communes : une grande main avec cinq doigts acérés ainsi que des racines afin de se mouvoir et d&#39;extraire le Cyniam pour sa magie. Pour se reproduire, deux Nimhsinés se pollinisent et enterrent la graine fécondée. Sa germination va dégeler Hégoa. Elles communiquent oralement. Leur nature sauvage leur donne la réputation d'être agressives et virulentes. Elles vivent dans le respect et l'obéissance de leurs aînés. Leur science du vivant leur permet de faire pousser leur habitat.",
				"en"=>"",
				"es"=>"",
				"de"=>""
			);

			return $traductions;
        	
        }

}// - Fin de la classe

?>