<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!-- Header          ========= -->
<?php 
	include 'adheader.php';
 include '../mysqlconnect.php'; 
 ?>
<!--   Header Ends     -->
<!--=============================================Body=============================================  -->


<div class="row bg-dark m-1">
		<div class="col">
			<h2 class="display-3 text-center text-white">AdminPanel</h2>
		</div>
</div>



<div class="row p-4">
	<!-- -------------------------------------------------------------------------- -->
	<!-- -----------------------Content ---------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
	<!-- Count Cars -->
	<div class="col-md-3 offset-md-2 alert-info m-1 p-2">
		<?php 

			$query= "SELECT*FROM rides ORDER BY ride_id ASC";
            $result= mysqli_query($con, $query);
            $num_rows=mysqli_num_rows($result);
            if ($num_rows > 0){
              // while ($row = mysqli_fetch_assoc($result)){

             
		 ?>
		 <h2 class="heading-2 text-center"> Number of Cars </h2>
		 <h3 class="display-4 text-center"><?php echo $num_rows; ?></h3>

		 <?php 
		  		}
		  ?>
	</div>
	<!-- Count Cars -->
	<!-- car requests -->
	<div class="col-md-3 offset-md-2 alert-info m-1 p-3">
	<?php 

			$query= "SELECT*FROM booking ORDER BY booking_id ASC";
            $result= mysqli_query($con, $query);
            $num_rows=mysqli_num_rows($result);
            if ($num_rows > 0){
              // while ($row = mysqli_fetch_assoc($result)){

             
		 ?>
		 <h2 class="heading-2 text-center"> Number of Booking Requests </h2>
		 <h3 class="display-4 text-center"><?php echo $num_rows; ?></h3>

		 <?php 
		  		}
		  ?>
	</div>
	<!-- car requests -->




	<!-- -------------------------------------------------------------------------- -->
	<!-- ------------------------Content----------------------------------------- -->
	<!-- -------------------------------------------------------------------------- -->
</div>


<div class="row p-2">
	<div class="col-md-4 m-1 alert alert-success">
		<p>
			To Add A New Admin <a href="regadmin.php" class="btn btn-lg btn-info"> Click Here </a>
		</p>
	</div>
</div>



<!--=============================================Body=============================================  -->
<!--    Footer Starts   -->
<?php include 'adfooter.php'; ?>