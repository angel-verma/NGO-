<?php 
	include 'include/header.php'; 
	session_start();

	if (!isset($_SESSION['login'])) {
		header("location:index.php");
	} else {
		$sid = $_SESSION['login'];
	}

	$conn = mysqli_connect('localhost', 'root', '', 'first_db');

	$query = mysqli_query($conn, "SELECT * FROM pro_2_register WHERE status='admin' AND email='$sid' ") or die("Error");;
	while ($data = mysqli_fetch_array($query)){
?>

<body>
<!-- Start Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">
				<span class="glyphicon glyphicon-heart"></span>
				<b>Kind</b>ness Foundation
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="toggle">
			<ul class="nav navbar-nav">
				<li><a href="index.php">HOME</a></li>
				<li><a href="#">ABOUT US</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">GALLERY</a></li>
						<li><a href="#">TEAM</a></li>
					</ul>
				</li>

				<li><a href="#">OUR WORK</a></li>
				<li><a href="#">CAMPAIGNS</a></li>
				<li><a href="#">GET INVOLVED</a></li>
				
				<!-- Contact Modal -->
				<li><a href="#">CONTACT</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown"> 
						<img src="<?php echo "uploads/".$data['image'] ?>" alt="" height="20" width="20"> <b><u><i>ADMIN</i></u></b>
						<?php
							echo $data['fname'];
						?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="login.php">User Login</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>

				<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> SIGNUP</a></li>
			</ul>	
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<!-- End Navigation -->


<br>
<div class="container">
	<div class="row">

		<div class="col-lg-8 col-sm-8">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="text-center text-uppercase">Admin's profile</h3>
				</div>
				<center>
					<div class="panel-body">
						<table class="table">
							<tr>
								<img src="<?php echo "uploads/".$data['image'] ?>" alt="" height="100" width="100">
								<br><br>
							</tr>
							<tr>
								<td><label>Status</label></td>
								<td><b class="text-uppercase"><?php echo $data['status']; ?></b></td>
							</tr>
							<tr>
								<td><label>Name</label></td>
								<td><?php echo $data['title']; ?> <?php echo $data['fname']; ?></td>
							</tr>
							<tr>
								<td><label>Address</label></td>
								<td><?php echo $data['address']; ?></td>
							</tr>
							<tr>
								<td><label>City</label></td>
								<td><?php echo $data['city']; ?></td>
							</tr>
							<tr>
								<td><label>Mobile</label></td>
								<td><?php echo $data['mobile']; ?></td>
							</tr>
							<tr>
								<td><label>Email</label></td>
								<td><?php echo $data['email']; ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td colspan="2">
									<br>
									<a href="login.php" class="btn btn-primary">Back</a>
									<a href="logout.php" class="btn btn-danger">Logout</a>
								</td>
							</tr>
						</table>
					</div>
				</center>
			</div>
		</div>	<!-- </ End col-lg-8 div> -->

		<div class="col-lg-4 col-sm-4">
			<div class="panel panel-info">
				<div class="panel-heading"><h3><b class="text-uppercase">More Options...</b></h3></div>
				<div class="panel-body">

					<a href="donor-request.php" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Veiw donor's request">View Donor's Request</a>

				</div>
			</div>
		</div>

	</div>
</div>

<hr>
<?php include 'include/footer.php'; ?>
</body>
</html>