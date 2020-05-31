<?php 
require_once("db_connect.php");
session_start();
?>
<?php
include('include/header.php');
include('include/navbar.php');
include('include/menu.php');
?>


    <section class="content">
        <div class="container-fluid" style="margin-top: -2.8em;">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                   <?php 

                                                    $sql="SELECT count(*) as total_record FROM donor";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   
                                                  ?>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"> person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL DONORS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $row['total_record']?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <?php
                } 
                ?>
                <?php 

                                                    $sql="SELECT count(*) as total_record1 FROM request";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   
                                                  ?>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">BLOOD REQUEST</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $row['total_record1']?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                 <?php
                } 
                ?>
               
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW SUGGESTIONS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW DONORS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
 

<?php
include('include/script.php');
?>

