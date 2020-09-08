<?php session_start();


 
 ?>
<!-- Header          ========= -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->
<!--=============================================Body=============================================  -->



<!-- 
====================================================================================================================
                                              Display
====================================================================================================================
-->
  <!--=======================================About Us=============================================  -->
  <div class="row " >
    <!-- --------------------------------------------------------------------------------------- -->
      <div class="col-md-10 offset-md-1 bg-dark" id="about">
                <h2 class="text-white">
                  About Us
                </h2>
              </div>
      <div class="row">
        <!-- ------------------------------------ -->
          
          <div class="col-md-10 offset-md-1">
              <div>
                <p class="lead text-secondary">
                  The Car Rental System is a very demanding system for today’s day-to-day life. People are now using online car rental services. But it is not possible for every small Rent-a-car business man to afford a site like this. The system presented here is meant to be affordable for all.
                </p>
                <p class="lead">Garikoi.com</p>
                <h6 class="lead text-secondary">Objectives</h6>

                <p class="lead text-secondary">                 
                The site is designed as simple but efficient system to maintain rental services for cars. The main objectives based on which the project is developed are listed below:
                 
                </p class="lead text-secondary">
                <ul class="lead text-secondary">
                  <li>Simple design for users</li>
                  <li>Display available cars in a scroll </li>
                  <li>One click booking</li>
                  <li>Booking confirmation form</li>
                  <li>Contact sharing</li>
                  <li>Easy to maintain admin dashboard</li>
                  <li>Easy input new car and details</li>
                </ul>
              </div>

          </div>
        <!-- ------------------------------------ -->
      </div>
    <!-- --------------------------------------------------------------------------------------- -->
  </div>
  <br><br>
  <!--=======================================About Us=============================================  -->
<div class="row">

<!-- ====================================================================================================================================
                                            Main row
============================================================================================================================== -->


<!-- 
====================================================================================================================
                                              Display
====================================================================================================================
-->
<div class="col-md-10 offset-md-1 p-1" id="cars">
  <div class="row bg-dark m-1" >
        <h2 class="text-white">
          Our Cars
        </h2>
    </div>
  <div class="row ">
    
           <?php 

            include 'mysqlconnect.php';
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
                            <img src="<?php echo $row['ride_image']; ?>" class="image-thumbnail" alt="" style="height: 200px !important; width: 100% !important;">
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

                              <a href ="booking.php?action=booking&id=<?php echo $row['ride_id']; ?>" class="btn btn-dark btn-lg btn-block text-white">BOOK NOW / এখনই বুক করুন</a>

                                 
                            </div>
                           <!--  <div class="col-md-3 text-left">
                                  
                            </div> -->
                          
                        </div>
                      
                    <!--      cars      -->
            </div>
          <?php
                
                };
              };

          ?>
  </div> 

</div> 



<!-- 
====================================================================================================================
                                              Display
====================================================================================================================
-->
</div>

<!-- 
====================================================================================================================
                                              Display
====================================================================================================================
-->
    

<!--     body   -->
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>