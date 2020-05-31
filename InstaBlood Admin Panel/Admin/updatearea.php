<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/menu.php');
?>


<?php
require_once("db_connect.php");
                 $area_name='';
                  $pincode='';
                  $city_id='';
     if(isset($_GET['area_id']))
     {
          $id1 = $_GET['area_id'];
        
          //selecting the row from table
          $sql1="Select * from area where area_id = '".$id1."'";
          $result=mysqli_query($conn,$sql1);

          $r = mysqli_fetch_array($result);
           $area_name=$r["area_name"];
           $pincode=$r["pincode"];
           $city_id=$r["city_id"];
     }
?>


<script type="text/javascript">
$(document).ready(function () {
    $('#areaupdateform').validate({ // initialize the plugin
        rules: {
            
        area_name: {
                required: true,
                 maxlength:9
            },
        pincode: {
                required: true,
                 maxlength:6
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
                                    UPDATE BLOOD GROUP
                                </span>
                                <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ Update Form</span>
                                </span>
                            </div>
                            <form action=""id="bloodform" method="post" name="f1" class="insertform">
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Area Name</label>
                                          <input type="text" class="form-control" name="area_name" value="<?php echo $area_name;?>" required autofocus >
                                  </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Pincode</label>
                                         <input type="text" class="form-control" name="pincode" value="<?php echo $pincode;?>" required >
                                  </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">City</label>
                                      <input type="text" class="form-control" name="city_id" value="<?php echo $city_id;?>"  required >
                                  </div>
                              </div>
                              <div class="row clearfix bottom-margin">
                                  <div class="form-actions">
                                      <div class="col-xs-6">
                                          <button type="submit" class="btn btn-succes" id="submit1">Submit</button>
                                      </div>
                                      <div class="col-xs-6">
                                          <a href='area.php'><button type="button" class="btn">Cancel</button></a>
                                      </div>
                                  </div>
                              </div>
                            </form>
                          </div>
                      </div>
                    </div>
                </div>
      </section>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{    
     if (isset($_POST["area_name"]) && isset($_POST["pincode"]) && isset($_POST["city_id"]))
    {
      $area_name=$_POST["area_name"];
      $pincode=$_POST["pincode"];
      $city_id=$_POST["city_id"];
        
      if($area_name!='' && $pincode!='' && $city_id!='')
      {       
        $sql1="update area set area_name='".$area_name."',pincode='".$pincode."',city_id='".$city_id."' where 
          area_id ='".$id1."'";
        $results=mysqli_query($conn,$sql1); 
        if($results)
        {
         
                          echo "<script>location.href='area.php';</script>";
                         exit();
                    }
      }
      else
      {
        echo "Value is null";
      }
    }
    else
    {
        echo "Value not set";
    }
}

?>

<?php 
    include('include/script.php');
?>
