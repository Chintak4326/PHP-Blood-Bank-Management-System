<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/menu.php');
?>


<?php
require_once("db_connect.php");
 $name="";
 // $country_id="";
     if(isset($_GET['id']))
     {
          $id1 = $_GET['id'];
        
          //selecting the row from table
          $sql1="Select * from state where id = '".$id1."'";
          $result=mysqli_query($conn,$sql1);

          $r = mysqli_fetch_array($result);
          $name=$r['name'];
          // $country_id=$r['country_id'];
     }
?>


<script type="text/javascript">
$(document).ready(function () {
    $('#categoryupdateform').validate({ // initialize the plugin
        rules: {
            
        name: {
                required: true,
                 maxlength: 9
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
                                    UPDATE STATE TABLE
                                </span>
                                <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ Update Form</span>
                                </span>
                            </div>
                            <form action=""id="bloodform" method="post" name="f1" class="insertform">
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">State Name</label>
                                          <input type="text" class="form-control" name="name" value="<?php echo $name;?>" required autofocus >
                                  </div>
                              </div>
                              <!--  <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Country</label>
                                          <input type="text" class="form-control" name="country" value="<?php echo $country_id;?>" required autofocus >
                                  </div>
                              </div> -->
                              <div class="row clearfix bottom-margin">
                                  <div class="form-actions">
                                      <div class="col-xs-6">
                                          <button type="submit" class="btn btn-succes" id="submit1">Submit</button>
                                      </div>
                                      <div class="col-xs-6">
                                          <a href='state.php'><button type="button" class="btn">Cancel</button></a>
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
      $name=$_POST["name"];
      
        if($name!='')
       {       
          $sql1="update state set name='".$name."' where id = '".$id1."'";
          $results=mysqli_query($conn,$sql1); 
         if($results)
         {
          // header('Location:bloodgrp.php');
                          echo "<script>location.href='state.php';</script>";
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
