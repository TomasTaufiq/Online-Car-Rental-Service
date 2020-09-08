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
  <div class="row ">
    <!-- --------------------------------------------------------------------------------------- -->
      <div class="col-md-10 offset-md-1 bg-dark">
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

            $con= mysqli_connect("localhost","root","","foodpark");
            $query= "SELECT*FROM item ORDER BY sl ASC";
            $result= mysqli_query($con, $query);
            $num_rows=mysqli_num_rows($result);
            if ($num_rows > 0){
              while ($row = mysqli_fetch_assoc($result)){
           
          ?>


            <div class="col-md-10 offset-md-1 col-sm-10  border border-dark" 
                                          style="border-width: 6px !important; 
                                                margin-left: 24px !important;
                                                margin-top: : 94px !important;

                                          ">
                <!--      cars        -->
                      
                        <div class="row " >
                          <div class="col-md-4">
                            
                          <img src="./img/car1.jpg" class="image-thumbnail" alt="..." style="height: 180px;">
                          </div>

                            <div class="col-md-8 text-left">
                                <div class="">
                                  <h6 class="card-title"><?php echo $row['item_name']; ?></h6>
                                  <span class="badge badge-danger">Price: <?php echo $row['item_price']; ?> TK</span>
                                  <!--   //<p class="card-text font-weight-lighter"><?php echo $row['sl']; ?></p> -->
                                  <p class="card-text font-weight-lighter"><?php echo $row['item_des']; ?></p>

                                  <!-- Submit Button -->
                                  <input type="submit" name="order" class="btn btn-dark text-white" value="Order it" style="margin: 8px;">
                                </div>
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