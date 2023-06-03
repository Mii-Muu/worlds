<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Lead</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <?php 
    include "navbar.php";
    ?>

<?php
include "connect.php";
$my_id = isset($_GET['id']) ? $_GET['id'] : '';
if(isset($_POST['save']))
{
 $name=$_POST['name'];
 $phone=$_POST['phone'];
 $user=$_POST['user'];
 $mail=$_POST['mail'];
 $pass=$_POST['pass'];
 $jet1 = mysqli_query($spot,"UPDATE register SET name='$name',phone='$phone',user='$user',mail='$mail',pass='$pass' WHERE id='$my_id'");
 echo "<script>
 window.location='usermaster.php';</script>";
}
?>

	<?php 
		include "connect.php";
		$jets=mysqli_query($spot,"SELECT * FROM register WHERE id='$my_id'");
		$row=mysqli_fetch_array($jets);
	?>

<div class="container mt-5">
	<div class="row">
        <div class="col-lg-12">
            <div class="input-group">
                <form method="post">
                    <div class="row g-3">
                        <div class="col-3">
                            <input type="text" name="name" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Cx Name" value="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="col-3">
                            <input type="text" name="phone" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Cx Phone" value="<?php echo $row['phone']; ?>" required>
                        </div>
                        <div class="col-3">
                            <input type="email" name="mail" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Cx Mail ID" value="<?php echo $row['mail']; ?>" required>
                        </div>

                        <div class="col-3">
                            <input type="text" name="user" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Assign To" value="<?php echo $row['user']; ?>" required>
                        </div>
                        <div class="col-3">
                            <input type="text" name="pass" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Cx Needs" value="<?php echo $row['pass']; ?>" required>
                        </div>
                        <center><div class="col-3">
                            <button class="btn btn-md btn-success rounded-5" type="submit" name="save">Save</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>