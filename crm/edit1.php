<?php
session_start();
?>
<?php
$user=$_SESSION["user"];
?>
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
    include "lnavbar.php";
    ?>

<?php
include "connect.php";
$my_id = isset($_GET['id']) ? $_GET['id'] : '';
if(isset($_POST['save']))
{
 $name=$_POST['name'];
 $sdate=$_POST['sdate'];
 $phone=$_POST['phone'];
 $mail=$_POST['mail'];
 $assign=$_POST['assign'];
 $need=$_POST['need'];
 $fdate=$_POST['fdate'];
 $message=$_POST['message'];
 $jet1 = mysqli_query($spot,"UPDATE lead SET name='$name',sdate='$sdate',phone='$phone',mail='$mail',assign='$assign',need='$need',fdate='$fdate',message='$message' WHERE id='$my_id'");
 echo "<script>
 window.location='lead1.php';</script>";
}
?>

	<?php 
		include "connect.php";
		$jets=mysqli_query($spot,"SELECT * FROM lead WHERE id='$my_id'");
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
                            <input type="date" name="sdate" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Start Date" value="<?php echo $row['sdate']; ?>" required>
                        </div>
                        <div class="col-3">
                            <input type="text" name="phone" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Cx Phone" value="<?php echo $row['phone']; ?>" required>
                        </div>
                        <div class="col-3">
                            <input type="email" name="mail" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Cx Mail ID" value="<?php echo $row['mail']; ?>" required>
                        </div>

                        <div class="col-3">
                            <input type="text" name="assign" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Assign To" value="<?php echo $row['assign']; ?>" readonly>
                        </div>
                        <div class="col-3">
                            <input type="text" name="need" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Cx Needs" value="<?php echo $row['need']; ?>" required>
                        </div>
                        <div class="col-3">
                            <input type="date" name="fdate" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Follow Up" value="<?php echo $row['fdate']; ?>" required>
                        </div>

                        <div class="col-12">
                            <textarea class="border rounded-5 form-control form-control-md bg-light px-4" rows="7px" name="message" rows="3" placeholder="Message" value="<?php echo $row['message']; ?>" required><?php echo $row['message']; ?></textarea>
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