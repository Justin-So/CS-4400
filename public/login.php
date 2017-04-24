<?php

require_once 'connect.php';
// $link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
// // $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = 'select DISTINCT City from CITYSTATE';
$sql2 = 'select DISTINCT City from CITYSTATE';
$citys = array();
$states = array();
if($result = mysqli_query($link, $sql)) {
	while ($row = mysqli_fetch_array($result)) 
	{
		// $citys = $row['City'];
		array_push($citys, $row['City']);
		// $states = $row['State'];
	}
}
if($result = mysqli_query($link, $sql2)) {
	while ($row = mysqli_fetch_array($result)) 
	{
		// $citys = $row['City'];
		array_push($states, $row['State']);
		// $states = $row['State'];
	}
}





print_r($states);
die();

mysqli_close($link);
// print_r($citys);
// print_r($states);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login Screen</title>
		<link href="../assets/css/main.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<h1 class="center-text">Login Screen</h1>
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="access.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="createuser.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="usernameRegister" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="passwordRegister" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<select name="userType" id="user-types" class="form-control">
										 <option >City Scientist</option>
										 <option >City Official</option >
									</select>
									<br>

									<div id="additional-info" class="form-group">
										<label>City</label>
										<select name="city" class="form-control">
											<?php foreach($citys as $c) {
												echo '<option>' . $c . '</option>';
												} ?>
										</select>

										<br>
										<label>State</label>
										<select name="state" class="form-control">
											 <?php foreach($states as $s) {
												echo '<option>' . $s . '</option>';
												} ?>
										</select>
										<br>
										<input type="text" name="Title" id="title" class="form-control" placeholder="Title" value="">
									</div>
									<br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-success" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js" ></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="../assets/js/main.js" ></script>
	</body>
</html>
