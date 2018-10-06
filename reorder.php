<?php

include('db.php');


if( isset($_POST['oldID']) && isset($_POST['newId']) ) {

    echo 'yess second time';
    //$oldID  = mysqli_real_escape_string($conaction, $_POST['oldID']);
    //$newId = mysqli_real_escape_string($conaction, $_POST['newId']);
    
    //$query      = "UPDATE table SET position = $i WHERE id = $id";
    //$reorder_list = mysqli_query($conaction, $query );

    $i = 0;
    foreach ($_POST['item'] as $value) {
        // Sanitize the input
        $oldID  = mysqli_real_escape_string($conaction, $_POST['oldID']);
        $newId = mysqli_real_escape_string($conaction, $_POST['newId']);
        // Build statement:
        $query  = "UPDATE cars SET $newId = $i WHERE $oldID = $value";

        // Execute statement:

        if(mysqli_query($conaction, $query)) {
	    echo "Record modified successfully.";
        } else {
	    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }
        $i++;

        /*
        if(!$reorder_list){
            die('QEURY FAILED' . mysqli_error($conaction));
        }*/



    }




    

}




?>