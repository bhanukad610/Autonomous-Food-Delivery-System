<?php

require_once('connection.php');


$query= "SELECT id,name,email,phone,tableno,food,showcook,queued,delivered from user_info";

$response = mysqli_query($connect,$query);

if($response){
    //Create the table head
    echo '<table alingn="left" cellspacing="5" cellpadding="8"> //
    
    <tr><td align="left"><b>ID</b></td>
    <td align="left"><b>Name</b></td>
    <td align="left"><b>Email</b></td>
    <td align="left"><b>Phone Number</b></td>
     <td align="left"><b>Table Number</b></td>
    <td align="left"><b>Food Item</b></td>
    <td align="left"><b>Showed to Cook</b></td>
    <td align="left"><b>Queued to deliver</b></td>
    <td align="left"><b>Delivered</b></td>';

    //Print data rows
    while($row=mysqli_fetch_array($response)){
        echo '<tr><td align="left">'.$row['id'].
        '</td><td align="left">'.$row['name'].
        '</td><td align="left">'.$row['email'].
        '</td><td align="left">'.$row['phone'].
        '</td><td align="left">'.$row['tableno'].
        '</td><td align="left">'.$row['food'].
        '</td><td align="left">'.$row['showcook'].
        '</td><td align="left">'.$row['queued'].
        '</td><td align="left">'.$row['delivered'].'</tr>';

    }

   
}


/*
 function getData(){
    $myqueue = array(); 
    echo $myqueue;
    $connect =new mysqli(servername,username,password,dbName);
    $sql= "SELECT id,name,email,phone,tableno,food,queued,delivered from user_info";
    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        //output data of each row
        while($row = $result-> fetch_assoc()){
            //echo "name: ".$row['email'];
            if($row['queued']==0){ //check whether the cook has sent this to robot's delivery queue
                array_push($myqueue,$row['id']);
            }   
        }
        foreach ( $myqueue as $variable) {
            echo $variable;
        }
    }
    else{
        echo 'zero results';
    }
    $connect->close();
 }
*/
?>