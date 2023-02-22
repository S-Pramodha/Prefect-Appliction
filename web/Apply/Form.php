<?php

// Include database file
include 'customers.php';

$customerObj = new Customers();

// Insert Record in customer table
if(isset($_POST['submit'])) {

    $cname     =$_POST['cname'];
    $adnum     =$_POST['adnum'];
    $grade     =$_POST['grade'];
    $dob       =$_POST['dob'];
	$email     =$_POST['email'];
    $address   =$_POST['address'];

    
    $file1 = $_FILES['image'];
    $file2 = $_FILES['image2'];
    $file3 = $_FILES['image3'];

    $insertData = $customerObj->insertData($cname,$adnum,$grade,$dob,$email,$address, $file1,$file2,$file3);

    if ($insertData){
        header("");
    }else{
        return false;
    }

}
?>
<html>

<head>
    <title>
       Application
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    
        

   


    <style>
    body {
        background-image: url("assests/images/back2.jpg");
       
    
    }

    .container {
        margin-top: 60px;
        background-color: transparent;
       
    }

    .regform {
        margin-top: 60px;
        padding: 20px;
        background:#008080;
        border-radius: 13px;
       
    }

    .title {
        color: rgb(241, 241, 241);
    }

    .form-group {
        margin-top: 20px;
        width: 100%;
        /*color: rgb(255, 255, 255);*/
    }

    #submit {
        margin-top: 20px;
        width: 100%;

    }

    .p{
        color: white;
    }

    
    


    </style>


</head>

<body>

<div class="container">
        <div class="row">
           <div class="col-lg-3"></div>
            <div class="col-lg-6">
          

                <div class="regform">
                    <center>
                        <h1 class="title">G/Darmasoka College</h1>
                        <h3 class="title"> PREFECT APPLICATION FORM </h3>

                    </center>

                    <form method="POST" action="Form.php" enctype="multipart/form-data" action="upload.php">
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label style="color:white;" for="">1.Candidate Name</label>
                                    <input type="text" class="form-control" name="cname" placeholder="Enter name" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  style="color:white;" for="">2.Admission Number</label>
                            <input type="text" class="form-control" name="adnum" placeholder="Enter Admission Name" required="">
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label style="color:white;"  for="">3.Grade</label>
                                    <input type="text" class="form-control" name="grade" placeholder="Enter Your Grade" required="">
                                </div>
                            </div>

                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label style="color:white;" for="">4.Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" required="">
                                </div>
                            


                            <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label style="color:white;" for="">5.Email</label>
                                    <input type="email" class="form-control" name="email" required="" placeholder="Enter Your Email">
                                </div>
                            </div>

                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label style="color:white;" for="">6.Address</label>
                                    <input type="text" class="form-control" name="address" required="" placeholder="Address">
                                </div>
                            
                            <br>

                            
                            <div class="row">
                                
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <p style="color:white;">7.You have to upload a word file or Photos above  details : </p>

<ul style="color:white;">
                 <li>International/National/Provincial Compititions highest Achivements represnting School</li>
                 <li>Opportunities to take the lead in Sports-related Activities</li>
                 <li>Color Awards(School,Provincial,National)</li>
                 <li>Color Awards(School,Provincial,National) </li>
                 <li>For Projects Completed as a Student</li>
                 <li>Occasions when special talents are recognized at special occasions at school or outside of school</li>
         </ul>
 </div>

                                    
                                <input type="file" class="form-control" name="image" required="">
                                    <br>
                                    <br>
                                    
                                    <p style="color:white;"> 8.Upload Your Certificate(Allow Photos) </p>
                                    <input type="file" class="form-control" name="image2" required="">

                                    <br>
                                                                      
                                    
                                 <p style="color:white;"> 9.Upload Your Photo (It's must be 4*5 size) </p>
                                 <input type="file" class="form-control" name="image3" required="">

                            

                                <input type="submit" name="submit" id="submit" value="submit" class="btn btn-info btn-warning">
                        <!--input  type="reset" id="submit" value="Submit" class="btn btn-info btn-warning"-->

                    






                                    
                                    