<?php

include('db.php');


if(isset($_POST['delete'])) {

    $deletequery = ("DELETE FROM cars(cars) WHERE ID ='$_POST[id]'");
    $delete_car = mysqli_query($conaction, $deletequery );

    if(!$delete_car){
        die('QEURY FAILED' . mysqli_error($conaction));
    }

}




?>