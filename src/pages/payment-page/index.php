<?php
	session_start();
	$name = $_SESSION['name'];
	$meal = $_SESSION['meal'];
	$price = $_SESSION['price'];
	$Quantity = 1; //will be added soon

	if(!$name){
		echo "Session ended. Start a new session.";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
	<header id="main-header">
			<h1 id="logo">Psycho Hut</h1>
		</header>
	<div class="container">
				<div class="invoice-box">
					<h1 id="invoice">Invoice</h1>
					<div class="customer-box">
						<h2>To</h2>
						<p id = "name"></p>
						<script>
							var name = <?php echo json_encode($name); ?>;
							document.getElementById("name").innerHTML = name;
						</script>
					</div><!--customer-box-->

					<div class="bill-box">
						<h2>Oder Details</h2>
						<h3>Food Item</h3>
						<p id="meal"></p>
						<script>
							var meal = <?php echo json_encode($meal); ?>;
							document.getElementById("meal").innerHTML = meal;
						</script>
						<h3>Quantity</h3>
						<p id="Quantity"></p>
						<script>
							var Quantity = <?php echo json_encode($Quantity); ?>;
							document.getElementById("Quantity").innerHTML = Quantity;
						</script>
						<h3>Unit Price</h3>
						<p>LKR <span id="price"></span>/=</p>
						<script>
							var price = <?php echo json_encode($price); ?>;
							document.getElementById("price").innerHTML = price;
						</script>
					</div><!--bill-box-->

					<div class="pay-box">
						<h2>Amount Due</h2>
						<h3>Total</h3>
						<p>LKR <span id="total"></span>/=</p>
						<script>
							var total = <?php echo json_encode($price * $Quantity); ?>;
							document.getElementById("total").innerHTML = total;
						</script>
					</div><!--pay-box-->
		</div><!--invoice box-->
		<h4>Thank You! Come again!</h4>
	</body>
	<a class="button" href="../HomePage/index.php">Home</a>
</div><!--container-->
</html>
<?php
	//session_destroy();
?>