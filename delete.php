<?php

include('db.php');


if(isset($_POST['delete'])) {

    $ID = mysqli_real_escape_string($conaction, $_POST['delete']);
    $deletequery = "DELETE FROM cars WHERE ID = $ID";
    $delete_car = mysqli_query($conaction, $deletequery );

    if(!$delete_car){
        die('QEURY FAILED' . mysqli_error($conaction));
    }

}




?>