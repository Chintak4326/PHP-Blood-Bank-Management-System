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
                                <div class="btn-group conter" id="b1" style="margin-right: 0.5em;">
                                        <a href='uploadimage.php'>
                                        <button id="" class="btn-red" data-toggle="tooltip" data-placement="right" title="Add New">Add New <i class="icon-plus"></i></button></a>
                                 </div>
                           </div>
                        </div>
                <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead>
                                          <tr>
                                            <th>Image </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   <?php
                                        $sql="Select * from gallery";
    
                                        $result=mysqli_query($conn,$sql);
    
                                        if (!$result)
                                        {
                                            printf("Error: %s\n", mysqli_error($conn));
                                            exit();
                                        }
                                        while($row = mysqli_fetch_array($result))
                                        {
                                       ?>
                                             <tr>
                                             <td><img src="instaimages/<?php echo $row['img_url'] ; ?>" height=100px width=140px></td>
                                            <td>
                                                <a data-toggle=tooltip data-placement=right title=View href=
                                                   viewgallery.php><img src="images\ision.png" height=25px></a>&nbsp; &nbsp; &nbsp;

                                                 <a  data-toggle=tooltip data-placement=right title=Delete 
                                                 href=deleteimage.php?img_id=$row[img_id]><img src="images\delete.png"height=25px/></a> 
                                            
                                            </td>
                                        </tr>
                                         <?php
                                       }
                                   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>





























<html>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadfile" value=""/>
    <input type="submit" name="submit" value="Upload File"/>

 </form>
 <body>
 </html>
 <?php
 
 $filename=$_FILES["uploadfile"]["name"];
 $tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder="instaimages/".$filename;#
  echo $folder;
 move_uploaded_file($tempname,$folder);
 
 ?>