<?php

   $to = "event@spotworldwide.in";
   $subject = "New Customer Submission Form";
   $message = "A new Quotes form has been received.\n\n";
   $message .= "Name: " . $_POST["name"] . "\n";
   $message .= "Class: " . $_POST["class"] . "\n";
   $message .= "Phone: " . $_POST["phone"] . "\n";
   $message .= "Reg: " . $_POST["reg"] . "\n";
   $message .= "School Name: " . $_POST["scl"] . "\n";
   $message .= "Category: " . $_POST["cat"] . "\n";
   $headers = "From: event@example.com";
   mail($to, $subject, $message, $headers);
   header("Location: event-single-1.html");

?>