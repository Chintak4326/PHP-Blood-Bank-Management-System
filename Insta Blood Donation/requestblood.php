<?php
require_once("db_connect.php");
include_once('partial/header.php'); 
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
	 <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Request Blood</h2>
                        <ul class="page-title-link">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="requestblood.php">Request Blood</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="section wb">
    	<div class="container">
    		<div class="section-title text-center">
                <h3>Request For Blood</h3>
            </div>
            <div class="col-md-12 contact-margin1">
            	<div class="contact_form1">
            		<form method="post">
            			<div class="form-row">
                			<div class="col-md-4 mb-3 form-group">
                  				<label>Patient Name</label>
                  				<input type="text" class="form-control" name="patient_name" placeholder="Patient Name" required>
                			</div>
	                		<div class="col-md-4 mb-3 form-group">
	                  			<label>Contact Name</label>
	                  			<input type="text" class="form-control" name="contact_name" placeholder="Contact Name" required>
	                		</div>
	                		<div class="col-md-4 mb-3 form-group">
	                  			<label>Email</label>
	                  			<input type="email" class="form-control"name="contact_email_id" placeholder="Email" required>
	                		</div>
            			</div>
            			<div class="form-row">
                			<div class="col-md-4 mb-3 form-group">
                    			<label>Blood Group</label>
                                    <select name="blood_grp_name" id="state1">
	                                    <option selected>Select Blood Group</option>
	                                        <?php
	                                        $sql = "SELECT * FROM bloodgroup";
	                                        $result = mysqli_query($conn, $sql);
	                                        while($row = mysqli_fetch_assoc($result))
	                                        {
	                                        ?>
	                                    <option value="<?php echo $row['blood_grp_id'] 	?>"><?php echo $row['blood_grp_name'] ?>
	                                    </option>
	                                        <?php 
	                                    		    } 
	                                        ?>
                                   	</select>
							</div>
                			<div class="col-md-4 mb-3 form-group">
                  				<label>Contact Number</label>
                  					<input type="text" class="form-control" name="contact_no" placeholder="Contact Number" required>
                			</div>
                			<div class="col-md-4 mb-3 form-group">
                  				<label>City</label>
                  					<input type="text" class="form-control" name="city_name" placeholder="city Name" required>
                			</div>
            			</div>
            			<div class="form-row">
                			<div class="col-md-4 mb-3 form-group">
                    			<label>State</label>
                     				<input type="text" class="form-control" name="state_name" placeholder="State Name" required>
                 			</div>
                			<div class="col-md-4 mb-3 form-group">
                   				<label>District</label>
                   				<input type="text" class="form-control"  name="district_name" placeholder="District Name" required>  
               				</div>
               		 		<div class="col-md-4 mb-3 form-group">
                    			<label>Tehsil</label>
                    			<input type="text" class="form-control"  name="tehsil_name" placeholder="Tehsil Name" required>   
                			</div>
            			</div>
            			<div class="form-row">
                			<div class="col-md-4 mb-3 form-group">
                  				<label >Required Date</label>
                  				<input type="date" class="form-control" name="blood_req_date"required>
                			</div>
                			<div class="col-md-4 mb-3 form-group">
                  				<label>Doctor Name</label>
                  				<input type="text" class="form-control" name="doctor_name" placeholder="Doctor Name" required>
                			</div>
                			<div class="col-md-4 mb-3 form-group">

                			</div>
                		</div>
                		<div class="form-row">
	                		<div class="form-group col-md-6">
	                    		<label>Hospital Details</label>
	                    		<textarea class="form-control" name="hospital_details"></textarea></div>
	                		<div class="form-group col-md-6">
	                    		<label>Comments</label>
	                    		<textarea class="form-control" name="message"></textarea>
                			</div>
            			</div>
                		<div class="form-group">
                			<label class="col-md-12 control-label"></label>
                				<div class="col-md-4">
                    				<button type="submit" value="send" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Send Request</button>
                				</div>
            			</div>
            		</form>
            		<?php
            			if($_SERVER["REQUEST_METHOD"]=="POST")
    					{
    						if(isset($_POST["patient_name"]) && isset($_POST["contact_name"]) && isset($_POST["contact_email_id"]) && isset($_POST["blood_grp_name"]) && isset($_POST["contact_no"]) && isset($_POST["city_name"]) && isset($_POST["state_name"]) && isset($_POST["district_name"]) && isset($_POST["tehsil_name"]) && isset($_POST["blood_req_date"]) && isset($_POST["doctor_name"]) && isset($_POST["hospital_details"]) && isset($_POST["message"]))

	    						$pname = $_POST["patient_name"];
						        $cname = $_POST["contact_name"];
						        $cemail=$_POST["contact_email_id"];
						        $blood_grp=$_POST["blood_grp_name"];
						        $cno=$_POST["contact_no"];
						        $city=$_POST["city_name"];
						        $state=$_POST["state_name"];
						        $district=$_POST["district_name"];
						        $tehsil=$_POST["tehsil_name"];
						        $breqdate=$_POST["blood_req_date"];
						        $dname=$_POST["doctor_name"];
						        $hdetails=$_POST["hospital_details"];
						        $message=$_POST["message"];

						        if($pname!=''  && $cname!='' && $cemail!='' && $blood_grp!='' && $cno!='' && $city!='' && $state!='' && $district!='' && $tehsil!='' && $breqdate!='' && $dname!=''  && $hdetails!='' && $message!='')
						        {
						        	$sql="INSERT INTO request(patient_name,contact_name,contact_email_id,blood_grp_name,contact_no,city_name,state_name,district_name,tehsil_name,blood_req_date,doctor_name,hospital_details,message)
						        	VALUES('".$pname."','".$cname."','".$cemail."','".$blood_grp."','".$cno."','".$city."','".$state."','".$district."','".$tehsil."','".$breqdate."','".$dname."','".$hdetails."','".$message."')";

						        	$result=mysqli_query($conn,$sql);
            
						            if($result)
						            {
						                echo"<script>
						                        alert('Your Messege has Been Sent To Admin !');
						                        window.location='requestblood.php';
						                     </script>";
						            }
						        }
						        else
						        {
						        	echo "Value not set";
						        }
						    }
            		?>		
            	</div>
            </div>
    	</div>
    </div>
</body>