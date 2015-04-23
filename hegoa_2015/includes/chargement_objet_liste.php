<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

// - Chargement de la liste des objets

      // - On récupère les informations nécessaires
      $account_id = $_SESSION['djun_id'];
      $village_id = $_SESSION['village_id'];

      // - Initialisation
      $_SESSION['objet_id']    = array();
      $_SESSION['objet_titre'] = array();
      $_SESSION['objet_image'] = array();
      $_SESSION['objet_info']  = array();
      $_SESSION['objet_livre'] = array();
      $_SESSION['objet_is_active'] = array();


      $iCpt = 0;
      // - on stocke les messages
      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "images/jeu/objet/objet_locked.png";
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 0;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;


      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;

      $_SESSION['objet_id'][$iCpt]     = $iCpt;
      $_SESSION['objet_titre'][$iCpt]  = "titre" . $iCpt;
      $_SESSION['objet_image'][$iCpt]  = "image" . $iCpt;
      $_SESSION['objet_info'][$iCpt]   = 1;
      $_SESSION['objet_livre'][$iCpt]  = 1;
      $_SESSION['objet_actif'][$iCpt]  = 1;
      $iCpt++;


      $_SESSION['objet_compteur'] = $iCpt;
/*
      // - On charge la liste des objets (en dur pour moment )
      // - On récupère les données
      $sql  = "SELECT objet_id, titre, image, info, livre, is_active";
      $sql .= " FROM \"libertribes\".\"OBJET\"";
      $sql .= " WHERE djun_id  = $djun_id";
      $sql .= " AND village_id = $village_id";

      $result = parent::Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les batiments
          $_SESSION['objet_id'][$iCpt]     = $row[0];
          $_SESSION['objet_titre'][$iCpt]  = $row[1];
          $_SESSION['objet_image'][$iCpt]  = $row[2];
          $_SESSION['objet_info'][$iCpt]   = $row[3];
          $_SESSION['objet_livre'][$iCpt]  = $row[4];
          $_SESSION['objet_actif'][$iCpt]  = $row[5];

          $iCpt++;
        }

        $_SESSION['objet_compteur'] = $iCpt;
      }
*/
      // - Gestion du nb de pages
      $iNbPages = ceil( $_SESSION['objet_compteur'] / 8 );
      if( $iNbPages == 0 )
      {
        $iNbPages = 1;
      }

      $_SESSION['objet_nb_pages'] = $iNbPages;

      // - Gestion du no de page
      if ( ! isset($_POST['objet_no_page']) )
      {
        $_SESSION['objet_no_page'] = 1;
      }
      else
      {
        $iPage = $_POST['objet_no_page'];

        if ( $iPage < 0 )
        {
          $iPage = 1;
        }

        if ( $iPage > $iNbPages )
        {
          $iPage = $iNbPages;
        }

        $_SESSION['objet_no_page'] = $iPage;
      }
?>