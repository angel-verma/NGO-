<?php 
include 'include/header.php';

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

<?php
} // while loop closing

if (isset($_POST['event'])) {
	$refid = $_POST['refid'];
	$ename = $_POST['ename'];
	$eplace = $_POST['eplace'];
	$edate = $_POST['edate'];
	$etime = $_POST['etime'];
	$edonate = $_POST['edonate'];

	$query = mysqli_query($conn, "INSERT INTO pro_2_event(ref_id, ename, eplace, edate, etime, edonate) VALUES ('$refid', '$ename', '$eplace', '$edate', '$etime', '$edonate')");

	if ($query == 1) {
		# echo "success";
		header("location:thanku.php");
	} else {
		# echo "error";
		header("location:error.php");
	}
}

?>
<body>

<br><br>

<!-- Start Event Form -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-sm-8 form-border">
			<h2><b><i>Fill information Here</i></b></h2><br>
			<form method="POST">
				<table class="table">
					<tr>
						<td><label>Reference ID* :</label></td>
						<td><input type="number" name="refid" placeholder="Reference ID*" class="form-control" required data-toggle="tooltip" data-placement="bottom" title="Please type the Reference ID which is provided in your profile"></td>
					</tr>

					<tr>
						<td><label>Event Name* :</label></td>
						<td><input type="text" name="ename" placeholder="Event Name*" class="form-control" required></td>
					</tr>

					<tr>
						<td><label>Event's Place* :</label></td>
						<td><input type="text" name="eplace" placeholder="Event Place*" class="form-control" required></td>
					</tr>

					<tr>
						<td><label>When the Event organized* :</label></td>
						<td><input type="date" name="edate" class="form-control" required></td>
					</tr>

					<tr>
						<td><label>Timing of the event* :</label></td>
						<td><input type="text" name="etime" placeholder="Timing of the Event*" class="form-control" required></td>
					</tr>

					<tr>
						<td><label>Donate* :</label></td>
						<td><input type="text" name="edonate" placeholder="Donate*" class="form-control" required></td>
					</tr>

					<tr>
						<td colspan="2">
							<a href="welcome-user.php" class="btn btn-primary">Back</a>
							<input type="submit" name="event" value="SUBMIT" class="btn btn-success">
						</td>
					</tr>
				</table>
			</form>
		</div>	 <!-- End of col-lg-8 </div> -->

		<div class="col-lg-4 col-sm-4">
			<div class="panel panel-info">
				<div class="panel-heading"><h4>For More Info..</h4></div>
				<div class="panel-body">
					<label>For more information contact:</label> <br>
					<label>Email:</label>	donation@kindnessfoundation.in <br>
					<label>Phone:</label>	Mob: +91 9988776655
				</div>
			</div>
		</div>

	</div>	
</div>
<!-- End Event Form -->

<hr>
<?php include 'include/footer.php'; ?>
</body>
</html>