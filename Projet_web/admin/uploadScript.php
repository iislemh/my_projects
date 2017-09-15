<?php
// Build a queryString free URL return address
if(strpos($_SERVER['HTTP_REFERER'], "?") > 0){
    $returnURL = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], "?"));
}else{
    $returnURL = $_SERVER['HTTP_REFERER'];
}
include_once('includes/conn.inc.php');
 
// Filter uploads
$filmName = filter_var($_POST['filmName'], FILTER_SANITIZE_STRING);
$filmDescription = filter_var($_POST['filmDescription'], FILTER_SANITIZE_STRING);
$filmCert = filter_var($_POST['filmCert'], FILTER_SANITIZE_STRING);
$filmPrice = filter_var($_POST['filmPrice'], FILTER_VALIDATE_FLOAT);
$filmReview =  filter_var($_POST['filmReview'], FILTER_VALIDATE_INT);
 
// Check image
$fileError = $_FILES['filmImage']['error'];
// http://php.net/manual/en/features.file-upload.errors.php
if($fileError > 0){
    header("Location:".$returnURL."?err=imgUploadError");
    exit;
}
$maxSize = 100000;
$fileType = $_FILES['filmImage']['type'];
$fileSize = $_FILES['filmImage']['size'];
$fileTempName = $_FILES['filmImage']['tmp_name'];
// 0 not error
//$fileError = $_FILES['filmImage']['error'];
$trueFileType = exif_imagetype($fileTempName);
$allowedFiles = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
if (in_array($trueFileType, $allowedFiles)) {
    if($fileSize > $maxSize){
        header("Location:".$returnURL."?err=tooBig");
        exit;
    }else{
        switch($trueFileType){
            case 1 : $fileExt  = ".gif";
            break;
            case 2: $fileExt  = ".jpg";
            break;
            case 3 : $fileExt  = ".png";
            break;
        }
    }
}else{
    header("Location:".$returnURL."?err=WrongFileType");
    exit;
}
// Get the path to upload the image to
$myPathInfo = pathinfo($_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']);
$currentDir = $myPathInfo['dirname'];
$imgDir = $currentDir . '/uploadedImages/';
// Insert the other data into the database, get the new ID and create the new filename
$stmt = $mysqli->prepare("INSERT INTO movies(filmName, filmDescription, filmPrice, filmReview) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssdi', $filmName, $filmDescription, $filmPrice, $filmReview);
$stmt->execute();
$newID = $stmt->insert_id;
$newFileName = $newID . $fileExt;
$stmt->close();
// Update the database with the new image filename
$stmt = $mysqli->prepare("UPDATE movies SET filmImage = ? WHERE filmID = ?");
$stmt->bind_param('si', $newFileName, $newID);
$stmt->execute();
$stmt->close();
// Move the file and redirect
$newImgLocation = $imgDir . $newFileName;
if(move_uploaded_file($fileTempName, $newImgLocation)){
    header("Location:".$returnURL);
}else{
    header("Location:".$returnURL."?err=UploadProb");
}
?>