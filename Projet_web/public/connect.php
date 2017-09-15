<?php

session_start();

include("php/includes/database.php");
if (isset($_POST["InsertMembersOrSubscribers"])) {
    $_POST["cardNumber"] = "0"; // Pas de numero de compte pour l'instant
  
        if($_POST['sex'] == 'Male')
            $defaultpic = 'malepic.jpg';
        else
            $defaultpic = 'femalepic.jpg';
        $mdp = md5($_POST['password']);
        $insert = $dbh->prepare("INSERT INTO cw_human_resources_memberships"
            . "(firstname,lastname,password,cardNumber,username,sex,phoneHome,phoneMobile,neighborhood,city,country,email,status,activity,membership,newsletter, profile_pic)"
            . " VALUES(:firstname,:lastname,:password,:cardNumber,:username,:sex,:phoneHome,:phoneMobile,:neighborhood,:city,:country,:email,:status,:activity,:membership,:newsletter, :pic)");
        $insert->bindParam(":firstname", $_POST["firstname"]);
        $insert->bindParam(":lastname", $_POST["lastname"]);
        $insert->bindParam(":password", $mdp);
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
        $insert->bindParam(":pic", $defaultpic);
        $insert->execute();

        $moviesCompleteList = $dbh->query('SELECT * FROM cw_human_resources_memberships WHERE email = "' . $_POST['email'] . '" ');
        $moviesCompleteList->setFetchMode(PDO::FETCH_OBJ);
        while ($result = $moviesCompleteList->fetch())
        {
            $_SESSION['username'] = $result->username;
            $_SESSION['id'] = $result->id;
            $_SESSION['firstname'] = $result->firstname;
            $_SESSION['lastname'] = $result->lastname;
            $_SESSION['password'] = $result->password;
            $_SESSION['caddNumber'] = $result->cardNumber;
            $_SESSION['sex'] = $result->sex;
            $_SESSION['phoneHome'] = $result->phoneHome;
            $_SESSION['phoneMobile'] = $result->phoneMobile;
            $_SESSION['neighborhood'] = $result->neighborhood;
            $_SESSION['city'] = $result->city;
            $_SESSION['country'] = $result->country;
            $_SESSION['email'] = $result->email;
            $_SESSION['status'] = $result->status;
            $_SESSION['activity'] = $result->activity;
            $_SESSION['membership'] = $result->membership;
            $_SESSION['newsletter'] = $result->newsletter;
            $_SESSION['archive'] = $result->archive;
            $_SESSION['image'] = $result->profile_pic;
            header('Location: index.php');
        }
    

}


?>

