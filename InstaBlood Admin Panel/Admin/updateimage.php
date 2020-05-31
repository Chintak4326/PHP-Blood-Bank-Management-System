<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/menu.php');
?>


<?php
require_once("db_connect.php");
                 $img_url='';
     if(isset($_GET['img_id']))
     {
          $id1 = $_GET['img_id'];
        
          //selecting the row from table
          $sql1="Select * from gallery where img_id = '".$id1."'";
          $result=mysqli_query($conn,$sql1);

          $r = mysqli_fetch_array($result);
           $img_url=$r["img_url"];
          
     }
?>



       <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       <div class="center1">
                                <span class="tablename1">
                                    UPDATE GALLERY
                                </span>
                                <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ Update Form</span>
                                </span>
                            </div>
                            <form action=""id="imageform" method="post" name="f1" class="insertform" 
                               enctype="multipart/form-data">
                               <div class="input-group">
                                    <div class="form-line">
                                          <label class="control-label">Choose Image File*</label>
                                          <input type="file" name="uploadfile" value="" required autofocus/>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                          <button type="submit" class="btn btn-succes" id="submit" value="Upload File">
                                          UPLOAD</button>
                                </div>
                                
                              <?php
                                $filename=$_FILES["uploadfile"]["name"];
                                $tempname=$_FILES["uploadfile"]["tmp_name"];
                                $folder="instaimages/".$filename;
                                 move_uploaded_file($tempname,$folder);
                                 
                               ?>
                              <div class="input-group">
                                  <div class="form-line">
                                      <label class="control-label">Image Url* :</label>
                                          <input type="text" class="form-control" name="img_url" value="" required autofocus >

                                  </div>
                              </div>
                              
                              <div class="row clearfix bottom-margin">
                                  <div class="form-actions">
                                      <div class="col-xs-6">
                                          <button type="submit" class="btn btn-succes" id="submit1">Submit</button>
                                      </div>
                                      <div class="col-xs-6">
                                          <a href='viewgallery.php'><button type="button" class="btn">Cancel</button></a>
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
     if (isset($_POST["img_url"]))
    {
      $img_url=$_POST["img_url"];
     
        
      if($img_url!='')
      {       
        $sql1="update gallery set img_url='".$img_url."' where img_id ='".$id1."'";
        $results=mysqli_query($conn,$sql1); 
        if($results)
        {
         
                          echo "<script>location.href='viewgallery.php';</script>";
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
