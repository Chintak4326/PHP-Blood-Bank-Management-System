<?php
require_once("db_connect.php");
error_reporting(0);
?>
<?php 
     include('include/navbar.php');
    include('include/menu.php');
    include('include/tableheader.php');
?>

 
 <section class="content">
        <div class="container-fluid">
            <!-- Image Gallery -->
            <div class="block-header">
                <h2>
                    IMAGE GALLERY
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="clearfix">
                                <span class="tablename">
                                    GALLERY 
                                </span>
                               <span class="data1">
                                   <a href="index.php"><i class="material-icons">home</i></a>
                                        <span id="home2">/ View Form</span>
                                </span>
                           </div>
                        </div>
               

       <html>
     <body>
         <form action="" method="post" enctype="multipart/form-data">
          <div class="input-group">
             <div class="form-line">
                       <label class="control-label">Choose Image File*</label>
                       <div>
                       <input type="file" name="image" style="width:300" height="100" class="form-control" id="exampleInputEmail1" placeholder=" Picture" accept="image/*" onchange="loadFile(event)">
                     </div>
                       <script>
    function loadFile(event) {
      document.getElementById('output').src =
      URL.createObjectURL(event.target.files[0]);
    };
    </script>
              </div>
          </div>

                            <div class="row clearfix bottom-margin">
                                  <div class="form-actions">
                                      <div class="col-xs-4">
                                          <button type="submit" class="btn btn-succes"name="image" value="Upload File">Submit</button>
                                      </div>
                                      <div class="col-xs-4">
                                          <button type="reset" class="btn btn-reset" id="reset1">Reset</button>
                                      </div>
                                      <div class="col-xs-4">
                                          <a href="viewgallery.php"><button type="button" class="btn">Cancel</button></a>
                                      </div>
                                  </div>
                             </div>
                           
 <?php
 require_once("db_connect.php");
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
   if(isset($_FILES['image'])){
      $errors= array();
    
      $file_name = $_FILES['image']['name'];
   $file_tmp =$_FILES['image']['tmp_name'];
    //  $file_type=$_FILES['image']['type'];
  //  $file_size =$_FILES['image']['size'];
     // $file_ext=explode('.',$_FILES['image']['name']);

      $expensions= array("jpeg","jpg","png");
      
    /*
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      */
      if(empty($errors)==true)
    {
         if(move_uploaded_file($file_tmp,"instaimages/".$file_name))
     {
       $query="INSERT INTO gallery(img_url) values('".$file_name."')";
        
        $result=mysqli_query($conn,$query);
        echo "Success";
        if($result)
        {
          header("Location:viewgallery.php");
        }
        
     }
      }
    else{
         print_r($errors);
      }
   }
  }
?>


       
<?php 

    include('include/script.php');
?>
 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
 </body>
 </html>