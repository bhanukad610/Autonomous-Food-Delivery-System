<?php

require_once('connection.php');
$tocook=array();

if(isset($_POST)){
$query= "SELECT * from user_info WHERE showcook=0 ORDER BY id";

//$tocook=[];

    $response = mysqli_query($connect,$query);

    if($response){

        while($row=mysqli_fetch_array($response)){
            
            
            $tocook[]= $row['name'];
            $key=$row['id'];
            $alterquery="UPDATE user_info SET showcook=0 WHERE id=$key";
            $alterresponse=mysqli_query($connect,$alterquery);
        }

        
    }
    
    echo json_encode($tocook);
}



?>