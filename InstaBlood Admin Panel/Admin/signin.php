<?php require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if( $email !='' && $password !='')
        {
             $sql= "select id,email,password,username from admin where email= '".$email."' and password='".$password."'";
        
            $result=mysqli_query($conn,$sql);
            if($row = mysqli_fetch_assoc($result))
            {
                session_start();
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
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Insta Blood - Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="icon/icon.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="font/font-awesome.min.css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<script type="text/javascript">
$(document).ready(function () {
    $('#signForm').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        }
    });
});
</script>

<body class="login-page">
     <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="login-box">
        <div class="logo">
            <h2 class="signuph">SIGN IN NOW</h2>
        </div>
        <div class="card1">
            <div class="body">
               <form id="signForm" action="" method="post">
                    <div class="input-group">
                       <span class="input-group-addon">
                           <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Your Email Address" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Your Password" required>
                        </div>
                    </div>
                 <!--    <div class="remember">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-red">
                        <label for="rememberme">Keep Me Signned In</label>
                    </div> -->
                    <div class="sign-inn">
                        <button class="btn btn-block waves-effect" name="signin" type="submit">Sign In</button>
                    </div>
                    <div class="main row m-t-15 m-b--20">
                        <div class="col-xs-6 ">
                            <a href="forgotpasswordssss.php">FORGOT PASSWORD?</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="signup.php">NEW USER? REGISTER</a>
                        </div>
                    </div>
                </form>
                <span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>

