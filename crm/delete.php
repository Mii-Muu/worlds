<?php 
include "connect.php";

$id = $_GET['id'];
$dlt=mysqli_query($spot, "DELETE FROM lead WHERE id='$id'");
echo "<script>(window.location='lead.php');</script>";
?>