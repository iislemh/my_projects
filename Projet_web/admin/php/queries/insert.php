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
 *  Use your research tool to find the queries and form that need to be taking care of.
 */


/*
 *  I .  Connection to DataBase
 */
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

/*
 * II.  Medias
 *      1.  Movies 
 */

if (isset($_POST["insertMovie"])) {    
    $insert = $dbh->prepare("INSERT INTO cw_medias_movies"
            . "(title,titleOriginal,realisator,plot,actors,country,type,genre,releaseDate,runningTime,production,distribution,language,warning)"
            . " VALUES(:title,:titleOriginal,:realisator,:plot,:actors,:country,:type,:genre,:releaseDate,:runningTime,:production,:distribution,:language,:warning)");
    $insert->bindParam(":title", $_POST["title"]);
    $insert->bindParam(":titleOriginal", $_POST["titleOriginal"]);
    $insert->bindParam(":realisator", $_POST["realisator"]);
    $insert->bindParam(":plot", $_POST["plot"]);
    $insert->bindParam(":actors", $_POST["actors"]);
    $insert->bindParam(":country", $_POST["country"]);
    $insert->bindParam(":type", $_POST["type"]);
    $insert->bindParam(":genre", $_POST["genre"]);
    $insert->bindParam(":releaseDate", $_POST["releaseDate"]);
    $insert->bindParam(":runningTime", $_POST["runningTime"]);
    $insert->bindParam(":production", $_POST["production"]);
    $insert->bindParam(":distribution", $_POST["distribution"]);
    $insert->bindParam(":language", $_POST["language"]);
    $insert->bindParam(":warning", $_POST["warning"]);
    $insert->execute();
}

/*
 *      2.  TV Shows
 */

// NEED TO BE DONE

/*
 *      3.  Genres
 */

if (isset($_POST["insertGenre"])) {

    $insert = $dbh->prepare("INSERT INTO cw_medias_genres"
            . "(name)"
            . " VALUES(:name)");
    $insert->bindParam(":name", $_POST["name"]);
    $insert->execute();
}

/*
 *      4.  Countries
 */

if (isset($_POST["insertCountry"])) {
   
    $insert = $dbh->prepare("INSERT INTO cw_medias_countries"
            . "(name,abbreviation)"
            . " VALUES(:name,:abbreviation)");
    $insert->bindParam(":name", $_POST["name"]);
    $insert->bindParam(":abbreviation", $_POST["abbreviation"]);
    $insert->execute();
}

/*
 *      5.  Langages
 */

if (isset($_POST["insertLanguage"])) {

    $insert = $dbh->prepare("INSERT INTO cw_medias_languages"
            . "(name,abbreviation)"
            . " VALUES(:name,:abbreviation)");
    $insert->bindParam(":name", $_POST["name"]);
    $insert->bindParam(":abbreviation", $_POST["abbreviation"]);
    $insert->execute();
}

/*
 * III. Human Resources
 *      1.  Members
 */

if (isset($_POST["InsertMembersOrSubscribers"])) {
    $_POST["cardNumber"] = "0"; // Pas de numero de compte pour l'instant

    $insert = $dbh->prepare("INSERT INTO cw_human_resources_memberships"
            . "(firstname,lastname,password,cardNumber,username,sex,phoneHome,phoneMobile,neighborhood,city,country,email,status,activity,membership,newsletter)"
            . " VALUES(:firstname,:lastname,:password,:cardNumber,:username,:sex,:phoneHome,:phoneMobile,:neighborhood,:city,:country,:email,:status,:activity,:membership,:newsletter)");
    $insert->bindParam(":firstname", $_POST["firstname"]);
    $insert->bindParam(":lastname", $_POST["lastname"]);
    $insert->bindParam(":password", md5($_POST["password"]));
    $insert->bindParam(":cardNumber", $_POST["cardNumber"]);
    $insert->bindParam(":username", $_POST["username"]);
    $insert->bindParam(":sex", $_POST["sex"]);
    $insert->bindParam(":phoneHome", $_POST["phoneHome"]);
    $insert->bindParam(":phoneMobile", $_POST["phoneMobile"]);
    $insert->bindParam(":neighborhood", $_POST["neighborhood"]);
    $insert->bindParam(":city", $_POST["city"]);
    $insert->bindParam(":country", $_POST["country"]);
    $insert->bindParam(":email", $_POST["email"]);
    $insert->bindParam(":status", $_POST["status"]);
    $insert->bindParam(":activity", $_POST["activity"]);
    $insert->bindParam(":membership", $_POST["membership"]);
    $insert->bindParam(":newsletter", $_POST["newsletter"]);
    $insert->execute();
}

/*
 *          a.  Status
 */

// NTBD

/*
 *      2.  Employees
 */

if (isset($_POST["insertEmployee"])) {
    
    $insert = $dbh->prepare("INSERT INTO cw_human_resources_employees"
            . "(lastname,firstname,birthDate,sex,address,city,phoneHome,phoneMobile,email,job,status,password,country)"
            . " VALUES(:lastname,:firstname,:birthDate,:sex,:address,:city,:phoneHome,:phoneMobile,:email,:job,:status,:password,:country)");
    $insert->bindParam(":lastname", $_POST["lastname"]);
    $insert->bindParam(":firstname", $_POST["firstname"]);
    $insert->bindParam(":birthDate", $_POST["birthDate"]);
    $insert->bindParam(":sex", $_POST["sex"]);
    $insert->bindParam(":address", $_POST["address"]);
    $insert->bindParam(":city", $_POST["city"]);
    $insert->bindParam(":phoneHome", $_POST["phoneHome"]);
    $insert->bindParam(":phoneMobile", $_POST["phoneMobile"]);
    $insert->bindParam(":email", $_POST["email"]);
    $insert->bindParam(":job", $_POST["job"]);
    $insert->bindParam(":status", $_POST["status"]);
    $insert->bindParam(":password", $_POST["password"]);
    $insert->bindParam(":country", $_POST["country"]);
    $insert->execute();
}
    
/*
 *          a.  Status
 */

/*
 *          b.  Jobs
 */

/*
 *  * IV.  The Theaters
 *      1.  Sessions (movies' sessions)
 */

$theaterCompleteList =  $dbh->query("SELECT * FROM cw_cinema_theaters WHERE archive = 'false' AND id = '" . $_POST['idTheater'] . "'");
$theaterCompleteList -> setFetchMode(PDO::FETCH_OBJ);
while ($result = $theaterCompleteList->fetch())
{
    $places = $result->numberOfPlace;
}
$theaterCompleteList->closeCursor();
if (isset($_POST["insertSession"])) {

$insert = $dbh->prepare("INSERT INTO cw_cinema_sessions"
        . "(idMovie, idTheater,date,language,subtitles, nb_place)"
        . " VALUES(:idMovie, :idTheater, :date, :language, :subtitles, :nb_place)");
$insert->bindParam(":idMovie", $_POST["idMovie"]);
$insert->bindParam(":idTheater", $_POST["idTheater"]);
$insert->bindParam(":date", $_POST["date"]);
$insert->bindParam(":language", $_POST["language"]);
$insert->bindParam(":subtitles", $_POST["subtitles"]);
$insert->bindParam(":nb_place", $places);
$insert->execute();
}


/*
 *      2.  Theaters (locations)
 */


if (isset($_POST["insertTheater"])) {
    $_POST["cardNumber"] = "0"; // Pas de numero de compte pour l'instant

    $insert = $dbh->prepare("INSERT INTO cw_cinema_theaters"
            . "(name,numberOfPlace,address,phone,country)"
            . " VALUES(:name,:numberOfPlace,:address,:phone,:country)");
    $insert->bindParam(":name", $_POST["name"]);
    $insert->bindParam(":numberOfPlace", $_POST["numberOfPlace"]);
    $insert->bindParam(":address", $_POST["address"]);
    $insert->bindParam(":phone", $_POST["phone"]);
    $insert->bindParam(":country", $_POST["country"]);
    $insert->execute();
}


/*
 * V.   Tools
 *      1.  Cash Register
 */

// NTBD

 /* 
 *      2.  Statistics
 */

// NTBD

 /* 
 *      3.  Newsletter
 */

// NTBD

 /* 
 *      4.  History
 */

// NTBD

 /*
 *      5.  Cloud
 */ 

// NTBD

