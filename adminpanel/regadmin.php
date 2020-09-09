<?php 	
session_start();
// error_reporting(0);
// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

 ?>

<!-- Header          ========= -->
<?php include 'adheader.php'; ?>
<!--   Header Ends     -->

<?php 
// connect to database
include '../mysqlconnect.php';
	

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO admin (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($con, $query);

			// $_SESSION['username'] = $username;
			// $_SESSION['success'] = "You are now logged in";
			//header('location: admin.php');
		}

	}

 ?>
<!--=============================================Body=============================================  -->


<div class="row bg-dark m-1">
		<h2 class="text-white">Register a new admin</h2>
	</div>
	
	<div class="row">
		
		<div class="col">
			<form method="post" action="regadmin.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Admin Name </label>
			<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email </label>
			<input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password </label>
			<input type="password" class="form-control" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password </label>
			<input type="password" class="form-control" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn btn-dark" name="reg_user"> Register </button>
		</div>
		<!-- <p>
			Already have an account? <a href="login.php">Sign in</a>
		</p> -->
	</form>

		</div>
	</div>












<!--=============================================Body=============================================  -->
<!--    Footer Starts   -->
<?php include 'adfooter.php'; ?>