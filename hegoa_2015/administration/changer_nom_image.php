<?php
$nom = $_GET['nom'];
$dir = $_GET['dir'];
?>
<form action="index.php?page=nom_image_change">
<input type="hidden" name="dir" value="<?php echo $dir; ?>" />
<input type="hidden" name="oldname" value="<?php echo $nom; ?>" />
Nouveau nom de l'image (!! ne pas indiquer l'extension):<br/>
<input type="text" name="nom" /><br/>
<input type="submit" value="Soumettre" />
</form>
<?php
unlink($_GET['nom']);
header('Location:index.php?page=media_images');
?>