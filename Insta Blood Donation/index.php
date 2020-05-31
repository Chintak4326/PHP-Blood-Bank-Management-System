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
    <?php include_once('partial/header.php'); ?>
	<div class="slider-area">
		<div class="slider-wrapper owl-carousel">
			<div class="slider-item home-one-slider-otem slider-item-four slider-bg-one">
				<div class="container">
					<div class="row">
						<div class="slider-content-area">
							<div class="slide-text">
                                <h1 class="homepage-three-title">Donate<span>Blood,</span>Give Smile To Someone</h1>
								<div class="slider-content-btn">
									<a class="button btn btn-light btn-radius btn-brd" href="about-us.php">Read More</a>
									<a class="button btn btn-light btn-radius btn-brd" href="contact.php">Contact</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-two">
				<div class="container">
					<div class="row">
						<div class="slider-content-area">
							<div class="slide-text">
								<h1 class="homepage-three-title"><span>Donate Blood</span> Give The Gift Of Life</h1>
								<div class="slider-content-btn">
									<a class="button btn btn-light btn-radius btn-brd" href="about-us.php">Read More</a>
									<a class="button btn btn-light btn-radius btn-brd" href="contact.php">Contact</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-item home-one-slider-otem slider-item-four slider-bg-three">
				<div class="container">
					<div class="row">
						<div class="slider-content-area">
							<div class="slide-text">
								<h1 class="homepage-three-title">Sometimes Money Cannot Save Life But <span>Donated Blood Can!</span></h1>
								<div class="slider-content-btn">
									<a class="button btn btn-light btn-radius btn-brd" href="about-us.php">Read More</a>
									<a class="button btn btn-light btn-radius btn-brd" href="contact.php">Contact</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
        <form action="alldonor.php" method="POST">
    <div class="detail-holder home-search col-xs-12 home_search_banner">
            <div class="col-md-12 contact-margin"style="margin-bottom: unset;">
                <div class="col-md-2 form-group">
                    <h4 class="find-blood">Find Your Blood Group</h5>
                </div>
                <div class="col-md-2 form-group">
                    <select class="custom-select" id="select1" name="blood_grp_name">
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
                 <div class="col-md-2 form-group">
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
                 <div class="col-md-2 form-group">
                    <select class="form-control" id="state" name="state_name">
                      <option>Select State</option>
                    </select>   
                </div>
                 <div class="col-md-2 form-group">
                    <select class="form-control" id="city" name="city_name">
                       <option>Select City</option>
                    </select>   
                </div>

                <div class="col-md-2 form-group">
                      <input type="submit" value="FIND BLOOD" class="button btn btn-light6 btn-radius btn-brd" name="submit">
                    
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
        </form>
    <div class="detail-holder home-search col-xs-12">
        <div class="header-circle">
            <div class="container">
                <div class="row">
                <div class="col-md-12 background_header pd-add">
                    <div class="col-md-4 text-center">
                        	<div class="rounded-icons bg-orange-ope">
                        		<a href="requestblood.php">
                                	<i class="line-font-lg fa fa-tint"></i>
                                	<h3 class="header_main">Request <br/> Blood</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        	<div class="rounded-icons bg-orange-ope">
                        	   <a href="searchdonor.php">
                               		<i class="search-do fa fa-search"></i>
                              	    <h3 class="header_main">Find Blood <br /> Donor</h3>
                               </a>
                            </div>
                    </div>
                      <div class="col-md-4 text-center">
                        	<div class="rounded-icons bg-orange-ope">
                       			<a href="register.php">
                                	<i class="line-font-lg  fa fa-user"></i>
                            		<h3 class="header_main">Register As <br /> Donor</h3>
                        		</a>
                        	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!--Featured Cause Section-->
            <section class="featured-cause-section">
      <div class="container">
          <!--Title-->
          
            
            <div class="row clearfix">
              <!--Image Column-->
                <div class="col-md-9 col-sm-8 bottom_range">



                    <section class="fullwidth-section-one">
                      <div class="outer clearfix">
                          <!--Image Column-->
                            
            
                            <!--Content Column-->
                            <div class="content-column">
                              <div class=" text-center">
                                  <br />
                                    <h3><a href='/donor'>Total Blood  Donor Register With Blood Bank Today </a></h3>
                   
                                    <div class="pay-for">

                                    <div class="row clearfix">    
                                                    
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                    <?php 

                                                   $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'A-'";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   

                                                  ?>     

                                                  <a href="Anegative.php" class="link-box">
                                                      <div class="icon-box-rounded">  A-
                                                        <h5 class="total"><?php echo $row['total_record']?></h5></div>
                                                    </a>
                                                    </div>
                                                <?php
                                                    }
                                                    ?>
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                        
                                                    <?php 

                                                   $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'A+'";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   

                                                  ?>   
                                                  <a href="Apositive.php" class="link-box">
                                                      <div class="icon-box-rounded">  A+<br />
                                                        <h5 class="total"><?php echo $row['total_record']?></h5></div>
                                                    </a>
                                                    </div>
                                                <?php
                                                    }
                                                    ?>
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                                <?php 

                                                    $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'AB-'";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   

                                                  ?>   

                                                  <a href="ABnegative.php" class="link-box">
                                                      <div class="icon-box-rounded">  AB-<br />
                                                        <h5 class="total"><?php echo $row['total_record']?></h5></div>
                                                    </a>
                                                    </div>
                                                <?php
                                                    }
                                                    ?>
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                        
                                                              <?php 

                                                    $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'AB+'";

                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   
                                                  ?>   

                                                  <a href="ABpositive.php" class="link-box">
                                                      <div class="icon-box-rounded">  AB+<br />
                                                       <h5 class="total"> <?php echo $row['total_record']?> </h5></div>
                                                    </a>
                                                    </div>
                                                   <?php
                                                    }
                                                    ?>
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                             <?php 

                                                    $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'B-'";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   

                                                  ?>      

                                                  <a href="Bnegative.php" class="link-box">
                                                      <div class="icon-box-rounded">  B-<br />
                                                        <h5 class="total"> <?php echo $row['total_record']?></h5></div>
                                                    </a>
                                                    </div>
                                                <?php
                                                    }
                                                    ?>
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                        
                                                     <?php 

                                                   $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'B+'";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   

                                                  ?>   
                                                  <a href="Bpositive.php" class="link-box">
                                                      <div class="icon-box-rounded">  B+<br />
                                                        <h5 class="total"><?php echo $row['total_record']?></h5></div>
                                                    </a>
                                                    </div>
                                                <?php
                                                    }
                                                    ?>
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                        
                                                    <?php 

                                                   $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'O-'";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   

                                                  ?>   
                                                  <a href="Onegative.php" class="link-box">
                                                      <div class="icon-box-rounded">  O-<br />
                                                        <h5 class="total"><?php echo $row['total_record']?></h5></div>
                                                    </a>
                                                    </div>
                                                <?php
                                                    }
                                                    ?>
                                                    <div class="pay-block col-md-3 col-sm-3 col-xs-6">

                                                        
                                                    <?php 

                                                   $sql="SELECT d.blood_grp,count(*) as total_record FROM donor d join bloodgroup b on b.blood_grp_id=d.blood_grp  WHERE b.blood_grp_name = 'O+'";
                                                    $result=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result))
                                                    {   

                                                  ?>   
                                                  <a href="Opositive.php" class="link-box">
                                                      <div class="icon-box-rounded">  O+<br />
                                                        <h5 class="total"><?php echo $row['total_record']?></h5></div>
                                                    </a>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                        </div>
                                    </div>
                                    <!-- <a href="/state/all/" class="read-more">All Blood Group List</a> -->
                                </div>
                            </div>
            
                        </div>
                    </section>

                      <div class="container">
         <div class="row">
                    <div class="image-column col-md-4 col-sm-12 col-xs-12">
                       <figure class="image"><a href="#"><img src="images/featured-image-1.jpg" alt="blood bank today"></a></figure>
                         <!--  <a href="#"><img src="images/featured-image-1.jpg" style="width: 100%;"></a> -->
                    </div>
                    <div class="image-column1 col-md-5 col-sm-12 col-xs-12">
                      <div class="inner-main">
                        <h3 class="do_blood"><a href="register.php" class="d_blood"> Why should  donate blood? </a></h3>
                        <span class="blood_should">
                           Our nation requires 4 Crore Units of Blood while only 40 lakh units are available,
                            Every two seconds someone needs Blood
                            There is no substitute for Human Blood.It cannot be manufactured
                            Blood donation is an extremely noble deed, yet there is a scarcity of regular donors across India. 
                            We focus on creating & expanding a virtual army of blood donating volunteers who could be searched and contacted by family / care givers of a patient in times of need</span>
                                <a href="register.php">
                                  <button type="submit" value="SEND" id="submit" class="btn btn-light8 btn-radius btn-brd grd1 btn-block">Be A Donor</button>
                                </a>
                            </div>
                        </div>
                      </div>
                </div>
                </div>


                  <div class="col-md-3 col-sm-4">


                       <!--Sidebar-->

        <div id="newsBoxLine">
            <div class="headline headline-md posts">
                <h4 class="Recent_donor"> Recent Donor Join </h4>
            </div>
            <?php 


         $sql="select c.name as city_name_table,s.name as state_name_table,co.name as country_tab_name,b.blood_grp_name as blood_table_name,d.* from city c,donor d,state s,country co,bloodgroup b
                                                where d.country_name=co.id and 
                                                    d.city_name=c.id and
                                                    d.state_name=s.id and d.blood_grp=b.blood_grp_id";

  $result=mysqli_query($conn,$sql);
   if (!$result)
    {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
  while($row=mysqli_fetch_array($result))
  {   

?>   


            <div id="latestNews">
                <ul class="posts">
                    
        <li class="row profile-event">

            <div class="date-formats">
                <span class="dark"><?php echo $row['blood_table_name']?></span>

                <small><?php echo $row['gender']?></small><br />
            </div>
            <div class="overflow-h">
                <h3 class="heading-xs">
                     
                    <a href="visit.php?id=<?php echo $row['id']?>" class="name_color"><b><i class="fa fa-user"></i> <?php echo $row['username']?> </b></a>   
                    </h3>
            <p>
                    
                     <i class="fa fa-map-marker"></i><?php echo $row['city_name_table']?>,<?php echo $row['state_name_table']?>,<br />
                     <?php echo $row['country_tab_name']?>,&nbsp;
                    <i class="fa fa-plus-square"></i> <?php echo $row['pincode']?><br />
                    
                </p>
            </div>

        </li>
                  <?php
  }
  ?>
    
                </ul>
            </div>
        </div>
    



                    </div>

            </div>
            
        </div>
    </section>


    <div class="container-fluid">
     		<div class="row text-center">
	            	<div class="col-md-12 typeHeading">
	                	<h3>LEARN ABOUT DONATION</h3>
	            	</div>
        	</div>
                <div class="col-md-6">
   	                <div class="form-group">
                        <div class="input">
                       		 <img src="images/donate.jpg" alt="image" class="donate-img" style="width: 100%;">
                       		 <h4 class="learn-blood">After donating blood, the body works to replenish the blood loss. This stimulates the</h4>
                       		 <h4 class="learn-blood1"> production of new blood cells and in turn, helps in maintaining good health.</h4>
                    	</div>
                	</div>
            	</div>
            	<div class="col-md-6 tableblood">
            		<div class="form-group">
            			<table id="blood-table">
						    <tr>
						      <th colspan="3" style="color:white;background-color:#ED1B24;">Compatible Blood Type Donors</th>
						    </tr>
						  	<tr>
						      <th>
						      	<b style="color: black;">Blood Type</b>
						      </th>
						      <th>
						      	<b style="color: black;">Donate Blood To</b>
						      </th>
						      <th>
						      	<b style="color: black;">Receive Blood From</b>
						      </th>
						    </tr>
						    <tr>
						      <th scope="row" style="color: #D10F1A">A+</th>
						      <td>A+ AB+</td>
						      <td>A+ A- O+ O-</td>
						    </tr>
						    <tr>
						      <th scope="row" style="color: #D10F1A">O+</th>
						      <td>O+ A+ B+ AB+</td>
						      <td>O+ O-</td>
						    </tr>
						    <tr>
						      <th scope="row" style="color: #D10F1A">B+</th>
						      <td>B+ AB+</td>
						      <td>B+ B- O+ O-</td>
						    </tr>
						    <tr>
						    	<th scope="row" style="color: #D10F1A">AB+</th>
						    	<td>AB+</td>
						    	<td>Everyone</td>
						    </tr>
						    <tr>
						    	<th scope="row" style="color: #D10F1A">A-</th>
						    	<td>A+ A- AB+ AB-</td>
						    	<td>A- O-</td>
						    </tr>
						    <tr>
						    	<th scope="row" style="color: #D10F1A">O-</th>
						    	<td>Everyone</td>
						    	<td>O-</td>
						    </tr>
						    <tr>
						    	<th scope="row" style="color: #D10F1A">B-</th>
						    	<td>B+ B- AB+ AB-</td>
						    	<td>B- O-</td>
						    </tr>
						    <tr>
						    	<th scope="row" style="color: #D10F1A">AB-</th>
						    	<td>AB- AB+</td>
						    	<td>AB- A- B- O-</td>
						    </tr>
						</table>
            		</div>
            	</div>
        </div>

    <?php include_once('partial/footer.php'); ?>

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <script src="js/all.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>    

</body>
</html>