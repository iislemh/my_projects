<?php

$countMediasMovies = $dbh->query("SELECT count(id) as count FROM cw_medias_movies");
$countMediasMovies ->setFetchMode(PDO::FETCH_OBJ);
    
$countMediasGenres = $dbh->query("SELECT count(id) as count FROM cw_medias_genres");
$countMediasGenres ->setFetchMode(PDO::FETCH_OBJ);
    
$countMediasCountries = $dbh->query("SELECT count(id) as count FROM cw_medias_countries");
$countMediasCountries ->setFetchMode(PDO::FETCH_OBJ);
    
$countMediasLanguages = $dbh->query("SELECT count(id) as count FROM cw_medias_languages");
$countMediasLanguages ->setFetchMode(PDO::FETCH_OBJ);
    
$countHRMemberships = $dbh->query("SELECT count(id) as count FROM cw_human_resources_memberships");
$countHRMemberships ->setFetchMode(PDO::FETCH_OBJ);
    
$countHREmployees = $dbh->query("SELECT count(id) as count FROM cw_human_resources_employees");
$countHREmployees ->setFetchMode(PDO::FETCH_OBJ);
    
$countCinemaTheaters = $dbh->query("SELECT count(id) as count FROM cw_cinema_theaters");
$countCinemaTheaters ->setFetchMode(PDO::FETCH_OBJ);
    
$countCinemaSessions = $dbh->query("SELECT count(id) as count FROM cw_cinema_sessions WHERE archive='false'");
$countCinemaSessions ->setFetchMode(PDO::FETCH_OBJ);
        
?> 