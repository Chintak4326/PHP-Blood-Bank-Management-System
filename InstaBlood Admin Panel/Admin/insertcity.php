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
                                    INSERT CITY
                                </span>
                                <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ Insert Form</span>
                                </span>
                            </div>
                            <form action=""id="bloodform" method="post" name="f1" class="insertform">
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">City Name*</label>
                                      <input type="text" class="form-control" name="name" placeholder="City Name" required autofocus>
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
                                          <a href='city.php'><button type="button" class="btn">Cancel</button></a>
                                      </div>
                                  </div>
                              </div>
              
             <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
              if (isset($_POST["name"]))
              { 
                $cname=$_POST["name"];
                //$cdesc=$_POST["description"];
            
                if($cname!='')
                {
                  echo "value not null";
                  $sql = "insert into city(city_name)
                  values('".$cname."')";
                  
                          

                  $result=mysqli_query($conn,$sql);
      
                  if($result)
                  {
                    echo "<meta http-equiv='refresh' content='0;city.php'>";
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
