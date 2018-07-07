<?php

require_once('connection.php');
$tocook=array();
$toDeliver=array();

//showcook=0 and queued=0 and delivered=0 means the item is shown in the to cook list
//showcook=1 and queued=0 and delivered=0 means the item is finished preparing,removed from cook list and added to to deliver list
//showcook=1 and queued=1 and delivered=0 means the delivery has started 
//showcook=1 and queued=1 and delivered=1 means delivery is finished.So it should be removed from both lists.

$toCookQuery= "SELECT * from user_info WHERE showcook=0 ORDER BY id";
$toDeliverQuery="SELECT * from user_info WHERE showcook=1 and queued=0 ORDER BY id";



    $toCookResponse = mysqli_query($connect,$toCookQuery);
    $toDeliverResponse=mysqli_query($connect,$toDeliverQuery);

    
    if($toCookResponse){
        while($row=mysqli_fetch_array($toCookResponse)){
            $name= $row['name'];
            $id = $row['id'];
            $tableno = $row['tableno'];
            $tocook[] = array('name'=>$name,'id'=>$id, 'tableno' => $tableno);
        }
    }

    if($toDeliverResponse){
        while ($row=mysqli_fetch_array($toDeliverResponse)) {
            $name= $row['name'];
            $id = $row['id'];
            $tableno = $row['tableno'];
            $toDeliver[]= array('name'=>$name,'id'=>$id, 'tableno' => $tableno);
        }
    }



if( isset($_GET["element"])){
    $element=$_GET["element"];
    echo $element;
    $sqlElement=mysql_real_escape_string($element);

    $updateCookArrayQuery= "UPDATE user_info SET showcook=1 WHERE id='$sqlElement'";
    $updateCookArray=mysqli_query($connect,$updateCookArrayQuery);

    if ($connect->query($updateCookArrayQuery)===TRUE) {
        echo "data updated succesfully";
    }
    else{
        echo "error". $connect->error;
    }
    $connect->close();

    array_push($toDeliver,$element);
    unset($tocook[$element]);       //unset is not happening
    echo '<pre>'; print_r($tocook); echo '</pre>';
    echo '<pre>'; print_r($toDeliver); echo '</pre>';

}

//yet to write
if(isset($_GET["reset"])){
    foreach ($toDeliver as $value) {
        
        $id=mysql_real_escape_string($value['id']);
        echo $id;
        $ResetQuery="UPDATE user_info SET showcook=0 WHERE id='$id'";
        $ResetResult = mysqli_query($connect,$ResetQuery);
        
        if ($connect->query($ResetQuery)===TRUE) {
        echo "data updated succesfully";
        }
        else{
            echo "error". $connect->error;
        }
        

    }
    $connect->close();
}
    
   



?>