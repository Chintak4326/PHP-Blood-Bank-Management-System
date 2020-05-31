<?php
require_once("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>Online Blood Donate</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link rel="shortcut icon" href="images/apple-touch-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
    <link rel="stylesheet" href="style.css">
  
    <link rel="stylesheet" href="css/responsive.css">
   
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/modernizer.js"></script>

</head>
<body>
    <?php include_once('partial/header.php'); ?>

   	<div class="banner-area banner-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner">
						<h2>Contact Us</h2>
						<ul class="page-title-link">
							<li><a href="index.php">Home</a></li>
							<li><a href="contact.php">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

 <div id="contact" class="section wb">
    <div class="container">
            <div class="section-title text-center">
                <h3>Get in touch</h3>
                <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
            </div>
            <div class="row">
                <div class="col-md-12 contact-margin">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form method="post" >
                        <!-- <form id="contactform" class="row" action="send_contact.php" name="contactform" method="post"> -->
                            <fieldset class="row-fluid">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">First Name*</label>
                                        <div class="input-group">
                                            <span class="input-icon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" name="fname" placeholder="First Name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Last Name*</label>
                                        <div class="input-group">
                                            <span class="input-icon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input  type="text" name="lname" placeholder="Last Name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">E-Mail</label>  
                                            <div class="input-group">
                                                <span class="input-icon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input   type="email" name="email_id" placeholder="E-Mail Address" class="form-control">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phone</label>  
                                            <div class="input-group">
                                                <span class="input-icon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                <input type="number" name="mobile_no" placeholder="(+91)55524-12125" class="form-control" >
                                            </div>
                                    </div>
                                </div>
                         
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">City</label>  
                                            <div class="input-group">
                                                <span class="input-icon"><i class="glyphicon glyphicon-home"></i></span>
                                                <input  type="text" name="city" placeholder="city" class="form-control" >
                                            </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Give us more details..</label>
                                            <div class="input-group">
                                                <span class="input-icon"><i class="glyphicon glyphicon-pencil"></i></span>
                                                <textarea type="text" class="form-control" name="message" placeholder="Message"></textarea>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-md-12 control-label"></label>
                                  <div class="col-md-6 col-md-offset-3 text-center">
                                    <button type="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Send Message</button>
                                  </div>
                                </div>
                            </fieldset>
                        </form>
        
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {

        if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email_id"]) && 
        isset($_POST["mobile_no"]) && isset($_POST["city"]) && isset($_POST["message"]))
        
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $email1=$_POST["email_id"];
        $mobile=$_POST["mobile_no"];
        $city1=$_POST["city"];
        $message1=$_POST["message"];
        
        if($fname!='' && $lname!='' && $email1!='' && $mobile!='' && $city1!='' && $message1!='')
        {
            $sql="INSERT INTO contactus(fname,lname,email_id,mobile_no,city,message)
            VALUES('".$fname."','".$lname."','".$email1."','".$mobile."','".$city1."','".$message1."')";

            $result=mysqli_query($conn,$sql);
            
            if($result)
            {
                //header("location:index.php");
                echo "      <script>
                        alert('Your Messege has Been Sent To Admin !');
                        window.location='contact.php';
                    </script>";
                //echo "<meta http-equiv='refresh' content='0;url=index.php'>";
                
            }
        }
        
        else{
            echo "Value not set";
        }
    }
    ?>  
                            

                    </div>
                </div>
            </div>
<?php 

  $sql="select instablood_number,instablood_email from `instablood`";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result))
  {   

?>        
          <div class="row">
                <div class="col-md-12 pd-add">
                    <div class="col-md-4">
                        <div class="address-item">
                            <div class="address-icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <h3>Email Us</h3>
                            <p><?php echo $row['instablood_email']?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="address-item">
                            <div class="address-icon">
                                <i class="icon icon-headphones"></i>
                            </div>
                            <h3>Call Us</h3>
                            <p><?php echo $row['instablood_number']?></p>
                        </div>
                    </div>
                      <div class="col-md-4">
                        <div class="address-item">
                            <div class="address-icon">
                                <i class="fa fa-envelope" style="background-color: unset;"></i>
                            </div>
                            <h3>Social Icons</h3>
                            <a href="#" class="fa fa-facebook" id="icon1"></a>
                            <a href="#" class="fa fa-envelope" id="icon"></a>
                            <a href="#" class="fa fa-instagram" id="icon"></a>
                            <a href="#" class="fa fa-whatsapp" id="icon"></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
  }
  ?>
    </div>
</div>

    <?php include_once('partial/footer.php'); ?>
     <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>  
</body>
</html>