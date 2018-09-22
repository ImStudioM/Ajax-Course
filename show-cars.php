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
   echo '<td>';
   echo '<button class="n-btn delete-btn" data-id="'. $row["id"] .'">X</button>';
   echo '<a class="cars car-'. $row["id"] .'" href="#">'. $row["cars"] . '</a>' ;
   echo '<button class="n-btn edit-btn" data-id="'. $row["id"] .'">v</button>';
   echo '</td>';
   echo '</tr>';

}



?>
