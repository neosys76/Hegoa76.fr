<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================
error_reporting(E_ALL);

    // - Function GetPageObject
    function GetPageObject($strNomPagePar)
    {
      $pageObject;
      
      switch ($strNomPagePar)
      {
        case "accueil":
          require "class_page_accueil.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageAccueil();
          break;

        case "univers":
          require "class_page_univers.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageUnivers();
          break;

        case "univers_2":
          require "class_page_univers_2.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageUnivers2();
          break;

        case "univers_3":
          require "class_page_univers_3.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageUnivers3();
          break;


        case "univers_bunsif":
          require "class_page_univers_bunsif.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageUniversBunsif();
          break;

        case "univers_humain":
          require "class_page_univers_humain.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageUniversHumain();
          break;

        case "univers_nimhsine":
          require "class_page_univers_nimhsine.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageUniversNimhsine();
          break;

        case "univers_sulmis":
          require "class_page_univers_sulmis.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageUniversSulmis();
          break;

        case "media":
          require "class_page_media.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageMedia();
          break;

        case "media_video":
          require "class_page_media_video.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageMediaVideo();
          break;

        case "media_fond":
          require "class_page_media_fond.php";                                     // - On inclut la class PageAccueil
          $pageObject = new PageMediaFond();
          break;


        case "forums":
          require "class_page_forums.php";                                      // - On inclut la class PageAccueil
          $pageObject = new PageForums();
          break;

        case "actualite":
          require "class_page_actualite.php";                                   // - On inclut la class PageActualite
          $pageObject = new PageActualite();
          break;

        case "actualite_business":
          require "class_page_actualite_business.php";                          // - On inclut la class PageActualite Business
          $pageObject = new PageActualiteBusiness();
          break;

        case "actualite_people":
          require "class_page_actualite_people.php";                            // - On inclut la class PageActualite People
          $pageObject = new PageActualitePeople();
          break;

        case "inscription":
          require "class_page_inscription.php";                                 // - On inclut la class PageInscription
          $pageObject = new PageInscription();
          break;

        case "inscription_validation":
          require "class_page_inscription_validation.php";                      // - On inclut la class PageInscriptionValidation
          $pageObject = new PageInscriptionValidation();
          break;
          
        case "inscription_confirmation":
          require "class_page_inscription_confirmation.php";                      // - On inclut la class PageInscriptionConfirmation
          $pageObject = new PageInscriptionConfirmation();
          break;

        case "newsletter":
          require "class_page_newsletter.php";                                  // - On inclut la class PageNewsletter
          $pageObject = new PageNewsletter();
          break;

        case "newsletter_validation":
          require "class_page_newsletter_validation.php";                       // - On inclut la class PageNewsletterValidation
          $pageObject = new PageNewsletterValidation();
          break;

        case "connexion":
          require "class_page_connexion.php";                                   // - On inclut la class PageConnexion
          $pageObject = new PageConnexion();
          break;

        case "connexion_validation":
          require "class_page_connexion_validation.php";                        // - On inclut la class PageConnexionValidation
          $pageObject = new PageConnexionValidation();
          break;

        case "tdb":
          require "class_page_tdb.php";                                         // - On inclut la class PageTdb
          $pageObject = new PageTdb();
          break;

        case "deconnexion":
          require "class_page_deconnexion.php";                                 // - On inclut la class PageDeconnexion
          $pageObject = new PageDeconnexion();
          break;

        case "compte":
          require "class_page_compte.php";                                      // - On inclut la class PageCompte
          $pageObject = new PageCompte();
          break;

        case "compte_validation":
          require "class_page_compte_validation.php";                           // - On inclut la class PageCompteValidation
          $pageObject = new PageCompteValidation();
          break;

        case "compte_suppression":
          require "class_page_compte_suppression.php";                          // - On inclut la class PageCompteSuppression
          $pageObject = new PageCompteSuppression();
          break;

        case "compte_suppression_validation":
          require "class_page_compte_suppression_validation.php";               // - On inclut la class PageCompteSuppressionValidation
          $pageObject = new PageCompteSuppressionValidation();
          break;


        case "djun":
          require "class_page_djun.php";                                        // - On inclut la class PageDjun
          $pageObject = new PageDjun();
          break;

        case "djun_suppression":
          require "class_page_djun_suppression.php";                            // - On inclut la class PageDjunSuppression
          $pageObject = new PageDjunSuppression();
          break;

        case "djun_suppression_validation":
          require "class_page_djun_suppression_validation.php";                 // - On inclut la class PageDjunSuppressionValidation
          $pageObject = new PageDjunSuppressionValidation();
          break;

        case "choix_djun":
          require "class_page_choix_djun.php";                                  // - On inclut la class PageChoixDjun
          $pageObject = new PageChoixDjun();
          break;

        case "choix_djun_validation":
          require "class_page_choix_djun_validation.php";                       // - On inclut la class PageChoixDjunValidation
          $pageObject = new PageChoixDjunValidation();
          break;

		  case "avatar":
          require "class_page_avatar.php";                                				// - On inclut la class PageAvatar
          $pageObject = new PageAvatar();
          break;
          
        case "avatar_histoire":
          require "class_page_avatar_histoire.php";                                				// - On inclut la class PageAvatarHistoire
          $pageObject = new PageAvatarHistoire();
          break;

        case "choix_peuple":
          require "class_page_choix_peuple.php";                                // - On inclut la class PageChoixPeuple
          $pageObject = new PageChoixPeuple();
          break;

        case "choix_peuple_validation":
          require "class_page_choix_peuple_validation.php";                     // - On inclut la class PageChoixPeupleValidation
          $pageObject = new PageChoixPeupleValidation();
          break;

        case "choix_peuple_voir":
          require "class_page_choix_peuple_voir.php";                           // - On inclut la class PageChoixPeupleVoir
          $pageObject = new PageChoixPeupleVoir();
          break;

        case "choix_peuple_voir_validation":
          require "class_page_choix_peuple_voir_validation.php";                // - On inclut la class PageChoixPeupleVoirValidation
          $pageObject = new PageChoixPeupleVoirValidation();
          break;

        case "choix_vente":
          require "class_page_choix_vente.php";                                 // - On inclut la class PageChoixVente
          $pageObject = new PageChoixVente();
          break;

        case "choix_vente_validation":
          require "class_page_choix_vente_validation.php";                      // - On inclut la class PageChoixVenteValidation
          $pageObject = new PageChoixVenteValidation();
          break;


        case "messagerie":
          require "class_page_messagerie.php";                                  // - On inclut la class PageMessagerie
          $pageObject = new PageMessagerie();
          break;

        case "messagerie_ecrire":
          require "class_page_messagerie_ecrire.php";                           // - On inclut la class PageMessagerieEcrire
          $pageObject = new PageMessagerieEcrire();
          break;

        case "messagerie_ecrire_validation":
          require "class_page_messagerie_ecrire_validation.php";                // - On inclut la class PageMessagerieEcrireValidation
          $pageObject = new PageMessagerieEcrireValidation();
          break;

        case "messagerie_lire":
          require "class_page_messagerie_lire.php";                             // - On inclut la class PageMessagerieLire
          $pageObject = new PageMessagerieLire();
          break;

        case "messagerie_supprimer":
          require "class_page_messagerie_supprimer.php";                        // - On inclut la class PageMessagerieSupprimer
          $pageObject = new PageMessagerieSupprimer();
          break;

        case "jeu":
          require "class_page_jeu.php";                                         // - On inclut la class PageJeu
          $pageObject = new PageJeu();
          break;
          
         case "charge_nouveau_panneau":
          require "class_page_charge_nouveau_panneau.php";                                         // - On inclut la class PageChargeNouveauPanneau
          $pageObject = new PageChargeNouveauPanneau();
          break;

        case "des_supplementaires":
          require "class_page_des_supplementaires.php";                                         // - On inclut la class PageDesSupplementaires
          $pageObject = new PageDesSupplementaires();
          break;

        case "compte_premium":
          require "class_page_compte_premium.php";                                         // - On inclut la class PageComptePremium
          $pageObject = new PageComptePremium();
          break;
          
        case "compte_update":
          require "class_page_compte_update.php";                                         // - On inclut la class PageCompteUpdate
          $pageObject = new PageCompteUpdate();
          break;
          
        case "actions_case":
          require "class_page_actions_case.php";                                         // - On inclut la class PageActionsCase
          $pageObject = new PageActionsCase();
          break;

        default:
          $pageObject = new Page();
          break;

      }// - Fin du switch
      return $pageObject;

    }// - Fin de la fonction GetPageObject

?>