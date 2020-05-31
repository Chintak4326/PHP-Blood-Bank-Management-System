<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/menu.php');
?>


<?php
require_once("db_connect.php");
 $bloodgroup_name="";
     if(isset($_GET['blood_grp_id']))
     {
          $id1 = $_GET['blood_grp_id'];
        
          $sql1="Select * from bloodgroup where blood_grp_id = '".$id1."'";
          $result=mysqli_query($conn,$sql1);

          $r = mysqli_fetch_array($result);
          $bloodgroup_name=$r['blood_grp_name'];
     }
?>


<script type="text/javascript">
$(document).ready(function () {
    $('#categoryupdateform').validate({ // initialize the plugin
        rules: {
            
        name: {
                required: true,
                 maxlength: 4
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
                                      <label class="control-label">Blood Group Name*</label>
                                      <input type="text" class="form-control" name="name" value="<?php echo $bloodgroup_name;?>" placeholder="Blood Group Name" required autofocus>
                                  </div>
                              </div>
                              <div class="row clearfix bottom-margin">
                                  <div class="form-actions">
                                      <div class="col-xs-6">
                                          <button type="submit" class="btn btn-succes" id="submit1">Submit</button>
                                      </div>
                                      <div class="col-xs-6">
                                          <a href='bloodgrp.php'><button type="button" class="btn">Cancel</button></a>
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
     if (isset($_POST["name"]))
    {
      $cname=$_POST["name"];
        
      if($cname!='')
      {       
        $sql1="update bloodgroup set blood_grp_name='".$cname."' where blood_grp_id = '".$id1."'";
        $results=mysqli_query($conn,$sql1); 
        if($results)
        {
          // header('Location:bloodgrp.php');
                          echo "<script>location.href='bloodgrp.php';</script>";
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
