<?php
include "connect.php";
?>
<?php
session_start();
?>
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
			<input type="button" data-bs-toggle="modal" data-bs-target="#register" value="Add New" class="btn btn-sm btn-outline-success rounded-5 mx-1">
			<input type="button" data-bs-toggle="modal" data-bs-target="#import" value="Import" class="btn btn-sm btn-outline-warning rounded-5 mx-1">
		</div>
		<div class="container mt-3">
			<input type="button" data-bs-toggle="modal" data-bs-target="#follow" value="Today Follows" class="btn btn-sm btn-outline-danger rounded-5 mx-1">
			<input type="submit" data-bs-toggle="modal" data-bs-target="#month" value="This Month" class="btn btn-sm btn-outline-secondary rounded-5 mx-1">
		</div>
		<br>

<?php

if(isset($_POST['filter']))
{
$search = $_POST['search'];
$query = "SELECT * FROM `lead` WHERE CONCAT(`id`,`name`, `phone`, `need`) LIKE '%".$search."%' ";
$sresult = filterTable($query);
} 
else
{
$query = "SELECT * FROM lead";
$sresult = filterTable($query);
}

function filterTable($query)
{
include "connect.php";
$fresult = mysqli_query($spot, $query);
return $fresult;
}

?>

		<div class="container-fluid">
    		<h2 style="border-bottom: 2px solid black;">Leads</h2>
    		<form method="post">
    			<div style="float: right;">
    			<input type="text" name="search" class="rounded-5 p-1" placeholder="Search Here..." required>
    			<input type="submit" name="filter" value="Search" class="btn btn-warning btn-sm rounded-5">
    			</div>
    		<br><br>
			<table class="table table-success bg-opacity-75 table-striped">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Cx Name</th>
					<th scope="col">Date</th>
					<th scope="col">Mobile</th>
					<th scope="col">Mail ID</th>
					<th scope="col">Assign</th>
					<th scope="col">Cx Needs</th>
					<th scope="col">Followups</th>
					<th scope="col">Description</th>
					<th scope="col">Edit</th>
				</tr>
				<?php
				$i=1;
				$jet=mysqli_query($spot,"SELECT * FROM lead ORDER BY id DESC");
   				while($row = mysqli_fetch_array($sresult))
   				{
   				?>
				<tr>
					<td class="text-center"><?php echo $i++ ?></td>
					<td class="text-center"><?php echo $row['name'];?></td>
					<td class="text-center"><?php echo $row['sdate'];?></td>
					<td class="text-center"><?php echo $row['phone'];?></td>
					<td class="text-center"><?php echo $row['mail'];?></td>
					<td class="text-center"><?php echo $row['assign'];?></td>
					<td class="text-center"><?php echo $row['need'];?></td>
					<td class="text-center"><?php echo $row['fdate'];?></td>
					<td class="text-center"><?php echo $row['message'];?></td>
					<td class="text-center"><button type="button" class="btn btn-sm btn-success rounded-5" onclick="location.href='edit.php?id=<?php echo $row['id'];?>'">Edit</button>
    					<button type="button" class="btn btn-sm btn-secondary rounded-5" onclick="location.href='delete.php?id=<?php echo $row['id'];?>'">Delete</button></td>
				</tr>
				<?php 
        			}
      			?>
			</table>
			</form>
		</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
include "connect.php";
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
 $jetone=mysqli_query($spot,"INSERT INTO lead (name,sdate,phone,mail,assign,need,fdate,message) VALUES('$name','$sdate','$phone','$mail','$assign','$need','$fdate','$message')");
 echo "<script>
 window.location='lead.php';</script>";
}
?>

<!-- Full Screen Lead Entry -->
    <div class="modal fade" id="register" tabindex="-1">
        <div class="modal-dialog modal-fullscreen rounded-5">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="container">
                    	<div class="section-title position-relative mb-5">
                            <center><h2 class="fw-bold text-primary text-uppercase text-success">New Lead</h2></center>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <form method="post">
                                        <div class="row g-3">
                                            <div class="col-3">
                                                <input type="text" name="name" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Cx Name" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="date" name="sdate" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Start Date" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" name="phone" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Cx Phone" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="email" name="mail" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Cx Mail ID" required>
                                            </div>

                                            <div class="col-3">
                                                <input type="text" name="assign" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Assign To" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" name="need" class="border rounded-5 form-control form-control-md bg-light px-4" placeholder="Cx Needs" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="date" name="fdate" class="border rounded-5 form-control form-control-md  bg-light px-4" placeholder="Follow Up" required>
                                            </div>

                                            <div class="col-12">
                                                <textarea class="border rounded-5 form-control form-control-md bg-light px-4" rows="7px" name="message" rows="3" placeholder="Message" required></textarea>
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

    <!-- Import -->

    <!-- Modal -->
		<div class="modal fade" id="import" tabindex="-1" aria-labelledby="importLabel" aria-hidden="true">
	  		<div class="modal-dialog rounded-5">
	    		<div class="modal-content">
	      			<div class="modal-body p-5">
	        			<form method="post"><div class="row">
	        			<div class="col-lg-12 col-md-12 mt-2">
	        				<label>Import</label>
	        				<input type="file" name="name" class="form-control form-control-md rounded-5" required>
	        			</div>
	        			<center><div class="col-lg-6 col-md-12 mt-2">
	        				<input type="submit" name="save" value="Upload" class="btn btn-success btn-md mt-4 rounded-5">
	        			</div></center>
	        			</div></form>
	      			</div>
    			</div>
  			</div>
		</div>

    <!-- Import Endz -->

    <!-- Full Screen Follows -->
    <div class="modal fade" id="follow" tabindex="-1">
        <div class="modal-dialog modal-fullscreen rounded-5">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="container-fluid">
                    	<div class="section-title position-relative">
                            <center><h2 class="fw-bold text-primary text-uppercase text-danger">Today Follow Ups</h2></center>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container-fluid">
    								<h2 style="border-bottom: 2px solid black;"></h2>
									<table class="table table-warning bg-opacity-75 table-striped">
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Cx Name</th>
											<th scope="col">Date</th>
											<th scope="col">Mobile</th>
											<th scope="col">Mail ID</th>
											<th scope="col">Assign</th>
											<th scope="col">Cx Needs</th>
											<th scope="col">Followups</th>
											<th scope="col">Description</th>
											<th scope="col">Edit</th>
										</tr>
										<?php
										$i=1;
										$jet=mysqli_query($spot,"SELECT * FROM lead WHERE Date(fdate)=CURDATE()");
   										while($row = mysqli_fetch_array($jet))
   										{ 
   										?>
										<tr>
											<td class="text-center"><?php echo $i++ ?></td>
											<td class="text-center"><?php echo $row['name'];?></td>
											<td class="text-center"><?php echo $row['sdate'];?></td>
											<td class="text-center"><?php echo $row['phone'];?></td>
											<td class="text-center"><?php echo $row['mail'];?></td>
											<td class="text-center"><?php echo $row['assign'];?></td>
											<td class="text-center"><?php echo $row['need'];?></td>
											<td class="text-center"><?php echo $row['fdate'];?></td>
											<td class="text-center"><?php echo $row['message'];?></td>
											<td class="text-center"><button type="button" class="btn btn-sm btn-success rounded-5" onclick="location.href='edit.php?id=<?php echo $row['id'];?>'">Edit</button>
						    					<button type="button" class="btn btn-sm btn-secondary rounded-5" onclick="location.href='delete.php?id=<?php echo $row['id'];?>'">Delete</button></td>
										</tr>
										<?php 
						        			}
						      			?>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Follows End -->

    <!-- Full Screen Months -->
    <div class="modal fade" id="month" tabindex="-1">
        <div class="modal-dialog modal-fullscreen rounded-5">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="container-fluid">
                    	<div class="section-title position-relative">
                            <center><h2 class="fw-bold text-primary text-uppercase text-info">Current Month Data</h2></center>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container-fluid">
    								<h2 style="border-bottom: 2px solid black;"></h2>
									<table class="table table-info bg-opacity-75 table-striped">
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Cx Name</th>
											<th scope="col">Date</th>
											<th scope="col">Mobile</th>
											<th scope="col">Mail ID</th>
											<th scope="col">Assign</th>
											<th scope="col">Cx Needs</th>
											<th scope="col">Followups</th>
											<th scope="col">Description</th>
											<th scope="col">Edit</th>
										</tr>
										<?php
										$i=1;
										$jet=mysqli_query($spot,"SELECT * FROM lead where MONTH(sdate) = MONTH(now()) and YEAR(sdate) = YEAR(now());");
   										while($row = mysqli_fetch_array($jet))
   										{ 
   										?>
										<tr>
											<td class="text-center"><?php echo $i++ ?></td>
											<td class="text-center"><?php echo $row['name'];?></td>
											<td class="text-center"><?php echo $row['sdate'];?></td>
											<td class="text-center"><?php echo $row['phone'];?></td>
											<td class="text-center"><?php echo $row['mail'];?></td>
											<td class="text-center"><?php echo $row['assign'];?></td>
											<td class="text-center"><?php echo $row['need'];?></td>
											<td class="text-center"><?php echo $row['fdate'];?></td>
											<td class="text-center"><?php echo $row['message'];?></td>
											<td class="text-center"><button type="button" class="btn btn-sm btn-success rounded-5" onclick="location.href='edit.php?id=<?php echo $row['id'];?>'">Edit</button>
						    					<button type="button" class="btn btn-sm btn-secondary rounded-5" onclick="location.href='delete.php?id=<?php echo $row['id'];?>'">Delete</button></td>
										</tr>
										<?php 
						        			}
						      			?>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Months End -->