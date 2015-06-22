<h2><i>Gestion des images de la galerie</i></h2>
<?php
$access=false;
if(isset($_SERVER["PHP_AUTH_USER"])){
	foreach($admin_for_media_images as $auth_user){
		if($auth_user==$_SERVER["PHP_AUTH_USER"]){
			$access=true;
			}	
	}
}
elseif(isset($_SERVER["REMOTE_USER"])){
	foreach($admin_for_media_images as $auth_user){
		if($auth_user==$_SERVER["REMOTE_USER"]){
			$access=true;
			}	
	}
}

if($access){
?>
<div id="ajout_images">
<form method="post" enctype="multipart/form-data" action="index.php?page=add_images">
<input type="file" name="image_file[]" multiple />
<input type="submit" value="Envoyer" />
</form>
</div>
<span class="clic_ajout" onclick="$('#ajout_images').show();$(this).hide();"><strong>Ajouter des images</strong></span>
<p>&nbsp;</p>
<p><strong>Liste des images</strong></p>
<?php
$dir_nom = '../images/media/images'; 
$dir = opendir($dir_nom);
while($file = readdir($dir)){
	if(substr($file,0,1)!="."){
		?>
		<div class="show_list">
			<div><img  src="<?php echo $dir_nom.'/'.$file; ?>" /></div>
			<?php echo $file; ?>
			<br/>
			<hr>
			<a class="show_list" href="effacer_image.php?nom=<?php echo $dir_nom.'/'.$file; ?>">Effacer</a> &nbsp; &nbsp;
			<a class="show_list" href="index.php?page=changer_nom_image&dir=<?php echo $dir_nom; ?>&nom=<?php echo $file; ?>">Changer nom</a>
		</div>
		<?php
	}
}
}
else {
?>
<script type="text/javascript">
alert("Vous n'avez pas les droits d'accès à cette rubrique");
window.location="./index.php";
</script>
<?php
}
?>




