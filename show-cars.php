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
   echo '<td><a class="cars car-'. $row["id"] .'" href="#">'. $row["cars"] .'</td>';
   echo '</tr>';

}



?>