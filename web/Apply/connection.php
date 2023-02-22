<?php

$conn= new mysqli('localhost','root','','apply');

if(!($conn)){
    echo "connection successfull";
    //die(mysqli_error($conn));
    
} 
 else{
    // echo "No successful";
 }


?>