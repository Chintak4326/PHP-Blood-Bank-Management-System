<?php

session_start();
require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if( $email !='' && $password !='')
        {
             $sql= "select id,email,password,username from donor where email= '".$email."' and password='".$password."'";
        
            $result=mysqli_query($conn,$sql);
            if($row = mysqli_fetch_assoc($result))
            {
                $_SESSION["username"] = $row['username'];
                
                header("Location:index.php");
            }
            else
            {
    
            }
            
        }
    }
}
        
?>


<!DOCTYPE html>
<html>
<head>
<title>Online Blood Donate</title>

<meta charset="utf-8">

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

	<link rel="shortcut icon" href="images/apple-touch-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome1.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

</head>
<body>

<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1 class="outline">Insta Blood Login</h1>
		<div class="header-main">
			<div class="main-icon">
				<img src="images/logos/login3.png" class="img-responsive" style="height: 100px;">
			</div>
			<h3>Login to Portal/Application</h3>
			<h6>Enter your username and password to login on:</h6>
			<div class="header-left-bottom">
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					<div class="icon1">
						<span class="fa fa-envelope"></span>
						<input type="email" name="email" placeholder="Your Email Address" required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" name="password" placeholder="Your Password" required class="form-control"/>
					</div>
					<!-- <div class="login-check">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
					</div> -->
					<div class="bottom">
						<button class="btn" name="login" value="Login">Log In</button>
					</div>
					<div class="links">
						<p><a href="forgotpassword.php">Forgot Password?</a></p>
						<p class="right"><a href="register.php">New User? Register</a></p>
						<div class="clear"></div>
					</div>
				</form>	
				<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
			</div>
		</div>
		<div class="social">
				<ul>
					<li>
						<a href="index.php" class="active scroll">Home</a>
					</li>
					<li>
						<a href="about-us.php" class="active scroll">About Us</a>
					</li>
					<li>
						<a href="searchdonor.php" class="active scroll">Search Donors</a>
					</li>
					<li>
						<a href="contact.php" class="active scroll">Contact Us</a>
					</li>
				</ul>
			</div>
	</div>
</div>

</body>
</html>