<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Admin</title>
	</head>
	<body>

		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h5>Please fill your details below</h5>
					<form class="" method="post" action="../wait_page/process.php">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label" name="name">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name" required  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="tp" class="cols-sm-2 control-label">Phone Number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="tp" id="tp"  placeholder="Enter your Phone Number" required />
								</div>
							</div>
						</div>

						<div class="form-group">
  							<label  for="table">Table Number</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
		  								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
		  								<select id="tableno" class="form-control" name="tableno" required>
		  									<option value="" disabled selected>Please select your table number</option>
		  									<option value=1>1</option>
		  									<option value=2>2</option>
											<option value=3>3</option>
											<option value=4>4</option>
											<option value=5>5</option>
											<option value=6>6</option>
											<option value=7>7</option>
											<option value=8>8</option>
		  								</select>
		  						</div>
	  						</div>	
						</div>
						
						<div class="form-group ">
							<input type="submit" value="Order Now" id="button" class="btn btn-primary btn-lg btn-block login-button">
						</div>
						
					</form>
				</div>
			</div>
		</div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/myjs.js"></script>
	</body>
</html>
<?php
session_start();
$_SESSION['fooditem'] = $_GET['fooditem'];
?>