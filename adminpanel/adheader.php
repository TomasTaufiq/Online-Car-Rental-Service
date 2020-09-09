<?php   

date_default_timezone_set("ASIA/DHAKA");
  $date = date("D, d-M-Y  ");
  $time= date("h:i a");
   
// Log Out

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   
   

    <title>GariKoi.com</title>
    <link rel="shortcut icon" href="../img/garikoilogo(black).png" type="image/x-icon" />




  </head>
  <body >
  <div class="container-fluid">
      
<!--  NAV Menu Bar -->

   <div class="row bg-dark">
      <div class="col-md-12">
           <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <a class="navbar-brand" href="#">
                  <h2>
                    <img src="../img/garikoilogo2(White).png" class="img-fluid " width="130px" height="56px">
                    <!-- <em class="text-light">GariKoi.com</em> -->
                  </h2>
              </a>
              
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
                  <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Pannel <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="managereq.php">Manage Requests</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="managecars.php">Manage cars</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="managequotes.php">Quots</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="login.php ">Log in </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="?logout='1'">Log Out</a>

                      </li>
                    </ul>
                    
                    <span class="navbar-text " style="">
                      Get Your Ride Online! <a class="nav-link" href="tel:01700 888888">Call:01700 888888</a>
                    </span>
                    <span class="navbar-text ">
                      Admin Name: <a href="#"><?php 
                              if (!empty($_SESSION['username'])) {
                                echo " ".$_SESSION['username'];
                              }else {
                                echo "PLZ <a href='login.php' >Log in </a> ";
                              }

                       ?></a>
                    </span>
                  </div>
            </nav>
      </div>
   </div>

<!--  NAV Menu Bar -->

<!--   Header Ends     -->
   
 

