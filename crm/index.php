<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Spot Crm - Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

	<?php  
		include "connect.php";

		if(isset($_POST['submit']))
		{
  			$user=$_POST['name'];
  			$pass=$_POST['pass'];
			$result=mysqli_query($spot,"SELECT * FROM login WHERE Username='$user' AND Password='$pass'");
 			if(mysqli_num_rows($result)>0){
  			$_SESSION["user"] = "$user";
  			$_SESSION["pass"] = "$pass";
  			header ("location:lead.php");

		}
		else
		{  
  			echo "<script>alert('login failed');</script>" ;
		}
		}
	?>

<?php
	include "connect.php";
	if(isset($_POST['submit']))
	{
  		$user=$_POST['name'];
  		$pass=$_POST['pass'];
		$result=mysqli_query($spot,"SELECT * FROM register WHERE user='$user' AND pass='$pass'");
 		if(mysqli_num_rows($result)>0){
  		$_SESSION["user"] = "$user";
  		$_SESSION["pass"] = "$pass";
  		header ("location:lead1.php");
	}
	else
	{  
  		echo "<script>alert('login failed');</script>" ;
	}
	}

?>	

	<div class="container-fluid">
		<div class="container position-absolute top-50 start-50 translate-middle">
			<div class="row">
				<div class="col-lg-4">
				</div>
				<div class="col-lg-4 bg-light border border-warning rounded-5 p-5">
					<center><form method="post">
						<h2>Login</h2><br>
						<input type="text" name="name" class="form-control form-control-lg rounded-5" placeholder="User Name" required>
						<br>
						<input type="password" name="pass" class="form-control form-control-lg rounded-5" placeholder="Password" required>
						<br>
						<input type="submit" name="submit" value="Login" class="btn btn-success btn-lg rounded-5">
						<br><br>
					</form></center>
					<center><p><b>Don’t you have an account? <a type="button" data-bs-toggle="modal" data-bs-target="#" style="text-decoration: none; color: blue;">Sign up</a></b></p></center>
				</div>
				<div class="col-lg-4">
				</div>
			</div>
		</div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php

   if(isset($_POST['save']))
   {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $user=$_POST['user'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $conpass=$_POST['conpass'];
    $jetone=mysqli_query($spot,"INSERT INTO register (name,phone,user,mail,pass,conpass) VALUES('$name','$phone','$user','$mail','$pass','$conpass')");
    echo "<script>alert('Register Successfully');</script>" ;
    echo "<script>window.location='index.php';</script>";
   }

?>


<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
  <div class="modal-dialog rounded-5">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Registration Form</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
        <form method="post"><div class="row">
        	<div class="col-lg-6 col-md-12 mt-2">
        		<label>Name:</label>
        		<input type="text" name="name" class="form-control form-control-md rounded-5" required>
        	</div>
        	<div class="col-lg-6 col-md-12 mt-2">
        		<label>Mobile:</label>
        		<input type="text" name="phone" class="form-control form-control-md rounded-5" required>
        	</div>
        	<div class="col-lg-6 col-md-12 mt-2">
        		<label>Username</label>
        		<input type="text" name="user" class="form-control form-control-md rounded-5" required>
        	</div>
        	<div class="col-lg-6 col-md-12 mt-2">
        		<label>E-Mail:</label>
        		<input type="text" name="mail" class="form-control form-control-md rounded-5" required>
        	</div>
        	<div class="col-lg-6 col-md-12 mt-2">
        		<label>Password:</label>
        		<input type="text" name="pass" class="form-control form-control-md rounded-5" required>
        	</div>
        	<div class="col-lg-6 col-md-12 mt-2">
        		<label>Conform Password:</label>
        		<input type="text" name="conpass" class="form-control form-control-md rounded-5" required>
        	</div>
        	<input type="submit" name="save" value="Save" class="btn btn-success btn-md mt-4 rounded-5">
        </div></form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>