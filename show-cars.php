<?php 

include('db.php');


$qurey = "SELECT * FROM cars";
$query_car_info = mysqli_query($conaction, $qurey);

if(!$query_car_info){
    die('QEURY FAILED' . mysqli_error($conaction));
}


while ($row = mysqli_fetch_array($query_car_info)){

   echo '<tr>';

   echo '<td>'. $row["id"] .'</td>';
   echo '<td><p contenteditable="true" class="cars" data-id="'. $row["id"] .'">'. $row["cars"] . '</p></td>' ;
   echo '<td><button class="n-btn delete-btn" data-id="'. $row["id"] .'">X</button>';
   echo '</tr>';
}


?>
