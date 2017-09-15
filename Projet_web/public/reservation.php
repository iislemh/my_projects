<?php
// Titre de la page
$headTitle = "Cinewax - Programmation";

// CSS de cette page
$addCSS =  array("");

// JS de cette page
$addJS =  array("");

// Queries de cette page
$addPHP = array("");
?>
<link rel="stylesheet" href="css/reserve.css">
<?php
include("php/includes/head.php");

$_SESSION['erreur'] = "";
$sessionsCompleteList = $dbh->query("SELECT s.id, m.title, m.id as idMovie,m.genre, m.realisator, m.runningTime, s.date, t.name as theater
	FROM cw_medias_movies m, cw_cinema_sessions s, cw_cinema_theaters t
	WHERE t.id = s.idTheater AND s.idMovie = m.id AND s.archive = 'false' AND s.id = '" . $_GET['id'] . "'");        
$sessionsCompleteList->setFetchMode(PDO::FETCH_OBJ);

while($result = $sessionsCompleteList->fetch())
{

	$id = $result->idMovie;
}

$id_sessions = $_GET['id'];


$sessionsCompleteList->closeCursor();


$movieDetail = $dbh->query("SELECT * FROM cw_medias_movies WHERE id = '" . $id . "'");
$movieDetail->setFetchMode(PDO::FETCH_OBJ);


while ($result = $movieDetail->fetch()) {

	$sessionDetail = $dbh->query("SELECT * FROM cw_cinema_sessions WHERE id = '" . $_GET['id'] . "'");
	$sessionDetail->setFetchMode(PDO::FETCH_OBJ);


	while ($result2 = $sessionDetail->fetch())
	{
		$date = $result2->date;
		$subtitles = $result2->subtitles;
		$nb_places = $result2->nb_place;
		$idTheater = $result2->idTheater;
		$theaterDetail = $dbh->query("SELECT * FROM cw_cinema_theaters WHERE id = '" . $idTheater . "'");
		$theaterDetail->setFetchMode(PDO::FETCH_OBJ);
		while($result3 = $theaterDetail->fetch())
		{
			$cinemaName = $result3->name;
			$adress = $result3->address;
			$countryDetail = $dbh->query("SELECT * FROM region WHERE id_region = '" . $result3->country . "'");
			$countryDetail->setFetchMode(PDO::FETCH_OBJ);
			while($result35 = $countryDetail->fetch())
			{
				$countryName = $result35->nom_region;
			}

			$countryDetail->closeCursor();
		}
		$theaterDetail->closeCursor();
		
		$languageDetail = $dbh->query("SELECT * FROM cw_medias_languages WHERE id = '" . $result2->language . "'");
		$languageDetail->setFetchMode(PDO::FETCH_OBJ);
		while($result4 = $languageDetail->fetch())
		{
			$langue = $result4->name;
		}
		$languageDetail->closeCursor();
	}

	$sessionDetail->closeCursor();


	$filenamePoster = 'resources/imgs/content/movies/'.$result->id.'Poster.jpg';

	if (file_exists($filenamePoster)) {
		$img = $filenamePoster;
	} else {
		$rand =  rand(1,2);
		$img = 'resources/imgs/content/movies/defaultPoster'.$rand.'.jpg';
	}  


	$filenameCover = 'resources/imgs/content/movies/'.$result->id.'Cover.jpg';

	if (file_exists($filenameCover)) {
		$cover = $filenameCover;
	} else {
		$rand =  rand(1,2);
		$cover = 'resources/imgs/content/movies/defaultCover'.$rand.'.jpg';
	}  


	?>

	<script>
	$(document).ready(function(){
		$(".trailer").colorbox({iframe:true, innerWidth:500, innerHeight:409});

	});
	</script>
	<div id="cover">
		<span></span>
		<img src="<?php echo $cover; ?>" alt="">

		<h2>
			<?php echo $result->title; ?>
			<span><?php echo $result->titleOriginal; ?></span>

		</h2>
		<?php if ($result->type != ""){ ?>
		<a class="trailer" href="<?php echo $result->type; ?>">Bande-Annonce</a>
		<?php } ?>
	</div>
	<div id="informations" style="margin-top:300px;">
		<div id="picture">
			<img src="<?php echo $img; ?>" alt="">
		</div>
		<div id="text">
			<div style="width:50%;">
				<ul>
					<li>
						<span class="dataTitle">Date de sortie</span>
						<span class="dataContent"><?php echo $result->releaseDate; ?></span>
					</li>
					<li>
						<span class="dataTitle">Durée</span>
						<span class="dataContent"><?php echo $result->runningTime; ?> Minutes</span>
					</li>
					<li>
						<span class="dataTitle">Genre</span>
						<span class="dataContent"><?php echo $result->genre;?></span>
					</li>
					<li>
						<span class="dataTitle">Réalisateur</span>
						<span class="dataContent"><?php echo $result->realisator; ?></span>
					</li>
					<li>
						<span class="dataTitle">Acteurs</span>
						<span class="dataContent"><?php echo $result->actors; ?></span>
					</li>
					<li>
						<span class="dataTitle">Pays de production</span>
						<span class="dataContent"><?php echo $result->country; ?></span>
					</li>
					<li>
						<span class="dataTitle">Langage de diffusion</span>
						<span class="dataContent"><?php echo $langue; ?></span>
					</li>
					<li>
						<span>Sous-titres?</span>
						<span><?php 
						if($subtitles == 'yes')
							echo "Oui";
						else
							echo "Non";
						?></span>
					</li>
					<li>
						<span class="dataPlot">Description</span>
						<span class="dataContent"><?php echo $result->plot; ?></span>
					</li>
					<li>
						<span>Cinéma</span>
						<span><?php echo $cinemaName; ?></span>
					</li>
					<li>
						<span>Adresse</span>
						<span><?php echo $adress; ?></span>
					</li>
					<li>
						<span>Horaire</span>
						<span><?php echo $date; ?></span>
					</li>
					<li>
						<span>Nombre de places restantes</span>
						<span><?php 
						if ($nb_places > 0)
							echo $nb_places; 
						else
							echo "Complet";
						?>
					</span>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php if ($_SESSION['email'])
{
	if ($nb_places > 0)
	{
		echo '	<div id="reservation">
		<form method="post" action="reserver.php">
		<fieldset>
		<legend>Reservation</legend>
		<br/>
		<label for="places">Nombres de places :</label>
		<select name="places">
		<option value="1">1</option>';
		if($nb_places > 1)
		{
			echo '<option value="2">2</option>';
			if($nb_places > 2)
			{
				echo '<option value="3">3</option>';
				if($nb_places > 3)
				{
					echo '<option value="4">4</option>';
					if($nb_places > 4)
					{
						echo '<option value="5">5</option>';
						if($nb_places > 5)
						{
							echo '<option value="6">6</option>';
							if($nb_places > 6)
							{
								echo '<option value="7">7</option>';
								if($nb_places > 7)
								{		
									echo '<option value="8">8</option>';
									if($nb_places > 8)
									{
										echo '<option value="9">9</option>';
										if($nb_places > 9)
										{
											echo '<option value="10">10</option>';
										}
									}
								}
							}
						}
					}
				}
			}
		}

		echo '</select><br/>
		<input type="hidden" name="movie" value="'.$id.'" />
		<input type="hidden" name="theater" value="'.$idTheater.'" />
		<input type="hidden" name="member" value="'.$_SESSION['id'].'" />
		<input type="hidden" name="session" value="'.$id_sessions.'" />
		<br/>
		<input type="submit" name="envoie" value="Valider" />
		</fieldset>
		</form>
		</div>';
	}
}
?>

<?php

}

$movieDetail->closeCursor();

?> 
<?php
include("php/includes/scripts.php");
?>

</body>
</html>