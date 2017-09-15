<?php
$dataBaseHost = 'localhost';
$dataBaseName = 'cinewax; charset=utf8';
$dataBaseUser = 'root';
$dataBasePassword = 'codecamp';

try {
    $dbh = new PDO('mysql:host=' . $dataBaseHost . ';dbname=' . $dataBaseName, $dataBaseUser, $dataBasePassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST["archiveMovie"])) {
    $insert = $dbh->prepare("UPDATE cw_medias_movies SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}

if (isset($_POST["archiveGenre"])) {
    $insert = $dbh->prepare("UPDATE cw_medias_genres SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}

if (isset($_POST["archiveCountry"])) {
    $insert = $dbh->prepare("UPDATE cw_medias_countries SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}

if (isset($_POST["archiveLanguage"])) {
    $insert = $dbh->prepare("UPDATE cw_medias_languages SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}

if (isset($_POST["archiveEmployee"])) {
    $insert = $dbh->prepare("UPDATE cw_human_resources_employees SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}

if (isset($_POST["archiveMembership"])) {
    $insert = $dbh->prepare("UPDATE cw_human_resources_memberships SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}

if (isset($_POST["archiveTheater"])) {
    $insert = $dbh->prepare("UPDATE cw_cinema_theaters SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}

if (isset($_POST["archiveSession"])) {
    $insert = $dbh->prepare("UPDATE cw_cinema_sessions SET archive = 'true' WHERE id = :id");
    $insert->bindParam(":id", $_POST["id"]);
    $insert->execute();
}