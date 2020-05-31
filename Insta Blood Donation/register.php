<?php
require_once('db_connect.php');
session_start();
// $sql="select id,name from country";
// $stmt=$conn->prepare($sql);
// $stmt->execute();
// $arrCountry=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up Form by Colorlib</title>

    <link rel="shortcut icon" href="images/apple-touch-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="./js/custom-hp.js"></script>
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/register1.jpg" style="width: 100%;">
                    <div class="signup-img-content">
                        <h2 class="register-now">Register As<br>Donor </h2>
                    </div>
                </div>
                <div class="signup-form">
                    <form role="form" class="register-form" method="post" action="" name="signupform" id="signupform">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="register">Login Information</div>
                            </div>
                            <div class="form-group">
                                <div class="home">
                                    <i class="fa fa-user"><a href="login.php"><span>LOGIN</span></a></i>
                                    <a href="index.php"><i class="fa fa-home"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name*</label>
                                <input type="text" name="username" placeholder="Enter Full Name" class="form-control" />
                            </div>
                             <div class="form-group">
                                <label for="address">Password*</label>
                                <input type="password" name="password" placeholder="Password" class="form-control" />
                            </div>
                        </div>
                        <div class="form-row">
                             <div class="form-group">
                                <label for="address">Confirm Password*</label>
                                <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="father_name">Email*</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" />
                            </div>
                        </div>
                        <h2 class="register-head">Donor Information</h2>
                        <div class="form-row">
                           <div class="form-group">
                                <label for="validationCustom01">Date Of Birth*</label>
                                <input type="date" name="dob" class="form-control" id="validationCustom01">
                            </div>
                            <div class="form-group">
                                <label for="city">Gender*</label>
                                <div class="radio-main">
                                    <label class="radio-inline" id="radio1">
                                        <input type="radio" name="gender" id="male" class="radio_btn"
                                        <?php if (isset($gender) && $gender=="Male") echo "checked";?>
                                        value="Male"><span class="radio">Male</span>
                                    </label>
                                    <label class="radio-inline:" id="radio2">
                                        <input type="radio" name="gender" id="female" class="radio_btn"
                                        <?php if (isset($gender) && $gender=="Female") echo "checked";?>
                                        value="Female"><span class="radio">Female</span>
                                    </label>
                                </div>  
                            </div>
                        </div>
                        <div class="form-row">
                             <div class="form-group">
                                <label for="state">Select Blood Group*</label>
                                <div class="form-select">
                                    <select name="blood_grp" id="state1">
                                        <option selected>Select Blood Group</option>
                                            <?php
                                                $sql = "SELECT * FROM bloodgroup";
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option value="<?php echo $row['blood_grp_id'] ?>"><?php echo $row['blood_grp_name'] ?></option>
                                            <?php } ?>
                                    </select> 
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="city">Weight (kg)*</label>
                                <input type="text" name="weight" placeholder="Weight" id="weight"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="validationCustom01">Last Donation Date</label>
                                <input type="date" name="last_don_date" class="form-control" id="validationCustom01">
                            </div>
                            <div class="form-group">
                            </div>
                        </div>
                      <h2 class="register-head">Contact Information</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="country">Country</label>
                                    <select name="country_name" class="form-control" id="country">
                                        <option value="-1">Select Country</option>
                                        <?php
                                            $sql = "SELECT * FROM country";
                                            $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                    <select name="state_name" class="form-control" id="state">
                                        <option>Select State</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                    <select name="city_name" class="form-control" id="city">
                                        <option>Select City</option>
                                    </select>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    jQuery('#country').change(function(){
                                        var id=jQuery(this).val();
                                        if(id=='-1'){
                                            jQuery('#state').html('<option value="-1">Select State</option>');
                                        }else{
                                            $("#divLoading").addClass('show');
                                            jQuery('#state').html('<option value="-1">Select State</option>');
                                            jQuery('#city').html('<option value="-1">Select City</option>');
                                            jQuery.ajax({
                                                type:'post',
                                                url:'get_data.php',
                                                data:'id='+id+'&type=state',
                                                success:function(result){
                                                    $("#divLoading").removeClass('show');
                                                    jQuery('#state').append(result);
                                                }
                                            });
                                        }
                                    });
                                    jQuery('#state').change(function(){
                                        var id=jQuery(this).val();
                                        if(id=='-1'){
                                            jQuery('#city').html('<option value="-1">Select City</option>');
                                        }else{
                                            $("#divLoading").addClass('show');
                                            jQuery('#city').html('<option value="-1">Select City</option>');
                                            jQuery.ajax({
                                                type:'post',
                                                url:'get_data.php',
                                                data:'id='+id+'&type=city',
                                                success:function(result){
                                                    $("#divLoading").removeClass('show');
                                                    jQuery('#city').append(result);
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>
                        
                         <div class="form-row">
                             <div class="form-group">
                                <label for="address">Mobile No*</label>
                                <input type="number" name="mobile_no"  placeholder="Mobile No" id="mobile_no"/>
                            </div>
                            <div class="form-group">
                                <label for="city">Pin/Zip Code*</label>
                                <div class="form-select">
                                    <input type="number" name="pincode" placeholder="Pincode" id="pincode"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                               <label for="city">Address*</label>
                                    <div class="input-group">
                                        <textarea class="form-select" name="address" placeholder="Address"></textarea>
                                    </div>
                            </div>
                        </div>
                            <div class="form-submit">
                                <input type="submit" name="signup" value="Submit" class="submit-btn">
                            </div> 
                        </form>
                      <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            if (isset($_POST["username"])&& isset($_POST["password"])&& isset($_POST["email"]) && isset($_POST["dob"])&& isset($_POST["gender"])&&isset($_POST["blood_grp"])&& isset($_POST["weight"])&& isset($_POST["last_don_date"])&& isset($_POST["country_name"])&& isset($_POST["state_name"])&& isset($_POST["city_name"])&& isset($_POST["mobile_no"])&& isset($_POST["pincode"])&& isset($_POST["address"]))
                            { 
                                $uname=$_POST["username"];
                                $pass=$_POST["password"];
                                $iemail=$_POST["email"];
                                $dob=$_POST["dob"];
                                $gen=$_POST["gender"];
                                $bldgrp=$_POST["blood_grp"];
                                $weight=$_POST["weight"];
                                $ldn=$_POST["last_don_date"];
                                $c_name=$_POST["country_name"];
                                $s_name=$_POST["state_name"];
                                $city_name=$_POST["city_name"];
                                $icontact=$_POST["mobile_no"];
                                $pincode=$_POST["pincode"];
                                $add=$_POST["address"];
                                $cpass = $_POST["cpassword"];
    
    if ($pass != $cpass) {
        echo "password must be same";
        exit;
    }
                                
                             
                                if($uname!='' && $pass!='' && $iemail!='' && $dob!='' && $gen!='' && $bldgrp!='' && $weight!='' && $ldn!='' && $c_name!='' && $s_name!='' && $city_name!='' && $icontact!='' && $pincode!='' && $add!='')
                                {
                                    // echo "value not null";s
                                    $sql = "insert into donor(username,password,email,dob,gender,blood_grp,weight,last_don_date,country_name,state_name,city_name,mobile_no,pincode,address)values('".$uname."','".$pass."','".$iemail."','".$dob."','".$gen."','".$bldgrp."','".$weight."','".$ldn."','".$c_name."','".$s_name."','".$city_name."','".$icontact."','".$pincode."','".$add."')";
                                    
                                            
                                    $result=mysqli_query($conn,$sql);
                                    if ($result) 
                                    {
        
                                    echo "      <script>
                                        alert('Registration Sucessfully Completed !');
                                        window.location='login.php';
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
        </div>
 <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>  
</body>
</html>