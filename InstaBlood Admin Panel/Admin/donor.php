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
                                    DONOR TABLE
                                </span>
                                    <div class="btn-group conter" id="b1" style="margin-right: 0.5em;">
                                        <a href='insertdonor.php'>
                                        <button id="" class="btn-red" data-toggle="tooltip" data-placement="right" title="Add New">Add New <i class="icon-plus"></i></button></a>
                                    </div>
                                    <!-- <div class="btn-group conter" >
                                        <a href="updatebloodgrp.php?blood_grp_id=$row[blood_grp_id]">
                                        <button id="" class="btn-red">Update<i class="icon-plus"></i></button></a>
                                    </div> -->
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead>
                                            <tr>
                                            <th>Donor ID</th>
                                            <th>Full Name</th>
                                            <th>Email ID</th>
                                            <th>Dob</th>
                                            <th>Gender</th>
                                            <th>Blood Group</th>
                                            <th>Weight</th>
                                            <th>Last Donation Date</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Pincode</th>
                                            <th>Mobile No</th>
                                            <th>Address</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql3="select c.name as city_name_table,s.name as state_name_table,co.name as country_tab_name,b.   blood_grp_name as blood_table_name,d.* from city c,donor d,state s,country co,bloodgroup b
                                                where d.country_name=co.id and 
                                                    d.city_name=c.id and
                                                    d.state_name=s.id and d.blood_grp=b.blood_grp_id";
                                        $result3=mysqli_query($conn,$sql3);
                                       while ($row3=mysqli_fetch_assoc($result3)){
                                            # code...
                                       
                                            echo "<tr>";
                                            echo "<td>" . $row3['id'] . "</td>";
                                            echo "<td>" . $row3['username'] . "</td>";
                                            echo "<td>" . $row3['email'] . "</td>";
                                            echo "<td>" . $row3['dob'] . "</td>";
                                            echo "<td>" . $row3['gender'] . "</td>";
                                            echo "<td>" . $row3['blood_table_name'] . "</td>";
                                            echo "<td>" . $row3['weight'] . "</td>";
                                            echo "<td>" . $row3['last_don_date'] . "</td>";
                                            echo "<td>".$row3['country_tab_name']."</td>";
                                            echo "<td>".$row3['state_name_table']."</td>";
                                            echo "<td>".$row3['city_name_table']."</td>";
                                            echo "<td>" . $row3['mobile_no'] . "</td>";
                                            echo "<td>" . $row3['pincode'] . "</td>";
                                            echo "<td>" . $row3['address'] . "</td>";

                                            echo "<td>
                                            <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\" href=\"donor.php\"><img src=\"images\ision.png\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                            <a data-toggle=\"tooltip\" data-placement=\"right\" title=\"Delete\" href=\"deletedonor.php?id=$row3[id]\"><img src=\"images\delete.png\" 
                                                height=40px/></a> &nbsp; &nbsp; &nbsp;
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