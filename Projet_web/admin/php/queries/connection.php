<?php    
$dataBaseHost = 'localhost';
$dataBaseName = 'cinewax; charset=utf8';
$dataBaseUser = 'root';
$dataBasePassword = 'codecamp';
try{
    $dbh = new PDO('mysql:host='.$dataBaseHost.';dbname='.$dataBaseName, $dataBaseUser, $dataBasePassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
//    echo 'Connected to Database<br/>';
        
        
    }
catch(PDOException $e)
{
    echo $e->getMessage();
}
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
//    require_once 'inc/db.php';
    $req = $dbh->prepare('SELECT lastname,firstname,password,birthDate, sex, address, city, phoneHome, phoneMobile, email, job, status, country FROM  cw_human_resources_employees WHERE email = :email');
    $req->bindParam(":email", $email);
    $req->execute();
 $results = $req->fetch(PDO::FETCH_ASSOC);
 if(count($results) > 0 && $password == $results['password'] && $results['job'] >= 1){
    $_SESSION['auth']['email']      = $email;
    $_SESSION['auth']['firstname']  = $results['firstname'];
    $_SESSION['auth']['lastname']   = $results['lastname'];
    $_SESSION['auth']['birthDate']  = $results['birthDate'];
    $_SESSION['auth']['sex']        = $results['sex'];
    $_SESSION['auth']['address']    = $results['address'];
    $_SESSION['auth']['city']       = $results['city'];
    $_SESSION['auth']['phoneHome']  = $results['phoneHome'];
    $_SESSION['auth']['phoneMobile']= $results['phoneMobile'];
    $_SESSION['auth']['job']        = $results['job'];
    $_SESSION['auth']['status']     = $results['status'];
    $_SESSION['auth']['country']     = $results['country'];
    session_start();
    header('location:../../home.php');
 }else{
     header('location:../../index.php');
 }
}
?>