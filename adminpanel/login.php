<?php 
session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";


// connect to database
            include '../mysqlconnect.php';
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location:admin.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
 ?>

 

 <!-- Header          ========= -->
<?php include 'adheader.php'; ?>
<!--   Header Ends     -->
<!--=============================================Body=============================================  -->


<div class="row bg-dark m-1">
		<h2 class="text-white">Admin Login</h2>
	</div>
	
	<div class="row">
		
		<div class="col-md-3 offset-md-4 p-1 ">
			<form method="post" action="login.php">

			<?php include('errors.php'); ?>

				<div class="input-group p-1">
					<label>User Name  </label>
					<input type="text" class="form-control m-1" name="username" >
				</div>
				<div class="input-group p-1">
					<label>Password  </label>
					<input type="password" class="form-control m-1" name="password">
				</div>
				<div class="input-group m-1">
					<button type="submit" class="btn btn-dark text-white" name="login_user">Login</button>
				</div>
			
			</form>
		</div>
	</div>




<!--=============================================Body=============================================  -->
<!--    Footer Starts   -->
<?php include 'adfooter.php'; ?>