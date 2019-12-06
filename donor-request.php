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
<?php } ?>		<!--End of while loop-->			

<!-- Start Details table -->
<h1 class="text-center"><b><u>Details of Donor's Request</u></b></h1><br>
<table class="table table-bordered table-hover table-condenced">
	<tr class="active">
		<td><label class="text-uppercase">Image</label></td>
		<td><label class="text-uppercase">Reff. ID</label></td>
		<td><label class="text-uppercase">Name</label></td>
		<td><label class="text-uppercase">Contact Number</label></td>
		<td><label class="text-uppercase">Email</label></td>
		<td><label class="text-uppercase">Event Name</label></td>
		<td><label class="text-uppercase">Event Place</label></td>
		<td><label class="text-uppercase">Event Date</label></td>
		<td><label class="text-uppercase">Donation</label></td>
	</tr>

	<?php
	$conn = mysqli_connect('localhost', 'root', '', 'first_db');

	$query = mysqli_query($conn, 
		"SELECT pro_2_register.title, pro_2_register.fname, pro_2_register.mobile, pro_2_register.email, pro_2_event.ename, pro_2_event.eplace, pro_2_event.edate, pro_2_event.edonate, pro_2_register.image, pro_2_register.ref_id
		FROM pro_2_register INNER JOIN pro_2_event 
		ON pro_2_register.ref_id = pro_2_event.ref_id");

	while($data = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><img src="<?php echo "uploads/".$data['image']; ?>" alt="" height="30" width="30"></td>
			<td><?php echo $data['ref_id']; ?></td>
			<td><?php echo $data['title']; ?> <?php echo $data['fname']; ?></td>
			<td><?php echo $data['mobile']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['ename']; ?></td>
			<td><?php echo $data['eplace']; ?></td>
			<td><?php echo $data['edate']; ?></td>
			<td><?php echo $data['edonate']; ?></td>
		</tr>
		<?php } ?>

		<tr>
			<td colspan="9">
				<a href="welcome-admin.php" class="btn btn-primary pull-right">Back</a>
			</td>
		</tr>
	</table>
	<!-- End details table -->
</body>

<?php include 'include/footer.php'; ?>