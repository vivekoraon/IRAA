<!DOCTYPE html>
<html lang="en">
<head>
  <title>IIT (ISM) | IRAA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<?php

	$conn = mysqli_connect("localhost","root","bringit1","iraa") or die("Failed to connect ".mysqli_connect_error());

	if (isset($_POST['submit'])) {

		$name = mysqli_real_escape_string($conn , $_POST['name']);
		$dob = mysqli_real_escape_string($conn , $_POST['dob']);
		$dept = mysqli_real_escape_string($conn , $_POST['dept']);
		$course = mysqli_real_escape_string($conn , $_POST['course']);
		$year = mysqli_real_escape_string($conn , $_POST['year']);
		$email = mysqli_real_escape_string($conn , $_POST['email']);
		$contact = mysqli_real_escape_string($conn , $_POST['contact']);
		$field = mysqli_real_escape_string($conn , $_POST['field']);
		
		$sql = "SELECT * FROM registrations WHERE Email = '$email'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck<1) {
			$query = "INSERT INTO registrations(Name,dob,Department,Course,PassingYear,Contact,Email,Field) VALUES('$name','$dob','$dept','$course','$year','$contact','$email','$field')";
			
			if (!mysqli_query($conn,$query)) {
				echo "Error ".mysqli_error($conn);
			}
			else{
				echo "<script>alert('Thank you for registering!');</script>";
			}
		}
		else{
			echo "<script>alert('User has already been registered!');</script>";
		}

	}

?>

<div class="register">
	<div class="container">
		<div class="row">
			<div class="col-md-6" id="first">
				<h1 class="text-center">Register</h1>
				<h4 style="margin-top: 30px;" class="text-center">Why to Register?</h4>
				<ul style="margin-top: 20px;">
					<li>Free flow of information, news and updates, announcements</li>
					<li>Alumni networking</li>
					<li>Help us build an extensive alumni directory which in turn will help you as well as your alma mater</li>
				</ul>
				<!--<p style="font-size: 15px; margin-top: 30px; color: palegreen;">Fill in these basic details about yourself. This shall help us prepare an ISM alumni database for its future use. By filling this form, you are permitting ISM to share this information to the needy alumni and current students.</p>-->
			</div>
			<div class="col-md-6" id="second">
				<form action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="post">
				  <div class="form-group">
				    <label for="name">Name:</label>
				    <input type="text" class="form-control" id="name" name="name">
				  </div>
				  <div class="form-group">
				    <label for="dob">Date of Birth:</label>
				    <input type="date" class="form-control" id="dob" name="dob">
				  </div>
				  <div class="form-group">
				    <label for="dept">Department:</label>
				    <input type="text" class="form-control" id="dept" name="dept">
				  </div>
				  <div class="form-group">
				    <label for="course">Course/Programme:</label>
				    <input type="text" class="form-control" id="course" name="course">
				  </div>
				  <div class="form-group">
				    <label for="year">Year of Passing:</label>
				    <input type="text" class="form-control" id="year" name="year">
				  </div>
				  <div class="form-group">
				    <label for="contact">Contact No.:</label>
				    <input type="text" class="form-control" id="contact" name="contact">
				  </div>
				  <div class="form-group">
				    <label for="email">Email:</label>
				    <input type="email" class="form-control" id="email" name="email">
				  </div>
				  <div class="form-group">
				    <label for="field">Field of Specialization:</label>
				    <input type="text" class="form-control" id="field" name="field">
				  </div>
				  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>


</body>
</html>


		
		