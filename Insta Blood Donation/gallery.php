<?php
require_once("db_connect.php");
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

    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Contact Us</h2>
                        <ul class="page-title-link">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="portfolio" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Our Gallery</h3>
                
            </div><!-- end title -->
        </div><!-- end container -->

    <div class="container-fluid">

            <div id="da-thumbs" class="da-thumbs portfolio">
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

                <div class="post-media pitem item-w1 item-h1 cat4">
                    <a data-rel="prettyPhoto[gal]" href="<?php foreach(glob('../InstaBlood Admin Panel/Admin/instaimages/*.{jpg,gif,png}', GLOB_BRACE) as $img_url): ?>
                        <img src="<?php= $row['img_url']; ?>" />
                    <?php endforeach; ?>

                     <td><img src="instaimages/<?php echo $row['img_url'] ; ?>" height=100px width=140px></td>
                        <div>
                            <h3>Seahorse by Trevor <small>Web Design</small></h3>
                            <i class="flaticon-unlink"></i>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
            </div><!-- end portfolio -->
        </div><!-- end container -->
    </div><!-- end section -->
    

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