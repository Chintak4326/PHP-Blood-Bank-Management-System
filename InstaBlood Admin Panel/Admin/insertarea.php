<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/menu.php');
?>

<?php
require_once("db_connect.php");
?>


<script type="text/javascript">
$(document).ready(function () {
    $('#bloodform').validate({ // initialize the plugin
        rules: {
                
        name: {
                required: true,
                 maxlength: 5
            },
        }
    });
});
</script>

</script>
      <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                            <div class="center1">
                                <span class="tablename1">
                                    INSERT AREA
                                </span>
                                <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ Insert Form</span>
                                </span>
                            </div>
                            <form action=""id="bloodform" method="post" name="f1" class="insertform">
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Area Name*</label>
                                      <input type="text" class="form-control" name="name" placeholder="Area Name" required autofocus>
                                  </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Pincode*</label>
                                      <input type="number" class="form-control" name="pincode" placeholder="Enter Pincode" required autofocus>
                                </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                     <label class="control-label">City*</label>
                                      <input type="text" class="form-control" name="city_id" placeholder="Enter City" required autofocus>
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
              if (isset($_POST['area_name']) && isset($_POST['pincode']) && isset($_POST['city_id']))
              { 
                 $area_name=$_POST['area_name'];
                  $pincode=$_POST['pincode'];
                  $city_id=$_POST['city_id'];
            
                if($area_name!='' && $pincode!='' && $city_id!='')
                 {
                  echo "value not null";
                  $sql="insert into area(area_name,pincode,city_id)values('".$area_name."','".$pincode."',
                  '".$city_id."')";
                  $result=mysqli_query($conn,$sql);
      
                  if($result)
                    {
                    echo "<meta http-equiv='refresh' content='0;area.php'>";
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

<?php 
    include('include/script.php');
?>
