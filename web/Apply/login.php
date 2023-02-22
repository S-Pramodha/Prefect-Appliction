<?php
    require 'connection.php';

    if(isset($_POST['submit'])){
        $checkname     = $_POST['email'];
        $checkpassword = $_POST['password'];
		
        //Query for retrieving username and password

        $sql = "SELECT email,password FROM registration WHERE email ='$checkname' AND password='$checkpassword'";
        $result = mysqli_query($conn,$sql);

        if(!$result){
            //die(mysqli_error($con));
            echo("Invalid Login");
        }
    }
?>        

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <!--LINKING EXTERNAL BOOTRSAP FILES-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
    <!--LINKING EXTERNAL JS FILES-->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src = 'https://kit.fontawesome.com/a076d05399.js'></script>



    <style>
    body {
        background-image: url("assests/images/back2.jpg");
       
    }

    .btn{
        background:#008080;
        width: 100%;
        border: none;
        padding: 10px 20px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        color:white;
    }

    .loginContainer{
    background : url("assests/images/back2.jpg");
    background-position:center;
    background-size: cover;
    height:100vh;
   
}

.loginContainer:after{ 
    position: absolute;
    content: '';
    top: 0;
    left:0;
    height:100%;
    width:100%;
    background: rgba(0, 0, 0, 0.7);
}

.content{
    position: absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 999;
    width: 370px;
    padding:60px 32px ;
    background: rgba(255, 255, 255, 0.04);
    box-shadow: -px 4px28px 0px rgba(0, 0, 0, 0.75);    
}

.content h1{
    color: white;
    font-size: 30px;
    font-weight: 600;
    font-family: 'Montserrat',sans-serif;
    margin: 0 0 35px 0;

}

.field{
    position: relative;
    height: 45px;
    width: 100%;
    display:flex;
    background: rgba(255, 255, 255, 0.94);
}

.field span{
    color:#222;
    width:40px;
    line-height:45px;

}

.field input{
    height:100%;
    width:100%;
    background:transparent;
    border:none;
    outline: none;
    color:#222;
    font-size: 16px;
    font-family:'Poppins',sans-serif;
}

.space{
    margin-top: 16px;
}

.acc{
    text-align: center;
    margin:10px 0;
    
    color:white;
    font-size: 15px;
    font-family: 'Poppins',sans-serif;
}
    </style>
    

</head>
<body>

<div class = "loginContainer">
    <div class = "content">
        <h1>Login Form</h1>

        <!--<div class="row">
	        <div class="col-xs-6">
		        <a href="" class="active" id="login-form">Login</a>
	        </div>
	
            <div class="col-xs-6">
		        <a href="" id="register-form">Register</a>
	        </div>
            <hr>
        </div>-->
 
        <form method="POST" id = "login-form" name = "login" action="choice.php" >
        <div class = "field">
            <span class = "fas fa-user-alt"></span>
            <input type = "text" name = "email" placeholder = "email" id = "myname" required >
        </div>
         
        <div class = "field space">
            <span class = "fas fa-lock"></span>
            <input type = "password" name = "password" placeholder = "password" required > 
        </div>
        <
            <input class="btn"  type = "submit" value = "Login" name ="submit">    
       
        </form>                                                   
        <div class ="acc"> Don't have account? <a href = "signup.php" >Signup Now</a></div>
    </div>
 </div>  
</body>
</html>