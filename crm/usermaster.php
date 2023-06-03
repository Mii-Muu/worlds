<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leads</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<style>
  		table,th,td
  		{
   	 		border-radius: 50px;
    		text-align: center;
  		}
	</style>
</head>
<body>

	<?php 
	include "navbar.php";
	?>

	<div class="continer-fluid">
		<div class="container mt-5">
			<input type="button" data-bs-toggle="modal" data-bs-target="#register" value="+ New User" class="btn btn-sm btn-outline-success rounded-5 mx-1">
		</div>
		<br>
		<div class="container">
    		<h2 style="border-bottom: 2px solid black;">User Masters</h2>
    		<table class="table table-success bg-opacity-75 table-striped">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Mobile</th>
					<th scope="col">Mail ID</th>
					<th scope="col">Username</th>
					<th scope="col">Password</th>
					<th scope="col">Edit</th>
				</tr>
				<?php
                include "connect.php";
                $i=1;
                $jet=mysqli_query($spot,"SELECT * FROM register");
                while($row = mysqli_fetch_array($jet))
                { 
                ?>
   				<tr>
					<td class="text-center"><?php echo $i++ ?></td>
					<td class="text-center"><?php echo $row['name'];?></td>
					<td class="text-center"><?php echo $row['phone'];?></td>
					<td class="text-center"><?php echo $row['mail'];?></td>
					<td class="text-center"><?php echo $row['user'];?></td>
					<td class="text-center"><?php echo $row['pass'];?></td>
					<td class="text-center"><button type="button" class="btn btn-sm btn-success rounded-5" onclick="location.href='uedit.php?id=<?php echo $row['id'];?>'">Edit</button>
    					<button type="button" class="btn btn-sm btn-secondary rounded-5" onclick="location.href='udelete.php?id=<?php echo $row['id'];?>'">Delete</button></td>
				</tr>
				<?php 
        			}
      			?>
			</table>
		</div>
	</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
   include "connect.php";
   if(isset($_POST['save']))
   {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $user=$_POST['user'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $jetone=mysqli_query($spot,"INSERT INTO register (name,phone,user,mail,pass) VALUES('$name','$phone','$user','$mail','$pass')");
    echo "<script>window.location='usermaster.php';</script>";
   }

?>

<!-- Full Screen Lead Entry -->
    <div class="modal fade" id="register" tabindex="-1">
        <div class="modal-dialog modal-fullscreen rounded-5">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center mb-5">
                    <div class="container">
                    	<div class="section-title position-relative mb-5">
                            <center><h2 class="fw-bold text-primary text-uppercase text-success">New Lead</h2></center>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <form method="post">
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <input type="text" name="name" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Name" required>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" name="phone" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Phone" required>
                                            </div>
                                            <div class="col-4">
                                                <input type="email" name="mail" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Mail ID" required>
                                            </div>

                                            <div class="col-4">
                                                <input type="text" name="user" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Username" required>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" name="pass" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Password" required>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->