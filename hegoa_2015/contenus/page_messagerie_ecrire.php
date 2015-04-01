<div class="titre">Messagerie</div>

<a class="lien_fermer" href="index.php?page=messagerie">
<img class="image_fermer" name="image_fermer" src="images/messagerie_ecrire/fermer.png" >
</a>

<form name="form_message" action="index.php?page=messagerie_ecrire_validation" method="post">

<div class="message_destinataires_label" >Destinataires :</div>
<input type="text" name="message_destinataires"  value="<?=$message_destinataires?>">

<div class="message_sujet_label" >Sujet :</div>
<input type="text" name="message_sujet" value="<?=$message_sujet?>">

<div class="message_contenu_label" >Message :</div>
<textarea name="message_contenu" rows="5" cols="50"><?=$message_contenu?></textarea>

<img class="bouton_valider" src="images/messagerie_ecrire/valider.png" name="bouton_valider" onclick="document.form_message.submit();"  >
</form>


