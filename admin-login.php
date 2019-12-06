<?php include 'include/header.php'; ?>
<body>
	<?php 
		include 'include/nav.php';
		//include 'include/carousel.php';

		session_start();
		$conn = mysqli_connect('localhost', 'root', '', 'first_db');

		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$query = mysqli_query($conn, "SELECT * FROM pro_2_register WHERE email='$email' AND password='$password' ");

			$count = mysqli_num_rows($query);

			if ($count > 0) {
				$_SESSION['login'] = $email;

				$data = mysqli_fetch_array($query);

				if ($data['email'] == $email && $data['password'] == $password) {
					//echo "login success";
					header("location:welcome-admin.php");
				}
			} 
			else {
					//echo "error";
				header("location:error.php");
			}
		}	
	?>
	<br><br>
	<!-- Start Login Form -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-sm-8 form-border">
			<h2><b><i>Login Here</i></b></h2><br>
				<form method="POST">
					<table class="table">
						<tr>
							<td><label>Email ID* :</label></td>
							<td><input type="email" name="email" placeholder="Email ID*" class="form-control" required></td>
						</tr>

						<tr>
							<td><label>Password* :</label></td>
							<td><input type="password" name="password" placeholder="Password*" class="form-control" required></td>
						</tr>
								
						<tr>
							<td><input type="checkbox"><span> Remember Me</span></td>
							<td><input type="submit" name="login" value="SUBMIT" class="btn btn-success pull-right"></td>
						</tr>

						<tr>
							<td colspan="2">
								<a href="#">Forgot Password ?</a>
								<a href="signup.php">New User Register Here</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
	</div>
	<!-- End Login Form -->
 	
 	<br>
	<?php include 'include/footer.php'; ?>
</body>