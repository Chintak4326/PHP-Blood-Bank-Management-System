<?php 
    require_once("db_connect.php");
?>

<?php 
     include('include/navbar.php');
    include('include/menu.php');
    include('include/tableheader.php');
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="clearfix">
                                <span class="tablename">
                                    REQUEST FOR BLOOD TABLE
                                </span>
                                    <span class="data1">
                                      <a href="index.php"><i class="material-icons">home</i></a>
                                      <span id="home2">/ View Form</span>
                                    </span>
                            </div>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead>
                                        <tr>
                                            <th>Request Id</th>th>
                                            <th>Patient Name</th>
                                            <th>Contact Name</th>
                                            <th>Contact Email ID</th>
                                            <th>Blood Group</th>
                                            <th>Contact Number</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>District</th>
                                            <th>Tehsil</th>
                                            <th>Blood Required Date</th>
                                            <th>Doctor Name</th>
                                            <th>Hospital Details</th>
                                            <th>Message</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql="select b.blood_grp_name as blood_table_name,r.* from bloodgroup b inner join request r where b.blood_grp_id=r.blood_grp_name";


                                        // $sql="Select * from request";
    
                                        $result=mysqli_query($conn,$sql);
    
                                        if (!$result)
                                        {
                                            printf("Error: %s\n", mysqli_error($conn));
                                            exit();
                                        }
                                        while($row = mysqli_fetch_array($result))
                                        {
                                             echo "<tr>";
                                              echo "<td>" . $row['request_id'] . "</td>";
                                             echo "<td>" . $row['patient_name'] . "</td>";
                                             echo "<td>" . $row['contact_name'] . "</td>";
                                             echo "<td>" . $row['contact_email_id'] . "</td>";
                                             echo "<td>" . $row['blood_table_name'] . "</td>";
                                             echo "<td>" . $row['contact_no'] . "</td>";
                                             echo "<td>" . $row['city_name'] . "</td>";
                                             echo "<td>" . $row['state_name'] . "</td>";
                                             echo "<td>" . $row['district_name'] . "</td>";
                                             echo "<td>" . $row['tehsil_name'] . "</td>";
                                             echo "<td>" . $row['blood_req_date'] . "</td>";
                                             echo "<td>" . $row['doctor_name'] . "</td>";
                                             echo "<td>" . $row['hospital_details'] . "</td>";
                                             echo "<td>" . $row['message'] . "</td>";
                                             
                                            echo "<td>
                                             <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\" href=\"request.php\"><img src=\"images\ision.png\" height=25px/></a>&nbsp; &nbsp; &nbsp

                                            <a data-toggle=\"tooltip\" data-placement=\"right\" title=\"Delete\" href=\"deleterequest.php?request_id=$row[request_id]\"><img src=\"images\delete.png\" height=40px/></a> &nbsp; &nbsp;&nbsp;
                                            <a data-toggle=\"tooltip\" data-placement=\"right\" title=\"Response\" href=\"response.php?request_id=$row[request_id]\"><img src=\"images\sending.png\" height=40px/></a>
                                            </td>";
                                                 echo "</tr>";
                                             }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

