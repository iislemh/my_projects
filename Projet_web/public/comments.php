<?php

session_start();

include("php/includes/database.php");

if (isset($_POST['coco']))
	{
	
		$req = $dbh->prepare("INSERT INTO Commentaires"
						. "(username, commentaire, date, region, id_film)"
						. "VALUES(:username, :commentaire, :date, :country, :idmovie)");
	
		$req->bindParam(":username", $_POST["username"]);
	
		$req->bindParam(":commentaire", $_POST["commentaire"]);
	
		$req->bindParam(":date", date('Y-m-d H:i:s'));
	
		$req->bindParam(":country", $_POST["region"]);

		$req->bindParam(":idmovie", $_POST["idmovie"]);
	
		$req->execute();
	}	



header('Location:movie-details.php?id=' .$_POST["idmovie"]. ' ');
?>