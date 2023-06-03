<?php

   $to = "info@spotworldwide.in";
   $subject = "New Quotes From Spot World Wide";
   $message = "A new Quotes form has been received.\n\n";
   $message .= "Name: " . $_POST["name"] . "\n";
   $message .= "Email: " . $_POST["mail"] . "\n";
   $message .= "Phone: " . $_POST["phone"] . "\n";
   $message .= "Message: " . $_POST["message"];
   $headers = "From: no-reply@example.com";
   mail($to, $subject, $message, $headers);
   header("Location: store.html");

?>