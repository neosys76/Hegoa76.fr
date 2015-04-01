<div class="titre">Messagerie</div>

<a class="lien_fermer" href="index.php?page=messagerie">
<img class="image_fermer" name="image_fermer" src="images/messagerie_lire/fermer.png" >
</a>

<?php
  if ($_SESSION['messagerie_lire_is_read'] == "1" )
  {
?>
    <img class="message_is_read" name="message_is_read" src="images/messagerie_lire/message_read.png" >
<?php
  }
  else
  {
?>
    <img class="message_is_read" name="message_is_read" src="images/messagerie_lire/message_not_read.png" >
<?php
  }
?>

<div class="message_object" ><?=$_SESSION['messagerie_lire_object']?></div>
<div class="message_date_envoi" ><?=$_SESSION['messagerie_lire_date_envoi']?></div>
<div class="message_heure_envoi" ><?=$_SESSION['messagerie_lire_heure_envoi']?></div>

<div class="message_message" ><?=$_SESSION['messagerie_lire_message']?></div>

