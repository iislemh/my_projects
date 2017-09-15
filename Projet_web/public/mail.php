<?php
     $to      = "boissi_h@etna-alternance.net";
     $subject = "Test";
     $message = "Je suis Charlie";
     // $headers = 'From: ladressemailtresbelle@gmail.com' . "\r\n" .
     // 'Reply-To: ladressemailtresbelle@gmail.com' . "\r\n" .
     // 'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message);

     header('Location:test.php');
 ?>