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