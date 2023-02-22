<?php
include 'connection.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prefect Applications</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
    body {
        background-image: url("assests/images/back2.jpg");


    }

    .head {
        text-align: center;
        margin-top: 10px;


    }

    .regform {
        margin-top: 60px;
        padding: 20px;
        background: #008080;
        border-radius: 13px;
        margin-left: 50px;
        margin-right: 50px;
    }
    </style>


</head>

<body>
    <h1 class="head"><b> Applications </b> </h1>
    <div class="regform">
        <div class="container">
            <!--button class="btn btn-primary my-5"><a href="user.php" class="text-light"> Add user</a>
 </button-->
            <table class="table table-hover">
                <thead class="bg-dark" style="color:white">
                    <tr>

                        <th>Candidate Name</th>
                        <th>Admission Number</th>
                        <th>Grade</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Details</th>
                        <th>Certificate</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
      // Include database file
      include 'customers.php';

      $customerObj = new Customers();
      $customers = $customerObj->displayData(); 

      foreach ($customers as $customer) {
       
      ?>
                    <tr>

                        <td><?php echo $customer['cname']; ?></td>
                        <td><?php echo $customer['adnum']; ?></td>
                        <td><?php echo $customer['grade']; ?></td>
                        <td><?php echo date('d-M-Y', strtotime($customer['dob'])); ?></td>
                        <td><?php echo $customer['address']; ?></td>
                        <td><?php echo $customer['email']; ?></td>
                        <td><img src="<?php echo 'uploads/'. $customer['file1'] ?>" width="100px"></td>
                        <td><img src="<?php echo 'uploads/'. $customer['file2'] ?>" width="100px"></td>
                        <td><img src="<?php echo 'uploads/'. $customer['file3'] ?>" width="100px"></td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>