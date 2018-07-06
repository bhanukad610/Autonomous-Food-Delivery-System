<?php

require_once("connection.php");

$sql = "SELECT * FROM user_info WHERE showcook=0 ORDER BY id";
$res = mysqli_query($connect,$sql);
echo "ran";
if(mysqli_num_rows($res)>0){

    while($row=mysqli_fetch_array($res)){

        echo '<li>'.$row['name'].'</li>';
    }
}


?>