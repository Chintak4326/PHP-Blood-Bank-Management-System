<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/menu.php');
?>

<?php
require_once("db_connect.php");
?>


<script type="text/javascript">
$(document).ready(function ()
{
    $('#donorform').validate({ // initialize the plugin
        rules: {
                
       username: {
                required: true,
                 maxlength: 40
                },
        password: {
                   required: true,
                    maxlength: 8
                  },
       email: {
                   required: true,
                   maxlength: 30
                 },
        dob: {
                 required: true,
                 maxlength: 8
             },
       gender: {
                 required: true,
                 maxlength: 4
               },
       blood_grp_id:{
                  required: true,
                 maxlength: 4
                 },
            
        weight: {
                  required: true,
                 maxlength: 3
                 },
       last_don_date: {
                  required: true,
                   maxlength: 8
                   },
        mobile_no: {
                  required: true,
                   maxlength: 13
                   },
        address: {
                  required: true,
                   maxlength: 70
                   },
        city_id: {
                  required: true,
                   maxlength: 8
                   },           

          }     
      });
  });
    
 </script>
  <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                            <div class="center1">
                                <span class="tablename1">
                                    INSERT DONOR
                                </span>
                                <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ Insert Form</span>
                                </span>
                            </div>
                            <form action=""id="bloodform" method="post" name="f1" class="insertform">
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Full Name*</label>
                                      <input type="text" class="form-control" name="username" placeholder="Full Name" required autofocus>
                                  </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Password*</label>
                                      <input type="password" class="form-control" name="password" placeholder="Enter Password" required autofocus>
                                </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Email ID*</label>
                                      <input type="email" class="form-control" name="email" placeholder="Enter Email Id" required autofocus>
                                  </div>
                              </div>
                               <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Date Of Birth*</label>
                                      <input type="Date" class="form-control" name="dob" placeholder="Enter Date Of Birth" required autofocus>
                                  </div>
                              </div>
                               <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Gender*</label>
                                      <input type="text" class="form-control" name="gender" placeholder="Gender" required autofocus>
                                  </div>
                              </div>
                               <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Blood Group Name*</label>
                                        <select name="blood_grp_id" class="form-control" required autofocus>
                                                   <option value="">Select Blood Group</option>
                                               <?php 
                                               $q="select * from bloodgroup";
                                                $sel_query=mysqli_query($conn,$q);
                                                while($row1=mysqli_fetch_assoc($sel_query))
                                                {
                                              ?>
                                        <option value="<?php echo $row1['blood_grp_id'];?>">
                                          <?php echo $row1['blood_grp_name']?>
                                        </option>;
                                          <?php
                                          }
                                  ?>
                               </select> 
                                  </div>
                              </div>
                               <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Weight*</label>
                                      <input type="text" class="form-control" name="weight" placeholder="Your Weight" required autofocus>
                                  </div>
                              </div>
                               <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Last BloodDonation Date(optional)</label>
                                      <input type="date" class="form-control" name="last_don_date" placeholder="Enter Your Last Blood Donation Date" required autofocus>
                                  </div>
                              </div>
                               <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Mobile No*</label>
                                      <input type="Number" class="form-control" name="mobile_no" placeholder="Enter Mobile Number" required autofocus>
                                  </div>
                              </div>
                               <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">Address*</label>
                                      <input type="text" class="form-control" name="address" placeholder="Enter Your Address" required autofocus>
                                  </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">City Name*</label>
                                        <select name="city_id" class="form-control" required autofocus>
                                                   <option value="">Select City</option>
                                               <?php 
                                              $q="select * from city";
                                                $sel_query=mysqli_query($conn,$q);
                                                while($row1=mysqli_fetch_assoc($sel_query))
                                                {
                                              ?>
                                        <option value="<?php echo $row1['city_id'];?>">
                                          <?php echo $row1['city_name']?>
                                        </option>;
                                          <?php
                                          }
                                  ?>
                               </select>
                                  </div>
                              </div>
                              <div class="row clearfix bottom-margin">
                                  <div class="form-actions">
                                      <div class="col-xs-4">
                                          <button type="submit" class="btn btn-succes" id="submit1">Submit</button>
                                      </div>
                                      <div class="col-xs-4">
                                          <button type="reset" class="btn btn-reset" id="reset1">Reset</button>
                                      </div>
                                      <div class="col-xs-4">
                                          <a href='area.php'><button type="button" class="btn">Cancel</button></a>
                                      </div>
                                  </div>
                              </div>

              <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
              if (isset($_POST["username"]) && isset($_POST['password'])  && isset($_POST['email']) && 
                isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['blood_grp']) && isset($_POST['weight'])
                 && isset($_POST['last_don_date']) && isset($_POST['mobile_no']) && isset($_POST['address']) && 
                 isset($_POST['city_id']) )
              { 
                $username=$_POST["username"];
                $password=$_POST["password"];
                $email_id=$_POST["email"];
                $dob=$_POST["dob"];
                $gender=$_POST["gender"];
                $blood_grp_id=$_POST["blood_grp"];
                $weight=$_POST["weight"];
                $last_don_date=$_POST["last_don_date"];
                $mobile_no=$_POST["mobile_no"];
                $address=$_POST["address"];
                $city_id=$_POST["city_id"];

        if($username!='' && $password!='' && $email!='' && $dob!='' && $gender!='' && $blood_grp!='' &&       
          $weight!='' && $last_don_date!='' && $mobile_no!='' && $address!='' && $city_id!='')
            {
               echo "value not null";
   $sql = "insert into donor(username,password,email,gender,blood_grp,weight,last_don_date,mobile_no,address,city_id)
             values('".$username."','".$password."','".$email."','".$dob."','".$gender."','".$blood_grp."',
          '".$weight."','".$last_don_date."','".$mobile_no."','".$address."','".$city_id."')";
                  
                          

                  $result=mysqli_query($conn,$sql);
      
                  if($result)
                  {
                    echo "<meta http-equiv='refresh' content='0;donor.php'>";
                  }
        }
    }
    else
    {
      echo "value not set";
    }
  }
          
          ?>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

<?php 
    include('include/script.php');
?>
