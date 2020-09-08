<?php


session_start();
//Connect the Dbase
// $con= mysqli_connect("localhost","root","","garikoi");
include 'mysqlconnect.php';

//datetime
date_default_timezone_set("ASIA/DHAKA");
  $date = date(" D-M-Y   h:i a  ");
  // $time = date("h:i:s a");
  // echo " ".$date." ".$time;
  // echo "time zone :".date_timezone_get();


//

if(isset($_POST['submit']))
{

	$ride_type= $_POST['ride_type'];
	$ride_name= $_POST['ride_name'];
	//$ride_image= mysqli_real_escape_string($_POST['ride_image']);
	$ride_passengercap= $_POST['ride_passengercap'];
	$ride_baggagecap= $_POST['ride_baggagecap'];
	//code for image uploading
	if($_FILES['ride_image']['name'])
	{
	move_uploaded_file($_FILES['ride_image']['tmp_name'], "./img/".$_FILES['ride_image']['name']);
	$ride_image="./img/".$_FILES['ride_image']['name'];
	}
	 
	$i="INSERT INTO rides (ride_type,ride_name,ride_image,ride_passengercap,ride_baggagecap) VALUES ('$ride_type','$ride_name','$ride_image','$ride_passengercap','$ride_baggagecap')";
	//INSERT INTO `rides`(`ride_id`, `ride_type`, `ride_name`, `ride_image`, `ride_passengercap`, `ride_baggagecap`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('inserted successfully..!')</script>";
	}
	else {
		echo "<script type='text/javascript'>alert('NOT inserted! ! ! Error!!')</script>";
	}

}?>
 <!-- <script type="text/javascript">alert('NOT inserted! ! ! Error!!')</script> -->


<!-- Header -->
<?php include 'header.php'; ?>   
 
	<!-- Form Item Input -->
		<!-- Form Item Input -->
			<div class="row m-1">
				<div class="col-md-4">
					<div class="border border-dark m-1 p-3">

						<h3 class="text-dark">
							Car Details Input Here
						</h3>

						<form method="POST" enctype="multipart/form-data">

							<div class="form-group">
				    			<label  >Ride Type</label>
								<input class="form-control form-control-lg" type="text" name="ride_type">
							</div>

							<div class="form-group">
				    			<label >Ride Name</label>
								<input class="form-control form-control-lg" type="text" name="ride_name">
							</div>

							<div class="form-group">
			    				<label  >Total Seats or Passenger Capacity</label>
								<input class="form-control form-control-lg" type="text" name="ride_passengercap">
							</div>

							<div class="form-group">
				    			<label  >Baggage Capacity</label>
								<input class="form-control form-control-lg" type="text" name="ride_baggagecap">
							</div>

							
							<div class="form-group">
				    			<label  >Image</label>
								<input class="form-control form-control-lg" type="file" name="ride_image">
							</div>

							<input type="submit" value="Submit" class="text-info btn btn-dark" name="submit">
						</form>
					</div>
					
				</div>
			</div>

<!-- Form Item Input -->






 <!-- Footer -->
 <?php include 'footer.php'; ?>