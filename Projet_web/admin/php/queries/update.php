<?php

/* connection */
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

if (isset($_POST["updateMovie"])) {
    $update = $dbh->prepare("UPDATE cw_medias_movies "
        . "SET title = :title, titleOriginal = :titleOriginal, realisator = :realisator, plot = :plot, actors = :actors, country = :country, type = :type, genre = :genre, releaseDate = :releaseDate, runningTime = :runningTime, production = :production, distribution = :distribution, language = :language, warning = :warning "
        . "WHERE id = :id");
    $update->bindParam(":id", $_POST["id"]);
    $update->bindParam(":title", $_POST["title"]);
    $update->bindParam(":titleOriginal", $_POST["titleOriginal"]);
    $update->bindParam(":realisator", $_POST["realisator"]);
    $update->bindParam(":plot", $_POST["plot"]);
    $update->bindParam(":actors", $_POST["actors"]);
    $update->bindParam(":country", $_POST["country"]);
    $update->bindParam(":type", $_POST["type"]);
    $update->bindParam(":genre", $_POST["genre"]);
    $update->bindParam(":releaseDate", $_POST["releaseDate"]);
    $update->bindParam(":runningTime", $_POST["runningTime"]);
    $update->bindParam(":production", $_POST["production"]);
    $update->bindParam(":distribution", $_POST["distribution"]);
    $update->bindParam(":language", $_POST["language"]);
    $update->bindParam(":warning", $_POST["warning"]);
    $update->execute();
}

if (isset($_POST["updateGenre"])) {
    $update = $dbh->prepare("UPDATE cw_medias_genres "
        . "SET name = :name "
        . "WHERE id = :id");
    $update->bindParam(":id", $_POST["id"]);
    $update->bindParam(":name", $_POST["name"]);
    $update->execute();
}

if (isset($_POST["updateCountry"])) {
    $update = $dbh->prepare("UPDATE cw_medias_countries "
        . "SET name = :name, abbreviation = :abbreviation "
        . "WHERE id = :id");
    $update->bindParam(":id", $_POST["id"]);
    $update->bindParam(":name", $_POST["name"]);
    $update->bindParam(":abbreviation", $_POST["abbreviation"]);
    $update->execute();
}

if (isset($_POST["updateLanguage"])) {
    $update = $dbh->prepare("UPDATE cw_medias_languages "
        . "SET name = :name, abbreviation = :abbreviation "
        . "WHERE id = :id");
    $update->bindParam(":id", $_POST["id"]);
    $update->bindParam(":name", $_POST["name"]);
    $update->bindParam(":abbreviation", $_POST["abbreviation"]);
    $update->execute();
}

if (isset($_POST["updateEmployee"])) {
    $update = $dbh->prepare("UPDATE cw_human_resources_employees "
        . "SET firstname = :firstname, lastname = :lastname, birthDate = :birthDate, sex = :sex, address = :address, city = :city, phoneHome = :phoneHome, phoneMobile = :phoneMobile, email = :email, job = :job, status = :status, password = :password, country = :country "
        . "WHERE id = '" . $_POST['id'] . "'");
    $update->bindParam(":lastname", $_POST["lastname"]);
    $update->bindParam(":firstname", $_POST["firstname"]);
    $update->bindParam(":birthDate", $_POST["birthDate"]);
    $update->bindParam(":sex", $_POST["sex"]);
    $update->bindParam(":address", $_POST["address"]);
    $update->bindParam(":city", $_POST["city"]);
    $update->bindParam(":phoneHome", $_POST["phoneHome"]);
    $update->bindParam(":phoneMobile", $_POST["phoneMobile"]);
    $update->bindParam(":email", $_POST["email"]);
    $update->bindParam(":job", $_POST["job"]);
    $update->bindParam(":status", $_POST["status"]);
    $update->bindParam(":password", $_POST["password"]);
    $update->bindParam(":country", $_POST["country"]);
    $update->execute();
}


$memberCompleteList = $dbh->query("SELECT * FROM cw_human_resources_memberships WHERE username = '" . $_POST["username"] . "'");
$memberCompleteList->setFetchMode(PDO::FETCH_OBJ);
while ($result = $memberCompleteList->fetch())
{
 $id = $result->id;
}
$memberCompleteList->closeCursor();

if (isset($_POST["updateMembership"]))
{

 $update = $dbh->prepare("UPDATE cw_human_resources_memberships "
  . "SET firstname = :firstname, lastname = :lastname, password = :password, cardNumber = :cardNumber, username = :username, sex = :sex, phoneHome = :phoneHome, phoneMobile = :phoneMobile,
  neighborhood = :neighborhood, city = :city, country = :country, email = :email, status = :status, activity = :activity, membership = :membership, newsletter = :newsletter "
  . "WHERE id = " . $id);
    $mdp = $dbh->query("SELECT * FROM cw_human_resources_memberships  WHERE id = " . $id);
    $mdp->setFetchMode(PDO::FETCH_OBJ);
while ($result = $mdp->fetch()) {
    $password = $result->password;
}

if($_POST['password'] !== $password)
{
    $update->bindParam(":password", md5($_POST["password"]));
}
 else
 {
    $update->bindParam(":password", $_POST["password"]);
 }
 $update->bindParam(":firstname", $_POST["firstname"]);
 $update->bindParam(":lastname", $_POST["lastname"]);
 $update->bindParam(":cardNumber", $_POST["cardNumber"]);
 $update->bindParam(":username", $_POST["username"]);
 $update->bindParam(":sex", $_POST["sex"]);
 $update->bindParam(":phoneHome", $_POST["phoneHome"]);
 $update->bindParam(":phoneMobile", $_POST["phoneMobile"]);
 $update->bindParam(":neighborhood", $_POST["neighborhood"]);
 $update->bindParam(":city", $_POST["city"]);
 $update->bindParam(":country", $_POST["country"]);
 $update->bindParam(":email", $_POST["email"]);
 $update->bindParam(":status", $_POST["status"]);
 $update->bindParam(":activity", $_POST["activity"]);
 $update->bindParam(":membership", $_POST["membership"]);
 $update->bindParam(":newsletter", $_POST["newsletter"]);
 $update->execute();
}

if (isset($_POST["updateTheater"])) {
    $update = $dbh->prepare("UPDATE cw_cinema_theaters "
        . "SET name = :name, numberOfPlace = :numberOfPlace, address = :address, phone = :phone, country = :country "
        . "WHERE id = :id");
    $update->bindParam(":id", $_POST["id"]);
    $update->bindParam(":name", $_POST["name"]);
    $update->bindParam(":address", $_POST["address"]);
    $update->bindParam(":phone", $_POST["phone"]);
    $update->bindParam(":numberOfPlace", $_POST["numberOfPlace"]);
    $update->bindParam(":country", $_POST["country"]);
    $update->execute();
}