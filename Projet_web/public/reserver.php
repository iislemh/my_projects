<?php

print_r($_GET['id']);

include("php/includes/database.php");

		$moviesTitleList = $dbh->query("SELECT nb_entrees FROM cw_medias_movies WHERE id = ".$_POST["movie"]);
		$moviesTitleList->setFetchMode(PDO::FETCH_OBJ);

		while ($result = $moviesTitleList->fetch()) {
			$nb = $result->nb_entrees;
		}

		// $moviesPlace = $dbh->query('SELECT nb_place FROM cw_cinema_sessions WHERE id = "'.$_POST['session'].'" ');
		// $moviesPlace->setFetchMode(PDO::FETCH_OBJ);

		// while ($result2 = $moviesPlace->fetch()) {
		// 	$nbp = $result2->nb_place;
		// }

$session = $dbh->query('SELECT * FROM cw_cinema_sessions WHERE id = "'.$_POST['session'].'" ');
$session->setFetchMode(PDO::FETCH_OBJ);
while ($result = $session->fetch())
{
	$nb_places = $result->nb_place;
}

$session->closeCursor();

$i = 0;

while ($i < $_POST['places'])
 {
	if (isset($_POST['envoie']))
	{
	
		$req = $dbh->prepare("INSERT INTO places_vendues"
						. "(id_film, id_cinema, date_vente, id_utilisateur, id_session)"
						. "VALUES(:movie, :theater, :date, :member, :session)");
	
		$req->bindParam(":movie", $_POST["movie"]);
	
		$req->bindParam(":theater", $_POST["theater"]);
	
		$req->bindParam(":date", date('Y-m-d H:i:s'));
	
		$req->bindParam(":member", $_POST["member"]);

		$req->bindParam(":session", $_POST["session"]);
	
		$req->execute();
	}
		$nb++;
		$i++;
		$nb_places--;
	
 }

 $update2 = $dbh->prepare("UPDATE cw_cinema_sessions "
		. "SET nb_place = :nb_places "
		. "WHERE id = ".$_POST["session"]);
		$update2->bindParam(":nb_places", $nb_places);
		$update2->execute();
$session->closeCursor();

$update = $dbh->prepare("UPDATE cw_medias_movies "
		. "SET nb_entrees = :nb "
		. "WHERE id = ".$_POST["movie"]);
		$update->bindParam(":nb", $nb);
		$update->execute();
$moviesTitleList->closeCursor();

header('Location:programmation.php');

?>