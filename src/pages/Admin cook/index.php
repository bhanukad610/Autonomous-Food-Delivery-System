<?php

require_once('connection.php');
require_once('getData.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cook Page</title>
	<style type="text/css">
	.highlight { 
		background-color: rgba(0,0,255,0.3);
		border-radius: 3px;
		color:white;
	 }
	</style>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
</head>,

<body>
	<div class="title">
		<h1>Chef's Order Tracker</h1>
	</div>
	<div class="lists">
		<div class="toCookQ">
			<h1 class="tableTitle">Food to be Cooked</h1>
	 				<div class="columns">
						<h4>&nbsp;&nbsp;No.&emsp;&nbsp;Name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Table No.&emsp;&emsp;Food Item</h4>	
	 				</div>
				<ul class="cookList"></ul>
		</div>
		<div class="toDeliverQ">
			<h1 class="tableTitle">Food to be delivered</h1>
	 		<div class="columns">
						<h4>&nbsp;&nbsp;No.&emsp;&nbsp;Name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Table No.&emsp;&emsp;Food Item</h4>
	 			</div>
				<ul class="deliverList"></ul>
		</div>
	</div>
	<br />
	<div class="submitbtn">
		<button id="btn">Prepared</button>
	</div>

	<div class="resetbtn submitbtn">
	 	<button id="rstbtn">Reset</button>
	</div>
	
	<script src="js/dynamic.js"></script>
	<script type="text/javascript">
	 var toCookarray=<?php echo json_encode($tocook) ;?>;
	 var toDeliverarray=<?php echo json_encode($toDeliver) ;?>;
	</script>

</body>
</html>