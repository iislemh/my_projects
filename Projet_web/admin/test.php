<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
   <link rel="stylesheet" type="text/css" href="style.css" />
   <title> titre </title>
</head>
<body>
    <?php

$dataBaseHost = 'localhost';
$dataBaseName = 'cinewax; charset=utf8';
$dataBaseUser = 'root';
$dataBasePassword = 'codecamp';
try{
    $dbh = new PDO('mysql:host='.$dataBaseHost.';dbname='.$dataBaseName, $dataBaseUser, $dataBasePassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line   
    }
catch(PDOException $e)
{
    echo $e->getMessage();
}

//     $_POST['password'] = "salaud";
//     $_POST["firstname"] = "oui";
//     $_POST["lastname"] = "non";
//     $_POST["cardNumber"] = 0;
//     $_POST["username"] = "fefe";
// $_POST["sex"] = "Male";
// $_POST["phoneHome"] = "0107";
// $_POST["phoneMobile"] = "74707";
// $_POST["neighborhood"] = "fef";
// $_POST["city"] = "fewf";
// $_POST["country"] = "1";
// $_POST["email"] = "faasq@r.fr";
// $_POST["status"] = "fe";
// $_POST["activity"] = "few";
// $_POST["membership"] = "Member";
// $_POST["newsletter"] = "Yes";

// $update = $dbh->prepare("UPDATE cw_human_resources_memberships "
//   . "SET firstname = :firstname, lastname = :lastname, password = :password, cardNumber = :cardNumber, username = :username, sex = :sex, phoneHome = :phoneHome, phoneMobile = :phoneMobile,
//   neighborhood = :neighborhood, city = :city, country = :country, email = :email, status = :status, activity = :activity, membership = :membership, newsletter = :newsletter "
//   . "WHERE id = 28");
// $mdp = $dbh->query("SELECT * FROM cw_human_resources_memberships  WHERE id = 28");
// $mdp->setFetchMode(PDO::FETCH_OBJ);
// while ($result = $mdp->fetch()) {
//     $password = $->password;
// }

// if($_POST['password'] !== $password)
// {
//     $update->bindParam(":password", md5($_POST["password"]));
// }
// else
// {
//     $update->bindParam(":password", $_POST["password"]);
// }
// $update->bindParam(":firstname", $_POST["firstname"]);
// $update->bindParam(":lastname", $_POST["lastname"]);
// $update->bindParam(":cardNumber", $_POST["cardNumber"]);
// $update->bindParam(":username", $_POST["username"]);
// $update->bindParam(":sex", $_POST["sex"]);
// $update->bindParam(":phoneHome", $_POST["phoneHome"]);
// $update->bindParam(":phoneMobile", $_POST["phoneMobile"]);
// $update->bindParam(":neighborhood", $_POST["neighborhood"]);
// $update->bindParam(":city", $_POST["city"]);
// $update->bindParam(":country", $_POST["country"]);
// $update->bindParam(":email", $_POST["email"]);
// $update->bindParam(":status", $_POST["status"]);
// $update->bindParam(":activity", $_POST["activity"]);
// $update->bindParam(":membership", $_POST["membership"]);
// $update->bindParam(":newsletter", $_POST["newsletter"]);
// $update->execute();
// echo "done";
?>
</body>
</html>


<!-- 
$moviesCompleteList = $dbh->query("SELECT * FROM cw_human_resources_memberships WHERE username = '" . $_POST["username"] . "'");
// $moviesCompleteList->setFetchMode(PDO::FETCH_OBJ);
// while ($result = $moviesCompleteList->fetch())
// {
//    $id = $result->id;
// }
// $moviesCompleteList->closeCursor();




//     // $update = $dbh->prepare("update INTO cw_human_resources_memberships"
//     //         . "(firstname,lastname,password,cardNumber,username,sex,phoneHome,phoneMobile,neighborhood,city,country,email,status,activity,membership,newsletter)"
//     //         . " VALUES(:firstname,:lastname,:password,:cardNumber,:username,:sex,:phoneHome,:phoneMobile,:neighborhood,:city,:country,:email,:status,:activity,:membership,:newsletter)");
//     // $update->bindParam(":firstname", $_POST["firstname"]);
//     // $update->bindParam(":lastname", $_POST["lastname"]);
//     // $update->bindParam(":password", $_POST["password"]);
//     // $update->bindParam(":cardNumber", $_POST["cardNumber"]);
//     // $update->bindParam(":username", $_POST["username"]);
//     // $update->bindParam(":sex", $_POST["sex"]);
//     // $update->bindParam(":phoneHome", $_POST["phoneHome"]);
//     // $update->bindParam(":phoneMobile", $_POST["phoneMobile"]);
//     // $update->bindParam(":neighborhood", $_POST["neighborhood"]);
//     // $update->bindParam(":city", $_POST["city"]);
//     // $update->bindParam(":country", $_POST["country"]);
//     // $update->bindParam(":email", $_POST["email"]);
//     // $update->bindParam(":status", $_POST["status"]);
//     // $update->bindParam(":activity", $_POST["activity"]);
//     // $update->bindParam(":membership", $_POST["membership"]);
//     // $update->bindParam(":newsletter", $_POST["newsletter"]);
//     // $update->execute(); -->