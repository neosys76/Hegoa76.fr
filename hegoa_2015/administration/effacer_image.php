<?php
unlink($_GET['nom']);
header('Location:index.php?page=media_images');
?>