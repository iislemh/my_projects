<?php
include("php/includes/database.php");
// Titre de la page
$headTitle = "Admin - Caisse";
$pageTitle = "Caisse";

// CSS de cette page
$addCSS = array("");

// JS de cette page
$addJS = array("js/form/languages.js");


// PHP (queries) de cette page
$addPHP = array("queries/select");

include("php/includes/head.php");
include("php/includes/navigator.php");
?>



<main>
	<!--Titre-->
	<div id="titleAndFilter">
		<h2><?php echo $pageTitle; ?></h2>
	</div>


	<div id="table">
		<table class="tablesaw" data-tablesaw-sortable data-tablesaw-mode="stack">
			<thead>
				<tr>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="background-color:#232b2d">Pseudo</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Film</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Cinéma</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$caisse = $dbh->query("SELECT * FROM places_vendues");
				$caisse->setFetchMode(PDO::FETCH_OBJ);
				while ($result = $caisse->fetch()) {
					echo '<tr>';
					$test = $dbh->query("SELECT * FROM cw_human_resources_memberships WHERE id = '" . $result->id_utilisateur . "'");
					$test->setFetchMode(PDO::FETCH_OBJ);
						while($r = $test->fetch())
						{
							echo '<td>' . $r->username . '</td>';
						}
					$oui = $dbh->query("SELECT * FROM cw_medias_movies WHERE id = '" . $result->id_film . "'");
					$oui->setFetchMode(PDO::FETCH_OBJ);
					while($a = $oui->fetch())
					{
						echo '<td>' . $a->title . '</td>';
					}
					$non = $dbh->query("SELECT * FROM cw_cinema_theaters WHERE id = '" . $result->id_cinema . "'");
					$non->setFetchMode(PDO::FETCH_OBJ);
					while($b = $non->fetch())
					{
						echo '<td>' . $b->name . '</td>';
					}
					echo '<td>' . $result->date_vente . '</td></tr>';
					
				}

				?>

			</tbody>
		</table>
	</div>
</main>





<script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>