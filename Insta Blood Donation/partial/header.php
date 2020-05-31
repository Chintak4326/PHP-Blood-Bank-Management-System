<?php
session_start();
require_once('db_connect.php');
    
?>

<?php 

  $sql="select instablood_number,instablood_email from `instablood`";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result))
  {   

?>      
    <div class="top-bar">
		<div class="container">
			<div class="row">
                <div class="col-md-9 col-sm-9">
                    <div class="left-top">
                        <div class="email-box">
                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $row['instablood_email']?></a>
                        </div>
                        <div class="phone-box">
                            <a href="tel:1234567890"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $row['instablood_number']?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="right-top">
                        <div class="clock-box">
                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Working hours: 9 AM to 8 PM</a>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
          <?php
  }
  ?>
    <div class="container">
            <div class="col-md-4 col-sm-4 col-xs-8">
                <a href="index.php"><img src="images/logos/logo.png" alt="image" class="responsive"widt="100px"height="100px"></a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12 Login-class">
                <div class="Login-main" >
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                 <ul class="nav pull-right top-menu">
                                    <li class="dropdown">
                                         <?php if (!empty($_SESSION['username'])) { ?>
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" >
                                                <span class="username"><?php echo $_SESSION['username']; ?></span>
                                                <b class="caret"></b>
                                            </a><?php } else { ?>
                                                <div class="Login-main" >
                                                    <div class="Login"><a href="login.php" class="login-btn" style="color:white;">LOGIN</a></div>
                                                    <div class="Donor"><a href="register.php" class="Donor-btn"  style="color:white;">BECOME A DONOR</a></div>
                                            </div>
                                            <?php } 
                                        ?>
                                        <ul class="dropdown-menu extended logout">
                                            <!-- <li><a href="#"><i class="fa fa-user" style="color: black;"></i> &nbsp; &nbsp;;Profile</a></li>
                                            <li><a href="signup.php"><i class="fa fa-users" style="color: black;"></i>&nbsp; &nbsp;Add New Admin</a></li> -->
                                            <li><a href="logout.php"><i class="fa fa-backward" style="color: black;"></i>&nbsp; &nbsp;Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>      
                </div>  
            </div>
    </div>
    <header>
        <div class="header-nav">
                    <div class="container">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header logo">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- navbar-header -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active1">
                                        <a href="index.php" class="scroll">Home</a>
                                    </li>
                                    <li>
                                        <a href="about-us.php" class="scroll">About Us</a>
                                    </li>
                                    <li>
                                        <a href="searchdonor.php" class="scroll">Search Donor</a>
                                    </li>
                                    <li>
                                        <a href="register.php" class="scroll">Register As Donor</a>
                                    </li>
                                    <li>
                                        <a href="requestblood.php" class="scroll">Request Blood</a>
                                    </li>
                                     <li>
                                        <a href="bloodtip.php" class="scroll">Blood Tips</a>
                                    </li>
                                     <li>
                                        <a href="gallery.php" class="scroll">Gallery</a>
                                    </li>
                                     <li>
                                        <a href="contact.php" class="scroll">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>
                        </nav>
                        <div class="clearfix"> </div>
                    </div>
                </div>
    </header>

    