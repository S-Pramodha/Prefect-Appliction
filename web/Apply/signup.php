<?php
  require 'connection.php';
  //require 'signupvalidation.php';

  if (isset($_POST['submit'])) 
  {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword)
    {
		$sql = "SELECT * FROM registration WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO registration (name, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
                header("Location: login.php");
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Now</title>

    <!--LINKING EXTERNAL BOOTRSAP FILES-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!--LINKING EXTERNAL JS FILES-->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>



    <style>
    body {
        background-image: url("assests/images/back2.jpg");

    }

    .regbtn {
        background: #008080;
        width: 100%;
        border: none;
        padding: 10px 20px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        color: white;

    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border box;

    }

    .loginContainer {
        background: url("assests/images/back2.jpg");
        background-position: center;
        background-size: cover;
        height: 100vh;

    }

    
    .loginContainer:after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.7);
    }

    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        z-index: 999;
        width: 370px;
        padding: 60px 32px;
        background: rgba(255, 255, 255, 0.04);
        box-shadow: -px 4px28px 0px rgba(0, 0, 0, 0.75);
    }

    .content h1 {
        color: white;
        font-size: 30px;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
        margin: 0 0 35px 0;

    }

    .field {
        position: relative;
        height: 45px;
        width: 100%;
        display: flex;
        background: rgba(255, 255, 255, 0.94);
    }

    .field span {
        color: #222;
        width: 40px;
        line-height: 45px;

    }

    .field input {
        height: 100%;
        width: 100%;
        background: transparent;
        border: none;
        outline: none;
        color: #222;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
    }

    .space {
        margin-top: 16px;
    }

    .acc {
        text-align: center;
        margin: 10px 0;

        color: white;
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
    }
    </style>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <div class="loginContainer">
        <div class="content">
            <h1>Register Form</h1>

            <form method="POST" id="register-form" name="register" action="signup.php">
                <div class="field">
                    <span class="fas fa-user-alt"></span>
                    <input type="text" placeholder="Username" name="username" value="<?php //echo $username; ?>" required>
                </div>

                <div class="field space">
                    <span class="fa fa-envelope"></span>
                    <input type="email" placeholder="Email" name="email" value="<?php //echo $email; ?>" required>
                </div>

                <div class="field space">
                    <span class="fas fa-lock"></span>
                    <input type="password" placeholder="Password" name="password"
                        value="<?php //echo $_POST['password']; ?>" required>
                </div>

                <div class="field space">
                    <span class="fa fa-check"></span>
                    <input type="password" placeholder="Confirm Password" name="cpassword"
                        value="<?php //echo $_POST['cpassword']; ?>" required>
                </div>

                <br><br>

                <button class="regbtn" name="submit" class="btn">Register</button>
                <br>

            </form>


</body>

</html>