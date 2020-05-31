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
    <div id="ctl00_ContentPlaceHolder1_UpdatePanel1">

            <div class="container">
                <br />
                <div class="row ">
                    <div class="row text-center">
                        <div class="col-md-12 typeHeading1">
                            <h3>A- Blood Donors In India</h3>
                        </div>
                    </div>
                        <div id="ctl00_ContentPlaceHolder1_pnlShowListImages">
		
                            
                                    <div class="col-md-12 tableblood">
                                        <div class="form-group">
                                            <table id="blood-table">
                                                <tr>
                                                    <th>
                                                        <b style="color: black;">Name</b>
                                                    </th>
                                                    <th>
                                                        <b style="color: black;">Country_Name</b>
                                                    </th>
                                                    <th>
                                                        <b style="color: black;">State Name</b>
                                                    </th>
                                                    <th>
                                                         <b style="color: black;">City Name</b>
                                                    </th>
                                                    <th>
                                                        <b style="color: black;">Visit</b> 
                                                    </th>
                                                </tr>


                                                 <?php
                                                 $sql="select c.name as city_name_table,s.name as state_name_table,co.name as country_tab_name,d.*,b.blood_grp_name from donor d
                                                     inner join country co on d.country_name=co.id inner join 
                                                     state s on d.state_name=s.id inner join city c on d.city_name=c.id inner join bloodgroup b on d.blood_grp=b.blood_grp_id
                                                        where b.blood_grp_name='A-'";
                
                                                    $result=mysqli_query($conn,$sql);
                
                                                    if (!$result)
                                                    {
                                                        printf("Error: %s\n", mysqli_error($conn));
                                                        exit();
                                                    }
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['username'] . "</td>";
                                                         echo "<td>" . $row['country_tab_name'] . "</td>";
                                                         echo "<td>" . $row['state_name_table'] . "</td>";
                                                         echo "<td>" . $row['city_name_table'] . "</td>";
                                                        echo "<td style=\"width:10px;\">
                                                         <a href=\"visit.php?id=$row[id]\" class=\"btn btn-light10\">VISIT</a>
                                                        </td>";
                                                             echo "</tr>";
                                                         }
                                                    ?>   
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>  
	</div>
     <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>  
</body>
</html>



