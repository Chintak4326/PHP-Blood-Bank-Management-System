<?php
    require_once('db_connect.php');
?>

<?php 

  $sql="select instablood_name from `instablood`";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result))
  {   

?>     
<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <img src="images/logos/logo.png" alt="" class="responsive" height="100px">
                        </div>
                        <p> World Blood Donor Day (WBDD) is celebrated around the world every year on 14th June to thank voluntary, unpaid blood donors for their life-saving gifts of blood and to raise awareness of the need for regular blood donations to ensure the quality, safety and availability of blood and blood products for patients in need.</p>
                       <!--  <p>Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p> -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Pages</h3>
                        </div>

                        <ul class="footer-links hov">
                            <li><a href="index.php">HOME <span class="icon icon-arrow-right2"></span></a></li>
							<li><a href="about-us.php">ABOUT US <span class="icon icon-arrow-right2"></span></a></li>
							<li><a href="searchdonor.php">SEARCH DONORS <span class="icon icon-arrow-right2"></span></a></li>
							<li><a href="register.php">REGISTER AS DONOR<span class="icon icon-arrow-right2"></span></a></li>
							<li><a href="requestblood.php">REQUEST BLOOD<span class="icon icon-arrow-right2"></span></a></li>
							<li><a href="bloodtip.php">BLOOD TIPS<span class="icon icon-arrow-right2"></span></a></li>
							<li><a href="contact.php">CONTACT<span class="icon icon-arrow-right2"></span></a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-distributed widget clearfix">
                        <div class="widget-title">
                            <h3>Subscribe</h3>
							<p><img src="images/savelife.jpg" alt="" class="responsive" height="230px" width="100%"></p>
                        </div>
						
						<!-- <div class="footer-right">
							<form method="get" action="#">
								<input placeholder="Subscribe our newsletter.." name="search">
								<i class="fa fa-envelope-o"></i>
							</form>
						</div> -->                        
                    </div><!-- end clearfix -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
	<div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                   
                    <p class="footer-company-name"><a href="index.php">@<?php echo $row['instablood_name']?>,</a>All Rights Reserved.</p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->
    
             <?php
  }
  ?>

