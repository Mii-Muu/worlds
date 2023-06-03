<?php

   $to = "hr@spotworldwide.in";
   $subject = "New Customer Submission Form";
   $message = "A new Quotes form has been received.\n\n";
   $message .= "Name: " . $_POST["name"] . "\n";
   $message .= "Email: " . $_POST["mail"] . "\n";
   $message .= "Phone: " . $_POST["mobile"] . "\n";
   $message .= "Job Type: " . $_POST["type"] . "\n";
   $message .= "Location: " . $_POST["loc"] . "\n";
   $message .= "Applied For: " . $_POST["apply"];
   $headers = "From: no-reply@example.com";
   mail($to, $subject, $message, $headers);
   header("Location: carrers.html");

?>