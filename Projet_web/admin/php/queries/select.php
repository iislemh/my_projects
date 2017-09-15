<?php

/*
 * SUMMARY
 * 
 * I .  Connection to DataBase
 * 
 * II.  Medias
 *      1.  Movies 
 *      2.  TV Shows
 *      3.  Genres
 *      4.  Countries
 *      5.  Langages
 * 
 * III. Human Resources
 *      1.  Members
 *          a.  Status
 *      2.  Employees
 *          a.  Status
 *          b.  Jobs
 * IV.  The Theaters
 *      1.  Sessions (movies' sessions)
 *      2.  Theaters (locations) 
 * V.   Tools
 *      1.  Cash Register
 *      2.  Statistics
 *      3.  Newsletter
 *      4.  History
 *      5.  Cloud
 * 
 *  "NTBD" = Need to be done.
 *  Use your research tool to find the queries and form that need to be taking care of.
 */

/*
 * II.  Medias
 *      1.  Movies 
 */

//  All movies and their infos  

$moviesCompleteList = $dbh->query("SELECT * FROM cw_medias_movies WHERE archive = 'false'");
$moviesCompleteList->setFetchMode(PDO::FETCH_OBJ);

// /*
//  *  All movies' title
//  */

$moviesTitleList = $dbh->query("SELECT title FROM cw_medias_movies WHERE archive = 'false'");
$moviesTitleList->setFetchMode(PDO::FETCH_OBJ);

// /*
//  *  Affiche film precis
//  */

$movieInformations = $dbh->query("SELECT * FROM cw_medias_movies");
$movieInformations->setFetchMode(PDO::FETCH_OBJ);

// /*
//  *      2.  TV Shows
//  */

// // NEED TO BE DONE

// /*
//  *      3.  Genres
//  */

$genresList = $dbh->query("SELECT name, id FROM cw_medias_genres WHERE archive = 'false'");
$genresList->setFetchMode(PDO::FETCH_OBJ);

$genresListAdd = $dbh->query("SELECT name, id FROM cw_medias_genres WHERE archive = 'false'");
$genresListAdd->setFetchMode(PDO::FETCH_OBJ);

$genresListModification = $dbh->query("SELECT name, id FROM cw_medias_genres WHERE archive = 'false'");
$genresListModification->setFetchMode(PDO::FETCH_OBJ);

$genresCompleteLists = $dbh->query("SELECT count(m.title) as moviesCount, g.name as genre
	FROM cw_medias_movies m, cw_medias_genres g
	WHERE m.genre = g.name
	GROUP BY g.name");
$genresCompleteLists->setFetchMode(PDO::FETCH_OBJ);


/*
 *      4.  Countries
 */

$countriesCompleteList = $dbh->query("SELECT * FROM cw_medias_countries  WHERE archive = 'false'");
$countriesCompleteList->setFetchMode(PDO::FETCH_OBJ);

$countriesListAdd = $dbh->query("SELECT name FROM cw_medias_countries  WHERE archive = 'false'");
$countriesListAdd->setFetchMode(PDO::FETCH_OBJ);

$countriesListModification = $dbh->query("SELECT name FROM cw_medias_countries  WHERE archive = 'false'");
$countriesListModification->setFetchMode(PDO::FETCH_OBJ);

// /*
//  *      5.  Langages
//  */


$languageCompleteList =  $dbh->query("SELECT * FROM cw_medias_languages  WHERE archive = 'false'");
$languageCompleteList -> setFetchMode(PDO::FETCH_OBJ);


// /*
//  * III. Human Resources
//  *      1.  Members
//  */

$statusListAdd= $dbh->query("SELECT name FROM cw_human_resources_memberships_status  WHERE archive = 'false'");
$statusListAdd->setFetchMode(PDO::FETCH_OBJ);

$statusListModification= $dbh->query("SELECT name FROM cw_human_resources_memberships_status  WHERE archive = 'false'");
$statusListModification->setFetchMode(PDO::FETCH_OBJ);

$activityListAdd= $dbh->query("SELECT name FROM cw_human_resources_memberships_activity  WHERE archive = 'false'");
$activityListAdd->setFetchMode(PDO::FETCH_OBJ);

$activityListModification= $dbh->query("SELECT name FROM cw_human_resources_memberships_activity  WHERE archive = 'false'");
$activityListModification->setFetchMode(PDO::FETCH_OBJ);


// /*
//  *  Liste complete des inscrits  
//  */

if($_SESSION['auth']['job'] == 1)
{
	$membershipsCompleteList =  $dbh->query("SELECT * FROM cw_human_resources_memberships  WHERE archive = 'false'");
	$membershipsCompleteList -> setFetchMode(PDO::FETCH_OBJ);
}
else
{
	$membershipsCompleteList =  $dbh->query("SELECT * FROM cw_human_resources_memberships  WHERE archive = 'false' AND country= '" . $_SESSION['auth']['country'] . "'");
	$membershipsCompleteList -> setFetchMode(PDO::FETCH_OBJ);
}

// /*
//  *          a.  Status
//  */

// // NTBD

// /*
//  *      2.  Employees
//  */

// /*
//  *  Liste complete des inscrits  
//  */

if($_SESSION['auth']['job'] == 1)
{
	$employeesCompleteList = $dbh->query("SELECT * FROM cw_human_resources_employees  WHERE archive = 'false'");
	$employeesCompleteList->setFetchMode(PDO::FETCH_OBJ);	
}
else
{
	$employeesCompleteList = $dbh->query("SELECT * FROM cw_human_resources_employees  WHERE archive = 'false' AND country= '" . $_SESSION['auth']['country'] . "'");
	$employeesCompleteList->setFetchMode(PDO::FETCH_OBJ);
}
// /*
//  *  Liste complete des inscrits  
//  */

$employeeStatusListAdd = $dbh->query("SELECT * FROM cw_human_resources_employees_status  WHERE archive = 'false'");
$employeeStatusListAdd->setFetchMode(PDO::FETCH_OBJ);

$employeeStatusListModification = $dbh->query("SELECT * FROM cw_human_resources_employees_status  WHERE archive = 'false'");
$employeeStatusListModification->setFetchMode(PDO::FETCH_OBJ);


if($_SESSION['auth']['job'] == 1)
{
	$employeeRegionListAdd = $dbh->query("SELECT * FROM region");
	$employeeRegionListAdd->setFetchMode(PDO::FETCH_OBJ);
}
else
{
	$employeeRegionListAdd = $dbh->query("SELECT * FROM region WHERE id_region = '" . $_SESSION['auth']['country'] . "'");
	$employeeRegionListAdd->setFetchMode(PDO::FETCH_OBJ);
}

$employeeRegionListModification = $dbh->query("SELECT * FROM region");
$employeeRegionListModification->setFetchMode(PDO::FETCH_OBJ);

// /*
//  *          a.  Status
//  */

// /*
//  *          b.  Jobs
//  */

// /*
//  *  * IV.  The Theaters
//  *      1.  Sessions (movies' sessions)
//  */

if ($_SESSION['auth']['job'] == 1)
{
	$sessionsCompleteList = $dbh->query("SELECT s.id, m.title, m.runningTime, s.date, t.name as theater
		FROM cw_medias_movies m, cw_cinema_sessions s, cw_cinema_theaters t
		WHERE t.id = s.idTheater AND s.idMovie = m.id AND s.archive = 'false'");        
	$sessionsCompleteList->setFetchMode(PDO::FETCH_OBJ);

	$theatersCompleteList = $dbh->query("SELECT name, id FROM cw_cinema_theaters WHERE archive = 'false'");      
	$theatersCompleteList->setFetchMode(PDO::FETCH_OBJ);


	$languagesCompleteList = $dbh->query("SELECT name, id FROM cw_medias_languages WHERE archive = 'false'");      
	$languagesCompleteList->setFetchMode(PDO::FETCH_OBJ);
}
else
{
	$sessionsCompleteList = $dbh->query("SELECT s.id, m.title, m.runningTime, s.date, t.name as theater
		FROM cw_medias_movies m, cw_cinema_sessions s, cw_cinema_theaters t
		WHERE t.id = s.idTheater AND s.idMovie = m.id AND s.archive = 'false' AND t.country = '" . $_SESSION['auth']['country'] . "'");        
	$sessionsCompleteList->setFetchMode(PDO::FETCH_OBJ);

	$theatersCompleteList = $dbh->query("SELECT name, id FROM cw_cinema_theaters WHERE archive = 'false'");      
	$theatersCompleteList->setFetchMode(PDO::FETCH_OBJ);


	$languagesCompleteList = $dbh->query("SELECT name, id FROM cw_medias_languages WHERE archive = 'false'");      
	$languagesCompleteList->setFetchMode(PDO::FETCH_OBJ);
}


// /*
//  *      2.  Theaters (locations)
//  */
if($_SESSION['auth']['job'] == 1)
{
	$theaterCompleteList =  $dbh->query("SELECT * FROM cw_cinema_theaters WHERE archive = 'false'");
	$theaterCompleteList -> setFetchMode(PDO::FETCH_OBJ);
}
else
{
	$theaterCompleteList =  $dbh->query("SELECT * FROM cw_cinema_theaters WHERE archive = 'false' AND country= '" . $_SESSION['auth']['country'] . "' ");
	$theaterCompleteList -> setFetchMode(PDO::FETCH_OBJ);
}






// /*
//  * V.   Tools
//  *      1.  Cash Register
//  */

// // NTBD

//  /* 
//  *      2.  Statistics
//  */

// // NTBD

//  /* 
//  *      3.  Newsletter
//  */

// // NTBD

//  /* 
//  *      4.  History
//  */

// // NTBD

//  /*
//  *      5.  Cloud
//  */ 

// // NTBD

// ?>