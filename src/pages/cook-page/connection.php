<?php

define('servername','localhost');
define('username','root');
define('password','');
define('dbName','inputdata');

$connect =mysqli_connect(servername,username,password,dbName) OR die('couldnt connect to database '.mysqli_connect_error());


?>

