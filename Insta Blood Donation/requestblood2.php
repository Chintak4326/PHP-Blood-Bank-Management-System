<?php
require_once("db_connect.php");
?>

<body>

    <?php include_once('partial/header.php'); ?>
    <?php include_once('partial/link.php'); ?>
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
       <div class="col-md-9 contact-margin">
            <div class="contact_form">
                <div id="message"></div>
                <form id="contactform" class="row" method="post">
            <div class="form-row">
                <div class="col-md-4 mb-3 form-group">
                  <label for="validationCustom01">Patient Name</label>
                  <input type="text" class="form-control" name="pname" placeholder="Patient Name" id="validationCustom01" required>
                </div>
                <div class="col-md-4 mb-3 form-group">
                  <label for="validationCustom02">Contact Name</label>
                  <input type="text" class="form-control" name="cname" placeholder="Contact Name" id="validationCustom02" required>
                </div>
                <div class="col-md-4 mb-3 form-group">
                  <label for="validationCustom02">Email</label>
                  <input type="email" class="form-control"name="cemail" placeholder="Email" id="validationCustom02"  required>
                </div>
            </div>
             <div class="form-row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="validationCustom02">Blood Group</label>
                   <!-- <input type="text" class="form-control"  name="bgrpname" placeholder="Enter Blood Group" 
                     id="validationCustom02" required> -->  

                                        <select name="blood_grp" id="state1">
                                        <option selected>Select Blood Group</option>
                                            <?php
                                                $sql = "SELECT * FROM bloodgroup";
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option value="<?php echo $row['blood_grp_name'] ?>"><?php echo $row['blood_grp_name'] ?></option>
                                            <?php } ?>
                                    </select> 

                </div>
                <div class="col-md-4 mb-3 form-group">
                  <label for="validationCustom02">Contact Number</label>
                  <input type="text" class="form-control" name="cno" placeholder="Contact Number" id="validationCustom02" required>
                </div>
                <div class="col-md-4 mb-3 form-group">
                  <label for="validationCustom02">City</label>
                  <input type="text" class="form-control" name="city" placeholder="city Name" id="validationCustom02" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="validationCustom02">State</label>
                     <input type="text" class="form-control" name="state" placeholder="State Name" id="validationCustom02" 
                      required>
                 </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="validationCustom02">District</label>
                    <input type="text" class="form-control"  name="district" placeholder="District Name" 
                     id="validationCustom02" required>  
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="validationCustom02">Tehsil</label>
                    <input type="text" class="form-control"  name="tehsil" placeholder="Tehsil Name"  
                     id="validationCustom02" required>   
                </div>
            </div>
             <div class="form-row">
                <div class="col-md-4 mb-3 form-group">
                  <label for="validationCustom01">Required Date</label>
                  <input type="date" class="form-control" name="breqdate" id="validationCustom01" required>
                </div>
                <div class="col-md-4 mb-3 form-group">
                  <label for="validationCustom02">Doctor Name</label>
                  <input type="text" class="form-control" name="dname" placeholder="Doctor Name" id="validationCustom02" required>
                </div>
                <div class="col-md-4 mb-3 form-group">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="validationCustom02">Hospital Details</label>
                    <textarea class="form-control" name="hdetails"></textarea></div>
                <div class="form-group col-md-6">
                    <label for="validationCustom02">Comments</label>
                    <textarea class="form-control" name="message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-4">
                    
                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Send Request</button>
                </div>
            </div>
        </form>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {

        if(isset($_POST["pname"]) && isset($_POST["cname"])  && isset($_POST["cemail"])  && isset($_POST["blood_grp"]) && isset($_POST["cno"]) && isset($_POST["city"])  && isset($_POST["state"])  && isset($_POST["district"])  
        && isset($_POST["tehsil"]) && isset($_POST["breqdate"]) && isset($_POST["dname"])  && isset($_POST["hdetails"])
        && isset($_POST["message"]))
        
        $pname=$_POST["pname"];
        $cname=$_POST["cname"];
        $cemail=$_POST["cemail"];
        $blood_grp=$_POST["blood_grp"];
        $cno=$_POST["cno"];
        $city=$_POST["city"];
        $state=$_POST["state"];
        $district=$_POST["district"];
        $tehsil=$_POST["tehsil"];
        $breqdate=$_POST["breqdate"];
        $dname=$_POST["dname"];
        $hdetails=$_POST["hdetails"];
        $message=$_POST["message"];
       if($pname!=''  && $cname!='' && $cemail!='' && $blood_grp!='' && $cno!='' && $city!='' 
        && $state!='' && $district!='' && $tehsil!='' && $breqdate!='' && $dname!=''  && $hdetails!='' && $message!='')
        {
            $sql="INSERT INTO request(patient_name,contact_name,contact_email_id,blood_grp_name,contact_no,city_name,state_name,
            district_name,tehsil_name,blood_req_date,doctor_name,hospital_details,message)
            VALUES('".$pname."','".$cname."','".$cemail."','".$blood_grp."','".$cno."','".$city."','".$state."','".$district."','".$tehsil."','".$breqdate."','".$dname."','".$hdetails."','".$message."')";

            $result=mysqli_query($conn,$sql);
            
            if($result)
            {
                //header("location:index.php");
               echo "      <script>
                        alert('Your Messege has Been Sent To Admin !');
                        window.location='requestblood.php';
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


