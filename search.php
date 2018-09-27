<?php 

include('db.php');

/*
if ($conaction) {
    echo 'YESSS is conatcted!!!!';
}*/

$search = mysqli_real_escape_string($conaction, $_POST['key']);

if (!empty($search)){

    $query      = "SELECT * FROM cars WHERE cars LIKE '$search%' ";
    $search_query = mysqli_query($conaction, $query);

    if (!$search_query) {

        die('QEURY FAILED' . mysqli_error($conaction));
    }  

    ?> <ul class="list-group"> <?php

     while( $row = mysqli_fetch_array($search_query)){ 

        $cars = $row['cars']; 
        echo '<li class="list-group-item"><a class=" list-group-item-action" href="#">'. $cars .' in stock</a></li>';
    } 

    ?> </ul> <?php

    


}



?>