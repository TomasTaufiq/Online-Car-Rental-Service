<?php 
	session_start(); 
	include '../mysqlconnect.php';

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	

?>
<!-- Header          ========= -->
<?php include 'adheader.php'; ?>
<!--   Header Ends     -->
<?php
//datetime
date_default_timezone_set("ASIA/DHAKA");
  $date = date(" D-M-Y   h:i a  ");
  // $time = date("h:i:s a");
  // echo " ".$date." ".$time;
  // echo "time zone :".date_timezone_get();


//delete CArs
  if (isset($_GET['action'])) {
  	if ($_GET['action']=='delete') {
  		$ride_id= $_GET['id'];

  		$i="DELETE FROM rides WHERE ride_id='$ride_id'";
		
		if(mysqli_query($con, $i))
		{
		echo "<script type='text/javascript'>alert('Deleted successfully..!')</script>";
		}
		else {
			echo "<script type='text/javascript'>alert('NOT Deleted! ! ! Error!!')</script>";
		}

  	}
  }

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

<!--=============================================Body=============================================  -->


<div class="row bg-dark m-1">
		<div class="col">
			<h2 class="display-3 text-center text-white">AdminPanel</h2>
		</div>
</div>



<div class="row p-3">
	<!-- -------------------------------------------------------------------------- -->
	<!-- -----------------------Content ---------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
	
		<div class="col-md-8 offset-md-2 border border-dark">
			<form method="POST" enctype="multipart/form-data">
							<div class="form-row">
								<h3 class="text-dark">
									Car Details Input Here
								</h3>
							</div>
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

	<!-- -------------------------------------------------------------------------- -->
	<!-- ------------------------Content----------------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
</div>


<div class="row">
	<!-- -------------------------------------------------------------------------- -->
	<!-- -----------------------Content ---------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
		<div class="col-md-10 offset-md-1">
			<div class="row ">
    
		           <?php 

		            include '../mysqlconnect.php';
		            $query= "SELECT*FROM rides ORDER BY 'ride_type' ASC";
		            //ride_type,ride_name,ride_image,ride_passengercap,ride_baggagecap
		            $result= mysqli_query($con, $query);
		            $num_rows=mysqli_num_rows($result);
		            if ($num_rows > 0){
		              while ($row = mysqli_fetch_assoc($result)){
		           
		          ?>


		            <div class="col-md-10 offset-md-1 col-sm-10  border border-dark" 
		                                          style="border-width: 6px !important; 
		                                                margin-left: 24px !important;
		                                                margin-bottom: 12px !important;
		                                          ">
		                <!--      cars        -->
		                      
		                        <div class="row " >
		                          <div class="col-md-5">
		                            <img src=".<?php echo $row['ride_image']; ?>" class="image-thumbnail" alt="" style="height: 200px !important; width: 100% !important;">
		                          </div>

		                            <div class="col-md-7 text-left">
		                                <div class="">
		                                  <h3 class="text-info bg-dark p-1">Car Type : <?php echo $row['ride_type']; ?></h3>
		                                  <h4 class="card-title">Car Name: <?php echo $row['ride_name']; ?></h4>
		                                  <h6 class="">Passengers : <?php echo $row['ride_passengercap']; ?> max </h6>
		                                  <h6  class="card-title ">Baggage : <?php  echo $row['ride_baggagecap']; ?></h6>
		                                </div>
		                                <!-- Submit Button -->
		                                  <!-- <input type="submit" name="booking" action="booking.php?action=booking&id=<?php echo $row['ride_type']; ?>" class="btn btn-dark btn-lg btn-block text-white" width="60%" value="BOOK NOW / এখনই বুক করুন " style="">  -->

		                              
		                              <a href ="managecars.php?action=delete&id=<?php echo $row['ride_id']; ?>" class="btn btn-dark btn-block text-white">Delete</a>
									 </div>
		                        </div>
		                      
		                    <!--      cars      -->
		            </div>
		          <?php
		                
		                };
		              };

		          ?>
		  </div> 
		</div>
	<!-- -------------------------------------------------------------------------- -->
	<!-- ------------------------Content----------------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
</div>


<!--=============================================Body=============================================  -->
<!--    Footer Starts   -->
<?php include 'adfooter.php'; ?>