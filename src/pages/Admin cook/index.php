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
				<ul class="cookList"></ul>
		</div>
		<div class="toDeliverQ">
			<h1 class="tableTitle">Food to be delivered</h1>
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
<!--	<script>
    $(document).ready(function(){
		
        setInterval(function () {
			
			$.ajax({
				type:"POST",
				url :"getData.php",
				dataType:"json",
				
				success: function (data,status) {
					//console.log(typeof(data));
					console.log(data);
					var toCookarray = data;
					console.log(typeof(toCookarray));
					if(!($.isEmptyObject(toCookarray)));{
							for (const iterator of toCookarray) {
							$(".cookList").append("<li class='test'>" + iterator + "</li>");
						}	
					}
				

				},
				error: function(xhr,status,error){
					console.log(error);
				}
			});
			
			
        },1000);
     
    });
	</script> -->
</body>
</html>