<?php 
	include 'include/header.php';

	// include 'include/nav.php';
	session_start();

	if (!isset($_SESSION['login'])) {
		header("location:index.php");
	} else {
		$sid = $_SESSION['login'];
	}

	$conn = mysqli_connect('localhost', 'root', '', 'first_db');

	$query = mysqli_query($conn, "SELECT * FROM pro_2_register WHERE email='$sid' AND status != 'admin' ");
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
						<img src="<?php echo "uploads/".$data['image'] ?>" alt="" height="20" width="20"> <b><u><i>USER</i></u></b>
						<?php echo $data['fname']; ?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="admin-login.php">Admin Login</a></li>
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
					<h3 class="text-center text-capitalize">Welcome <?php echo $data['title']; ?> <?php echo $data['fname']; ?></h3>
				</div>
				<center>
					<div class="panel-body">
						<table class="table">
							<tr>
								<img src="<?php echo "uploads/".$data['image'] ?>" alt="" height="100" width="100">
								<br><br>
							</tr>
							<tr>
								<td><label>Reference ID</label></td>
								<td><?php echo $data['ref_id']; ?></td>
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
								<td><label>Country</label></td>
								<td><?php echo $data['country']; ?></td>
							</tr>
							<tr>
								<td><label>State</label></td>
								<td><?php echo $data['state']; ?></td>
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
								<td><label>Pin</label></td>
								<td><?php echo $data['pin']; ?></td>
							</tr>
							<tr>
								<td><label>Email</label></td>
								<td><?php echo $data['email']; ?></td>
							</tr>
							<tr>
								<td><label>Password</label></td>
								<td><?php echo $data['password']; ?></td>
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
					<a href="event.php" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Please fill the form here by clicking on this link">Event Information Form</a>

					<br><br><br>
					<!-- Data showing through Collapse -->
					<a class="btn btn-danger" role="button" data-toggle="collapse" href="#Mycollapse" aria-expanded="false" aria-controls="collapseExample">
						For More Information Click Here
					</a>
					<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#Mycollapse" aria-expanded="false" aria-controls="collapseExample">
						Hide
					</button>
					<div class="collapse" id="Mycollapse">
					<br>
						<div class="well">
							<label>For more information contact:</label> <br>
							<label>Email:</label>	donation@kindnessfoundation.in <br>
							<label>Phone:</label>	Mob: +91 9988776655
						</div>
					</div>
					
					<br><br>
					<!-- Modal Button -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@mdo">Contact</button>

					<!-- Start of Body of Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New message</h4>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label for="recipient-name" class="control-label">Recipient:</label>
											<input type="text" class="form-control" id="recipient-name" placeholder="example@gmail.com">
										</div>
										<div class="form-group">
											<label for="message-text" class="control-label">Message:</label>
											<textarea class="form-control" id="message-text" placeholder="Type your message here..."></textarea>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Send message</button>
								</div>
							</div>
						</div>
					</div>
					<!-- End of Body of Modal -->

				</div> <!-- End Panel Body </div> -->
			</div>
		</div>

	</div>
</div>

<hr>
<?php include 'include/footer.php'; ?>
</body>
</html>