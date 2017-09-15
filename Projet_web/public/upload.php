<?php
session_start();


$maxsize = 1048576;
$maxwidth = 500;
$maxheight = 500;
if ($_FILES['profilpic']['error'] > 0)
	$_SESSION['erreur'] = "Erreur lors du transfert";
if ($_FILES['profilpic']['size'] > $maxsize)
	$_SESSION['erreur'] = "Le fichier est trop gros";

$img_extensions = array('jpg', 'jpeg', 'gif', 'png');
$extension_upload = strtolower(substr(strrchr($_FILES['profilpic']['name'], '.'), 1));
if (!in_array($extension_upload,$img_extensions))
{
	$_SESSION['erreur'] = "Extension incorrecte";
}
$image_size = getimagesize($_FILES['profilpic']['tmp_name']);
if ($image_size[0] > $maxwidth OR $image_size[1] > $maxheight)
	$_SESSION['erreur'] = "Image trop grande";
if(!$_SESSION['erreur'])
{
	$nom = "photo_" . $_SESSION['id'];

	$dir = "resources/profilpic/";
	$truepath = $dir . $nom . "." . $extension_upload;

	$resultat = move_uploaded_file($_FILES['profilpic']['tmp_name'],$truepath);
	if ($resultat)
		echo "Done";
	else
		$_SESSION['erreur'] = "Le serveur a rencontré un problème lors du transfert de l'image.";
}
if($_SESSION['erreur'])
	echo $_SESSION['erreur'];
?>
