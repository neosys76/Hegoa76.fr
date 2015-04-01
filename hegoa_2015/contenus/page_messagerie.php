<div class="titre">Messagerie</div>

<a class="lien_fermer" href="index.php?page=jeu">
<img class="image_fermer" name="image_fermer" src="images/messagerie/fermer.png" >
</a>



<?php
echo "<div class=\"onglet_" . $_SESSION['messages_type'] ."\">";
?>
<a class="lien_ajouter" href="index.php?page=messagerie_ecrire"><img class="image_ajouter" name="image_ajouter" src="images/messagerie/ajouter.png" ></a>
<a class="lien_receive" href="index.php?page=messagerie&type=receive">Re&ccedil;us</a>
<a class="lien_send" href="index.php?page=messagerie&type=send">Envoy&eacute;s</a>
<a class="lien_delete" href="index.php?page=messagerie&type=delete">Supprim&eacute;s</a>
</div>

<?php

$iNbMessage = $_SESSION['message_compteur'];

  echo "<div class=\"contenu_messagerie\">\n";

  echo "<div id=\"bouton_prev\">\n";
  echo "<img class=\"image_prev\" src=\"images/messagerie/prev.png\" name=\"messagerie_prev\" onclick=\"document.formMessagerie.messagerie_action.value='prev';document.formMessagerie.submit();\">";
  echo "</div>\n";

  echo "<div class=\"liste_message\">\n";


// - On affiche la liste des messages
for($i = 0; $i < $iNbMessage; $i++)
{
  // - on récupère les infos
  $message_id =  $_SESSION['message_id'][$i];

  // - On formate le code html
  if ( $i % 2 == 0 )
  {
    echo " <div class=\"message\">\n";
  }
  else
  {
    echo " <div class=\"message interligne\">\n";
  }

  // - Gestion du type de message (Recu/Envoyé)
  if ($_SESSION['message_type'][$i] == 1 )
  {
    //echo "  <img class=\"message_type\" src=\"images/messagerie/message_in.png\" name=\"message_type\">\n";
    // - Gestion de l'indicateur de lecture
    if ( $_SESSION['message_is_read'][$i] == 1 )
    {
      //echo "  <img class=\"message_is_read\" src=\"images/messagerie/message_read.png\" name=\"message_is_read\">\n";
      echo "  <img class=\"message_type\" src=\"images/messagerie/message_read.png\" name=\"message_type\">\n";
    }
    else
    {
      //echo "  <img class=\"message_is_read\" src=\"images/messagerie/message_not_read.png\" name=\"message_is_read\">\n";
      echo "  <img class=\"message_type\" src=\"images/messagerie/message_not_read.png\" name=\"message_type\">\n";
    }
  }
  else
  {
    echo "  <img class=\"message_type\" src=\"images/messagerie/message_out.png\" name=\"message_type\">\n";
  }

  // - Gestion de la date d'envoi
  echo "<span class=\"message_date_envoi\">";
  echo $_SESSION['message_date_envoi'][$i];
  echo "</span>\n";

  // - Gestion de l'objet du message
  echo "<a class=\"message_object\" href=\"index.php?page=messagerie_lire&no_message=$message_id\">";
  echo $_SESSION['message_object'][$i];
  echo "</a>\n";

  // - Gestion de l'objet du message
  echo "<a class=\"message_delete\" href=\"index.php?page=messagerie_supprimer&no_message=$message_id\">";
  echo "<img class=\"image_message_delete\" src=\"images/messagerie/message_delete.png\" name=\"messagerie_delete\">";
  echo "</a>\n";


  echo " </div>\n";// message
}

  echo "</div>\n";// liste_message

  echo "<div id=\"bouton_next\">\n";
  echo "<img class=\"image_next\" src=\"images/messagerie/next.png\" name=\"messagerie_next\" onclick=\"document.formMessagerie.messagerie_action.value='next';document.formMessagerie.submit();\">";
  echo "</div>\n";

  echo "<div id=\"numerotation\">\n";
  echo "1 / 1";
  echo "</div>\n";

  echo "</div>\n";// contenu_messagerie

?>
