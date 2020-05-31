<?php
    require_once('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Blood Donation</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/apple-touch-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
     <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <?php include_once('partial/header.php'); ?>
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Search Donor</h2>
                        <ul class="page-title-link">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="searchdonor.php">Search Donor</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="alldonor.php" method="POST">
    <div id="contact" class="section wb">
    <div class="container">
            <div class="section-title text-center">
                <h3>Find Your Blood Group</h3>
            </div>
        <div class="col-md-12 contact-margin search">
          <div class="form-row">
                <div class="col-md-3 form-group">
                    <label class="control-label">Blood Group</label>
                    <select class="custom-select" id="select1">
                      <option selected>Blood Group</option>
                                            <?php
                                                $sql = "SELECT * FROM bloodgroup";
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option value="<?php echo $row['blood_grp_id'] ?>"><?php echo $row['blood_grp_name'] ?></option>
                                            <?php } ?>
                    </select>   
                </div>
                 <div class="col-md-3 form-group">
                    <label class="control-label">Country</label>
                    <select name="country_name" class="form-control" id="country">
                         <option value="-1">Select Country</option>
                                        <?php
                                            $sql = "SELECT * FROM country";
                                            $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php } ?>
                    </select>   
                </div>
                 <div class="col-md-3 form-group">
                    <label class="control-label">State</label>
                    <select class="form-control" id="state" name="state_name">
                      <option>Select State</option>
                    </select>   
                </div>
                 <div class="col-md-3 form-group">
                    <label class="control-label">City</label>
                <select class="form-control" id="city" namae="city_name">
                       <option>Select City</option>
                    </select>
                </div>
                <div class="col-md-2 col-md-offset-10 form-group end">
                    <input type="submit" class="button btn btn-light5 btn-radius btn-brd" name="submit">
                </div>
                <script>
                                $(document).ready(function(){
                                    jQuery('#country').change(function(){
                                        var id=jQuery(this).val();
                                        if(id=='-1'){
                                            jQuery('#state').html('<option value="-1">Select State</option>');
                                        }else{
                                            $("#divLoading").addClass('show');
                                            jQuery('#state').html('<option value="-1">Select State</option>');
                                            jQuery('#city').html('<option value="-1">Select City</option>');
                                            jQuery.ajax({
                                                type:'post',
                                                url:'get_data.php',
                                                data:'id='+id+'&type=state',
                                                success:function(result){
                                                    $("#divLoading").removeClass('show');
                                                    jQuery('#state').append(result);
                                                }
                                            });
                                        }
                                    });
                                    jQuery('#state').change(function(){
                                        var id=jQuery(this).val();
                                        if(id=='-1'){
                                            jQuery('#city').html('<option value="-1">Select City</option>');
                                        }else{
                                            $("#divLoading").addClass('show');
                                            jQuery('#city').html('<option value="-1">Select City</option>');
                                            jQuery.ajax({
                                                type:'post',
                                                url:'get_data.php',
                                                data:'id='+id+'&type=city',
                                                success:function(result){
                                                    $("#divLoading").removeClass('show');
                                                    jQuery('#city').append(result);
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
            </div>
        </div>
        </div>
    </div>
</form>

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