<?php

include('db.php');


if( isset($_POST['val']) && isset($_POST['id']) ) {


    $ID  = mysqli_real_escape_string($conaction, $_POST['id']);
    $val = mysqli_real_escape_string($conaction, $_POST['val']);
    
    $query      = "UPDATE cars SET cars = '$val' WHERE ID = $ID";
    $update_car = mysqli_query($conaction, $query );

    if(!$update_car){
        die('QEURY FAILED' . mysqli_error($conaction));
    }

}




?>