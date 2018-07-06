<?php

$connect = mysqli_connect('localhost', 'root', '','inputdata'); 

//checking for the connection
if (mysqli_connect_errno()){
	die('Database connection failed' . mysqli_connect_error());
}

 ?>