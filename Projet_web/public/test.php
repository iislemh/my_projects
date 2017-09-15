<!DOCTYPE html>
<html>

<head>
  <title>Our Company</title>
</head>

<body>
<?php $_SESSION['id'] = "1"; ?>
  <form method="post" action="upload.php" enctype="multipart/form-data">
     <label for="profilpic">Fichier (JPG, JPEG, GIF ou PNG | max. 1 Mo) :</label><br />
     <input type="file" name="profilpic" id="profilpic" /><br />
     <input type="submit" name="submit" value="Envoyer" />
</form> 
<?php echo $_SESSION['erreur']; ?>

</body>
</html>

