<?php
    require_once('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>Online Blood Donate</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link rel="shortcut icon" href="images/apple-touch-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
    <link rel="stylesheet" href="style.css">
  
    <link rel="stylesheet" href="css/responsive.css">
   
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/modernizer.js"></script>

</head>
<body>
    <?php 
        include_once('partial/header.php'); 
    ?>

    <section class="recent-causes-section">
        <div class="container">

                         <div class="col-md-12 typeHeading1 text-center">
                            <h3> Blood Donors In India</h3>
                        </div>
             
                    
                    <div class=''>
                        <div class="default-cause-box col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="clearfix">
                                    <div class="image-column col-md-4 col-sm-12 col-xs-12">
                                        <figure class="image-box fix-height"><a href="/profile/1908011327573654"><img src="images/logo.png" 
                                            alt="Priya"></a></figure>
                                    </div>
                         <?php
                         if(isset($_GET['id']))
                         {
                              $id1 = $_GET['id']; 

                         // $sql="select c.name as city_name_table,s.name as state_name_table,co.name as country_tab_name,b.blood_grp_name as blood_table_name,d.* from city c,donor d,state s,country co,bloodgroup b
                         //     where d.country_name=co.id and d.city_name=c.id and         d.state_name=s.id and d.blood_grp=b.blood_grp_id where
                         //            d.id='".$id."'";

                                  $sql="select c.name as city_name_table,s.name as state_name_table,co.name as country_tab_name,d.*,b.blood_grp_name as blood_table_name from donor d
                                                     inner join country co on d.country_name=co.id inner join 
                                                     state s on d.state_name=s.id inner join city c on d.city_name=c.id inner join bloodgroup b on d.blood_grp=b.blood_grp_id
                                                        where d.id='".$id1."'";

                                }
                                 $result=mysqli_query($conn,$sql);
                               if (!$result)
                                {
                                    printf("Error: %s\n", mysqli_error($conn));
                                    exit();
                                }
                              while($row=mysqli_fetch_array($result))
                              {   
                        ?>   
                                   <div class="content-column col-md-8 col-sm-12 col-xs-12">
                                        <div class="lower-content">
                                            <h3><a href="/profile/1908011327573654"></i> 
                                                <?php echo $row['username']?> </a></h3>
                                            <div class="text">
                                                <i class="fa fa-map-marker"></i> 
                                                Pin  <?php echo $row['pincode']?>,
                                                <?php echo $row['city_name_table']?>,  <br />
                                                <?php echo $row['state_name_table']?>,
                                                <?php echo $row['country_tab_name']?>
                                                <br />
                                               <span class=" ">
                                                   
                                                 <strong><i class="fa fa-mobile"></i> </strong> 
                                                 <a href="tel:8098884206"> 
                                                    <?php echo $row['mobile_no']?></a>
                                                   </span>
                                                <div class=last_don>Last blood donated date:<?php echo $row['last_don_date']?></div>
                                                <br />

                                            </div>
                                            <div class="blood-info">
                                                  <?php echo $row['blood_table_name']?> 
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="links clearfix">

                                    <li>
                                    <a class="theme-btn donate-btn"> Contact Details</a>
                                    </li>
                                  <!--   <li><a href='detais.php' 
                                        class="theme-btn more-btn">More Detail</a></li> -->
                                    </ul>
                                </div>
                           <?php
                            }
                          ?>

                            </div>
                        </div>
                    </div>
</div>
</section>

     <?php include_once('partial/footer.php'); ?>
 <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>  
</body>
</html>