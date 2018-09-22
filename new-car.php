<?php 

include('db.php');


if( isset($_POST['car_name']) ){


    $car   =  $_POST['car_name'];
    $qurey = "INSERT INTO cars(cars) VALUES ('$car')";
    $query_car_name = mysqli_query($conaction, $qurey );

    if(!$query_car_name){
        die('QEURY FAILED' . mysqli_error($conaction));
    }

}









?>