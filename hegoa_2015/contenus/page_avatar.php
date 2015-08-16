<div class="titre">Avatar</div>


<div class="avatar_cadres">
<?php
if(isset($message)&&!empty($message)){
?>
<div class="message">
<?php
echo $message;
?>
</div>
<?php
}
?>
  <div class="avatar_index_libelle"><?php echo $les_traductions["index_agressivite"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->agressivite; ?></div>
<div class="clearfix"></div>
  <div class="avatar_index_libelle"><?php echo $les_traductions["index_efficacite"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->efficacite; ?></div>
<div class="clearfix"></div>
  <div class="avatar_index_libelle"><?php echo $les_traductions["index_escroquerie"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->escroquerie; ?></div>
<div class="clearfix"></div>
  <div class="avatar_index_libelle"><?php echo $les_traductions["index_commerce"][$_SESSION['lang']]; ?></div>
  <div class="avatar_index_valeur"><?php echo $_SESSION['djun_choisi']->commerce; ?></div>
<div class="clearfix"></div>
</div>

<div class="avatar_cadres">

    <div class="avatar_index_libelle"><?php echo $les_traductions["nom"][$_SESSION['lang']]; ?></div>
    <div class="avatar_index_libelle colvert1"><?php echo $_SESSION['djun_choisi']->nom; ?></div>
<div class="clearfix"></div>
    <div class="avatar_index_libelle"><?php echo $les_traductions["peuple"][$_SESSION['lang']]; ?></div>
    <div class="avatar_index_libelle colvert1"><?php echo $_SESSION['djun_choisi']->race; ?></div>
	<?php
		if(isset($guilde)&&!empty($guilde)){
	 ?>
    <div class="avatar_guilde_libelle"><?php echo $les_traductions["guilde"][$_SESSION['lang']]; ?></div>
    <div class="avatar_guilde"><?php echo $guilde; ?></div>
	<?php
    	}
	?>
</div>
<div class="avatar_cadres">
  <form action="index.php?page=avatar_histoire" method="post">
    <div class="avatar_histoire_libelle"><?php echo $les_traductions["mon_histoire"][$_SESSION['lang']]; ?></div>
    <div class="avatar_histoire_valeur"><textarea rows="5" cols="50" name="histoire"><?php if(isset($_SESSION["djun_choisi"]->histoire)&&!empty($_SESSION["djun_choisi"]->histoire)){echo $_SESSION["djun_choisi"]->histoire;} ?></textarea></div>

    <input type="submit" value="Valider">
  </form>
</div>


