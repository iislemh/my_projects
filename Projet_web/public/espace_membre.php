
<?php
require_once("php/includes/head.php");

?>

<link rel="stylesheet" href="css/membre.css">

<?php if (isset($_SESSION['id'])) {
   echo '<img src="resources/profilpic/' . $_SESSION['image'] . '" alt="titi" class="imgprofil" />';}
   ?>

<div class="infos">
   <?php
   if(!isset($_SESSION['id']))
   {
      echo "<p style='font-size: 300%; text-align: center;'>Vous n'avez pas les droits d'afficher cette page.<br>
      Veuillez cliquer sur l'image pour retourner sur l'accueil.</p>
      <br><br>
      <a href='index.php'><img src='https://knightslol.org/images/403_Error.png' style='width:100%'></img></a>";
   }
   else
   {
      echo 	  'Prenom : ' . $_SESSION['firstname'] . '<br /> 
      <br />
      Nom : ' . $_SESSION['lastname'] . '<br /> 
      <br />
      Login : ' . $_SESSION['username'] . '<br /> 
      <br />
      Sexe : ' . $_SESSION['sex'] . '<br /> 
      <br />
      Numéro de domicile : ' .$_SESSION['phoneHome'] . '<br />
      <br />
      Numéro de portable : ' .$_SESSION['phoneMobile'] . '<br />
      <br />
      Quartier : ' . $_SESSION['neighborhood'] .'<br /> 
      <br />
      Ville : ' . $_SESSION['city'] . '<br /> 
      <br />
      Email : ' . $_SESSION['email'] . '<br />
      <br />
      Statut : ' . $_SESSION['status'] . '<br />
      <br />
      Activité : ' . $_SESSION['activity'] . ' 


      <br /> 
      <br />  		
      <form method="post" action="modification.php">
      <input type="submit" value="Modifier" class="marre" />
      </form>
      </div>   	

      <br />
      <br />

      <form action="programmation.php" />
      <input type="submit" value="Faire une reservation" class="marre2" />
      </form>';
   }
   ?>