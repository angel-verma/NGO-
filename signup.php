<?php include 'include/header.php'; ?>
<body>
	<?php
	include 'include/nav.php';
	# include 'include/carousel.php';

	# Register Coding
	$conn = mysqli_connect('localhost', 'root', '', 'first_db') or die("Not connected to the database");

	if (isset($_POST['register'])) {
		# Two passwords are equal to each other
		if ($_POST['password'] == $_POST['confirm_password']) {
			$title = $_POST['title'];
			$fname = $_POST['fname'];
			$address = $_POST['address'];
			$country = $_POST['country'];
			$state = $_POST['state'];
			$city = $_POST['city'];
			$mobile = $_POST['mobile'];
			$pin = $_POST['pin'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$image_path = $_FILES['img-file']['name'];
			$tname = $_FILES['img-file']['tmp_name'];
			move_uploaded_file($tname, "uploads/".$image_path);

			$query = mysqli_query($conn, "INSERT INTO pro_2_register(title, fname, address, country, state, city, mobile, pin, email, password, image) VALUES('$title', '$fname', '$address', '$country', '$state', '$city', '$mobile', '$pin', '$email', '$password', '$image_path')");

			if ($query == 1) {
				echo "<script type='text/javascript'>";
				echo "alert('You are registered successfully. Please note the Refference ID from your profile for further use.')";
				echo "</script>";
				# header("location:donor.php");
			} 
			else {
				echo "Error Occured";
			}
		}
		else {
			echo "Two passwords not match";
		}
	}
	?>
	
	<br><br>
	<!-- Start Registration Form -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-sm-8 form-border">
				<h2><b><i>Registration</i></b></h2><br>
				<form method="POST" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td><label>Title* :</label></td>
							<td>
								<select name="title" class="form-control">
									<option>Mr</option>
									<option>Mrs</option>
									<option>Ms</option>
								</select>
							</td>
						</tr>

						<tr>
							<td><label>Full Name* :</label></td>
							<td><input type="text" name="fname" placeholder="Type Full Name*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Address* :</label></td>
							<td><input type="text" name="address" placeholder="Address*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Country* :</label></td>
							<td><input type="text" name="country" placeholder="Country*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>State* :</label></td>
							<td><input type="text" name="state" placeholder="State*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>City* :</label></td>
							<td><input type="text" name="city" placeholder="City*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Mobile Number* :</label></td>
							<td><input type="number" name="mobile" placeholder="Mobile Number*" class="form-control" required></td>
						</tr>
						
						<tr>
							<td><label>Pin Code* :</label></td>
							<td><input type="number" name="pin" placeholder="Pin Code*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Email ID* :</label></td>
							<td><input type="email" name="email" placeholder="Email ID*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Password* :</label></td>
							<td><input type="password" name="password" placeholder="Password*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Confirm Password* :</label></td>
							<td><input type="password" name="confirm_password" placeholder="Retype Password*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Upload image</label></td>
							<td><input type="file" name="img-file"></td>
						</tr>
						
						<tr>
							<td colspan="2">
								<input type="checkbox" name="checkbox" required>
								<span>I agree to <a href="#">terms and conditions</a></span> 
							</td>
						</tr>

						<tr>
							<td colspan="2">
								<input type="submit" name="register" value="PROCEED" class="btn btn-success">

								<input type="reset" value="RESET" class="btn btn-primary">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<!-- End Registration Form -->
	
	<br><br>
	<?php include 'include/footer.php'; ?>
</body>
