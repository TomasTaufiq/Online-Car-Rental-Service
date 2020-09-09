<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	$booking_id="";
 include '../mysqlconnect.php';//database connect

//Edit Booking Fair editcost
	if(isset($_POST['editcost']))
{

	$booking_cost= $_POST['booking_cost'];
	$booking_id=$_POST['booking_id'];
	 echo "Cost id".$booking_id."stat ".$booking_cost;
	 

	$i="UPDATE booking SET booking_cost='$booking_cost' WHERE booking_id='$booking_id'";

	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('Cost inserted successfully..!')</script>";
	}
	else {
		echo "<script type='text/javascript'>alert('Cost NOT inserted! ! ! Error!!')</script>";
	}

}
//Edit Booking Status
	if(isset($_POST['editstat']))
{

	$booking_status= $_POST['booking_status'];
	$booking_id=$_POST['booking_id'];
	
	 echo "status id".$booking_id." stat ".$booking_status;
	$i="UPDATE booking set booking_status='$booking_status' WHERE booking_id='$booking_id'";
	
	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('status inserted successfully..!')</script>";
	}
	else {
		echo "<script type='text/javascript'>alert('status NOT inserted! ! ! Error!!')</script>";
	}

}	

?>
<!-- Header          ========= -->
<?php include 'adheader.php'; ?>
<!--   Header Ends     -->
<!--=============================================Body=============================================  -->

<div class="row bg-dark m-1">
		<div class="col">
			<h2 class="display-3 text-center text-white">AdminPanel</h2>
			<h2 class=" text-center text-white">Booking Requests</h2>

		</div>
</div>




<div class="row p-4">
	<!-- -------------------------------------------------------------------------- -->
	<!-- -----------------------Content ---------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
		<div class="col-md-12 p-2 border border-dark">
			<div class="row">
				
				<div class="col-md-12">
					<!-- ---------------------------------Booking Requests-------------------------------------------- -->
					<table class="table table-dark table-hover border border-dark">
                    <thead>
                       <tr>
                         <th scope="col">id.</th>
                         <th>Date & Time</th>
                         <th >Customer Name & Mobile no</th>
                          <th>Booking Cost </th>
                         <th>Booking Status</th>
                         <th>Booking Details</th>
                        
                         <th> X </th>
                       </tr>
                     </thead>

                     <?php 
                     //`booking`(`booking_id`, `booking_datetime`, `booking_time`, `booking_date`, `booking_name`, `booking_mobile`, \\`booking_passengernum`, `booking_pickuptime`, `booking_pickupdate`, `booking_pickupaddress`, `booking_dropoffaddress`, `booking_ride_id`, `booking_numofcars`,// `booking_cost`)
				        include '../mysqlconnect.php';
                     	$query= "SELECT*FROM booking ORDER BY booking_id desc";
                        $result= mysqli_query($con, $query);
                        $num_rows=mysqli_num_rows($result);
                        
                        if ($num_rows > 0){
                            while ($value = mysqli_fetch_assoc($result)){  
                        ?>
                        <!-- Fetch Cart Items Dynamically -->
                         <tbody>
                           <tr>
                            <th scope="row"><?php echo $value['booking_id']; ?></th>
                            <td><?php echo "<p>".$value['booking_date']." </p><p> ".$value['booking_time']."</p>"; ?></td>
                            <td><?php echo "<p>".$value['booking_name']." </p><p>Mobile: ".$value['booking_mobile']."</p>"; ?></td>
                               <td>
                            			<!-- Booking Cost -->
	                            		 <form method="POST" >
	                            		 	<div class="form-row">
	                            		 		<input type="text" name="booking_cost" placeholder="<?php echo $value['booking_cost']." "; ?>">Taka 
	                            				<input type="hidden" name="booking_id" value="<?php echo $value['booking_id'];?>">

	                            		 	</div>
	                            		 	<div class="form-row">
	                            		 		<input type="submit" name="editcost" value="Enter/Change Booking fair">
	                            		 	</div>
	                            		 </form>
	                            		<?php// echo $value['booking_cost']." TK"; ?>
                           </td>
                            <td><?php// echo ($value['booking_status']);?>
                             	<form method="POST" >
	                            	<div class="form-row">
	                            		<input type="text" name="booking_status" placeholder="<?php echo $value['booking_status'];?>">
	                            		<input type="hidden" name="booking_id" value="<?php echo $value['booking_id'];?>">
	                            	</div>
	                            	<div class="form-row">
	                            		<input type="submit" name="editstat" value="Enter/Change Booking Status">
	                            	</div>
	                            </form>
	                         </td>
                            <td><p></p><p></p>
                            	<p>Number of Passengers <?php echo $value['booking_passengernum']; ?></p>
                            	<p>Pick Up Time : <?php echo $value['booking_pickuptime']; ?></p>
                            	<p>Pick Up Date : <?php echo $value['booking_pickupdate']; ?></p>
                            	<p>Pick Up Address : <?php echo $value['booking_pickupaddress']; ?></p>
                            	<p>DropOff Address :<?php echo $value['booking_dropoffaddress']; ?></p>
                            	<p>Number of Rides :<?php echo $value['booking_numofcars']; ?></p>
                            	
                            	
                            	
                            	
                            	<?php $rideid= $value['booking_ride_id']; ?>
                            	<?php echo "Rideid ".$value['booking_ride_id']; ?>
                            	<!-- Function to get car -->
                            	<?php carid($rideid); ?>
                            	<!-- Function -->
                            	

		                            	
                            		
                            </td>
                         
                           </tr>
                          </tbody>

                          <?php 
                          		}
                      		} ?>
                      </table>
                                               


					<!-- ---------------------------------Booking Requests-------------------------------------------- -->
				</div>

			</div>
		</div>
	
	<!-- -------------------------------------------------------------------------- -->
	<!-- ------------------------Content----------------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
</div>


<?php 
function carid($rideid)
{
	# code...
 ?>

 <!--      cars        -->
				                      <?php 
				                      	include '../mysqlconnect.php';
							            $query= "SELECT*FROM rides WHERE ride_id='$rideid'";
							            //ride_type,ride_name,ride_image,ride_passengercap,ride_baggagecap
							            $result= mysqli_query($con, $query);
							            $num_rows=mysqli_num_rows($result);
							            // if ($num_rows > 0){
							            //   while ($row = mysqli_fetch_assoc($result)){
							            $row = mysqli_fetch_assoc($result);  	
				                       ?>
				                        <div class="row border border-dark m-1 p-2" >
				                          <div class="col-md-3">
				                            <img src=".<?php echo $row['ride_image']; ?>" class="image-thumbnail" alt="" style="height: 200px !important; width: 100% !important;">
				                          </div>

				                            <div class="col-md-7 text-left">
				                                <div class="">
				                                  <h3 class="text-info bg-dark p-1">Car Type : <?php echo $row['ride_type']; ?></h3>
				                                  <h4 class="card-title">Car Name: <?php echo $row['ride_name']; ?></h4>
				                                  <h6 class="">Passengers : <?php echo $row['ride_passengercap']; ?> max </h6>
				                                  <h6  class="card-title ">Baggage : <?php  echo $row['ride_baggagecap']; ?></h6>
				                                </div>
				                              
				                              <!-- <a href ="managecars.php?action=delete&id=<?php // echo $row['ride_id']; ?>" class="btn btn-dark btn-block text-white">Delete</a> -->
											 </div>
				                        </div>
				                      
				                    <!--      cars      -->
<?php } ?>



<!--=============================================Body=============================================  -->
<!--    Footer Starts   -->
<?php include 'adfooter.php'; ?>