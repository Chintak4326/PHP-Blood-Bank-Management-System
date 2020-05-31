
<?php
session_start();
require_once('db_connect.php');
// require_once("lib/function.php");
// include('PHPMailer/PHPMailerAutoload.php');

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
    if(isset($_POST['username']) && !empty($_POST['username']))
    {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        
        $query = "select * from admin where email = '".$username."'";
        
        $result = mysqli_query($conn, $query);
        $row=mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
        
            $arr = array();
        
                $to = $row['email'];
                $arr = $row ;
                
            $otp = mt_rand(000000,999999);
            $query1 = "update admin set otp = ".$otp.", forgot_status = 0 where 
            email = '".$to."'";
    
            $result1 = mysqli_query($conn,$query1);

            if ($result1) {
                // ini_set('smtp_port', 25);  
                // ini_set('SMTP', "smtp.live.com");
                $message = "<h3>Your new OTP is ".$otp.". Please do not share</h3>";
                $subject = "Request For OTP";     
                $headers  = 'chintakdoshi1999@gmail.com';  
                $mailSent = send_mail($to, $message, $subject,$headers);
                if ($mailSent) {
                    
                    $_SESSION['id'] = $to;
                    echo "<script>
                                window.location='otpreset.php';
                          </script>";
                } else {
                    
                }
                $array = array('status' => '200' , 'details' => $arr);
            }   
            
        }   
        
    } else {
        echo "email sending failed"; die;
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <h2 class="signuph">Forgot Password?</h2>
        </div>
        <div class="card1">
            <div class="body">
                <form id="forgot_password" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Your Email Address" required autofocus>
                        </div>
                    </div>
                    <div class="sign-inn">
                        <input type="submit" class="btn btn-block waves-effect" name="submit" value="Submit" name="login">
                    </div>
                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="signin.php">SIGN IN!</a>
                    </div>
                </form>
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
    <script src="js/pages/examples/forgot-password.js"></script>
</body>

</html>