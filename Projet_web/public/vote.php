<?php
session_start();

include("php/includes/database.php");

if (isset($_POST['votant']))
{
	$session = $dbh->query('SELECT * FROM cw_medias_movies WHERE id = "'.$_POST['idmovie'].'" ');
	$session->setFetchMode(PDO::FETCH_OBJ);
while ($result = $session->fetch())
	{
			$nbv = $result->nb_vote;
			$voter = $result->vote;
	}
}
$nbv++;
$totalvote = $_POST['vote'] + $voter;

$update2 = $dbh->prepare("UPDATE cw_medias_movies "
		. "SET nb_vote = :nbv, vote = :totalvote "
		. "WHERE id = ".$_POST["idmovie"]);
$update2->bindParam(":nbv", $nbv);
$update2->bindParam(":totalvote", $totalvote);
		$update2->execute();
$update2->closeCursor();
$session->closeCursor();
header('Location:movie-details.php?id='.$_POST['idmovie']);
?>


