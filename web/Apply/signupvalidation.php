<?php
    require 'connection.php';

    if(isset($_POST['submit'])){
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $confirm  = $_POST['Confirmpassword'];

        if($password == $confirm){
            $sql_insert = "INSERT INTO registration (name, email, password) VALUES('$name', '$email', '$password')";
            $result     = mysqli_query($conn, $sql_insert);
        }

        if(!$result){
            die(mysqli_error($conn));
            
        }

    }   
?>

