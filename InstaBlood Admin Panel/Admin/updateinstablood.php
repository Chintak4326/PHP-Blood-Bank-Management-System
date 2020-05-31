<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/menu.php');
?>


<?php
require_once("db_connect.php");
$instablood_name="";
$instablood_number="";
$instablood_email=" ";
     if(isset($_GET['instablood_id']))
     {
          $id1 = $_GET['instablood_id'];
        
          $sql1="Select * from instablood where instablood_id = '".$id1."'";
          $result=mysqli_query($conn,$sql1);

          $r = mysqli_fetch_array($result);
          $instablood_name=$r['instablood_name'];
          $instablood_number=$r['instablood_number'];
          $instablood_email=$r['instablood_email'];
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
                                    UPDATE COMPANY TABLE
                                </span>
                                <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ Update Form</span>
                                </span>
                            </div>
                            <form action="" id="bloodform" method="post" name="f1" class="insertform">
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Company Name*</label>
                                          <input type="text" class="form-control" name="instablood_name" 
                                          value="<?php echo $instablood_name;?>" required autofocus >
                                  </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Company Mobile no*</label>
                                          <input type="text" class="form-control" name="instablood_number" 
                                          value="<?php echo $instablood_number;?>" required autofocus >
                                  </div>
                              </div>
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Company Email Id*</label>
                                          <input type="text" class="form-control" name="instablood_email" 
                                          value="<?php echo $instablood_email;?>" required autofocus >
                                  </div>
                              </div>
                              <div class="row clearfix bottom-margin">
                                  <div class="form-actions">
                                      <div class="col-xs-6">
                                          <button type="submit" class="btn btn-succes" id="submit1">Submit</button>
                                      </div>
                                      <div class="col-xs-6">
                                          <a href='instablood.php'><button type="button" class="btn">Cancel</button></a>
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
     if (isset($_POST["instablood_name"]) && isset($_POST["instablood_number"]) && isset($_POST["instablood_email"]))
    {
      $cname=$_POST["instablood_name"];
      $number=$_POST["instablood_number"];
      $email=$_POST['instablood_email'];
        
      if($cname!='' && $number!='' && $email!='')
      {       
        
    $sql1="update instablood set instablood_name='".$cname."',instablood_number='".$number."', instablood_email='".$email."' where instablood_id= '".$id1."'";
        $results=mysqli_query($conn,$sql1); 
        if($results)
        {
          // header('Location:bloodgrp.php');
                          echo "<script>location.href='instablood.php';</script>";
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
