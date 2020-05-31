<?php require_once('db_connect.php');?>

<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Insta Blood - admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

</head>


<!-- <script type="text/javascript">
$(document).ready(function () {
    $('#registerForm').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
        password : 
                {
                  required: true,
                    minlength : 5
                },
        password_confirm :

                {
                    required: true,
                    minlength : 5,
                    equalTo : "#password"
                },
        
              first_name: {
                required: true,
                 maxlength: 10
            },
            last_name: {
                required: true,
                 maxlength: 10
            },
            address: {
                required: true,
                 maxlength: 100
            },
            contact_no: {
                required: true,
                 minlength: 10,
                 maxlength: 10,
            },
    
        }
    });
});
</script> -->


<body class="login-page1">
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
            <h2 class="signuph">REGISTER NOW</h2>
        </div>
        <div class="card1">
            <div class="body">
                    <form id="registerForm" action="" method="post" >
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control"placeholder="Full Name" name="username"required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                <input type="email" name="email" placeholder="Your Email Address" class="form-control" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                               <input type="password" name="password" placeholder="Password" class="form-control" id="password" required>
                            </div>
                        </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" required>   
                        </div>
                  </div>
                    <div class="form-group">
                        <div class="forms">
                            <label class="form-label1">Gender</label>
                        </div>
                        <input type="radio" name="gender" id="male" class="with-gap"
                        <?php if (isset($gender) && $gender=="Male") echo "checked";?>
                        value="Male">
                        <!-- <input type="radio" name="gender" id="male" class="with-gap"> -->
                        <label for="male" class="m-l-20">Male</label>
                        <input type="radio" name="gender" id="female" class="with-gap"
                        <?php if (isset($gender) && $gender=="Female") echo "checked";?>
                        value="Female">
                        <!-- <input type="radio" name="gender" id="female" class="with-gap"> -->
                        <label for="female" class="m-l-20">Female</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">date_range</i>
                        </span>
                        <div class="form-line">
                            <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" placeholder="mobile number" name="contact_no" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="margin-bottom: 86px;">home</i>
                        </span>
                        <div class="form-line">
                            <textarea name="Address" cols="30" rows="5" placeholder="Address" class="form-control no-resize"></textarea>
                        </div>
                    </div>
                    <div class="sign-inn">
                        <button class="btn btn-block waves-effect" name="signup" type="submit">Sign Up</button>
                    </div>
                    <div class="main row text-center">
                       <p class="center">Have already an account ? <a href="signin.php">SIGN IN</a></p>
                    </div>
                </form>
                   <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            if (isset($_POST["username"])&& isset($_POST["password"])&& isset($_POST["email"]) && isset($_POST["gender"]) && isset($_POST["dob"])&& isset($_POST["contact_no"])&& isset($_POST["Address"]))
                            { 
                                $uname=$_POST["username"];
                                $pass=$_POST["password"];
                                $iemail=$_POST["email"];
                                $gen=$_POST["gender"];
                                $dob=$_POST["dob"];
                                $icontact=$_POST["contact_no"];
                                $add=$_POST["Address"];
                                $cpass = $_POST['cpassword'];
    
    if ($pass != $cpass) {
        echo "password must be same";
        exit;
    }
                                
                                
                        
                                if($uname!='' && $pass!='' && $iemail!='' && $gen!='' && $dob!='' && $icontact!=''&& $add!='')
                                {
                                    //echo "value not null";
                                    $sql = "insert into admin(username,password,email,gender,dob,contact_no,Address)
                                    values('".$uname."','".$pass."','".$iemail."','".$gen."','".$dob."','".$icontact."','".$add."')";
                                    
                                            
                                    $result=mysqli_query($conn,$sql);
                                    if ($result) 
                                    {
        
                                    echo "      <script>
                                        alert('Registration Sucessfully Completed !');
                                        window.location='signin.php';
                                                </script>";
    
    
                                    }
            
                                    
            }
        }
        else
        {
            echo "value not set";
        }
    }
                  
                  ?> 


          </div>
     </div>

</div>
      
<!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/form-validation.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>