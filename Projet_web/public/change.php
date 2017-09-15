<?php

// print_r($_POST);

session_start();

include("php/includes/database.php");
$_SESSION['erreur'] = "";
// echo "lera";
$firstname = $_POST['firstname'];
if ($_POST['password'] !== "")
{
	// echo "frgr <br>";
	$password = md5($_POST['password']);
}
else
{
	// echo "rrre <br>";
	$password = $_SESSION['password'];
}
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$sex = $_POST['sex'];
$phoneHome = $_POST['phoneHome'];
$phoneMobile = $_POST['phoneMobile'];
$neighborhood = $_POST['neighborhood'];
$city = $_POST['city'];
$country = $_POST['country'];
$email = $_POST['email'];
$status = $_POST['status'];
$activity = $_POST['activity'];
$membership = $_POST['membership'];
$newsletter = $_POST['newsletter'];

// echo "ancien session : " .$_SESSION['password'] . "<br>";
// echo "nouveau mdp : " . $password;
// print_r($_FILES);
// print_r($_FILES);
if($_FILES['profilpic']['name'] != "")
{

	$maxsize = 1048576;
	$maxwidth = 1000;
	$maxheight = 1000;
	if ($_FILES['profilpic']['error'] > 0)
		$_SESSION['erreur'] = "Erreur lors du transfert";
	if ($_FILES['icone']['size'] > $maxsize)
		$_SESSION['erreur'] = "Le fichier est trop gros";

	$img_extensions = array('jpg', 'jpeg', 'gif', 'png');
// //1. strrchr renvoie l'extension avec le point (« . »).
// //2. substr(chaine,1) ignore le premier caractère de chaine.
// //3. strtolower met l'extension en minuscules.
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
			$img = $nom . "." . $extension_upload;
		else
			$_SESSION['erreur'] = "Le serveur a rencontré un problème lors du transfert de l'image.";
	}
}
if($_SESSION['erreur'])
	header('Location:modification.php');
// echo $_SESSION['erreur'];
// echo $extension_upload;
if($img == "" && ($_SESSION['image'] == 'malepic.jpg' || $_SESSION['image'] == 'femalepic.jpg'))
{
	if($_POST['sex'] == 'Male')
	{
		$img = 'malepic.jpg';
	}
	else
	{
		$img = 'femalepic.jpg';
	}
}
if ($img == "")
	$img = $_SESSION['image'];
// echo "trui";
// echo $img;
$rep = $dbh->exec("UPDATE cw_human_resources_memberships SET firstname = '" . $firstname . "' , password = '". $password . "', lastname = '" . $lastname ."' , username = '" . $username . "', sex = '" . $sex . "' , phoneHome = '" . $phoneHome ."' , phoneMobile = '" . $phoneMobile ."' , neighborhood = '" . $neighborhood ."' , city = '" . $city . "' , country = '" . $country . "' , email = '" . $email . "' , membership = '" . $membership . "' , newsletter = '" . $newsletter . "', status = '". $status . "' , activity = '" . $activity ."', profile_pic = '" . $img . "' WHERE id =  '".$_SESSION['id']."' ");

// echo "yes";

$_SESSION['username'] = $_POST['username'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['sex'] = $_POST['sex'];
$_SESSION['password'] = $password;
$_SESSION['phoneHome'] = $_POST['phoneHome'];
$_SESSION['phoneMobile'] = $_POST['phoneMobile'];
$_SESSION['neighborhood'] = $_POST['neighborhood'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['country'] = $_POST['country'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['status'] = $_POST['status'];
$_SESSION['activity'] = $_POST['activity'];
$_SESSION['membership'] = $_POST['membership'];
$_SESSION['newsletter'] = $_POST['newsletter'];
$_SESSION['image'] = $img;
// echo "<br>session = " .$_SESSION['password'];
// echo "<br>rien = " . md5("");
// echo "<br>kappa = " . md5("kappa");
 // echo "beaccor";
if($_SESSION['erreur'] == "")
	header('Location:espace_membre.php');

?>