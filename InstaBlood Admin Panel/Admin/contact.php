<?php 
    require_once("db_connect.php");
?>

<?php 
     include('include/navbar.php');
    include('include/menu.php');
    include('include/tableheader.php');
?>
<script type="text/javascript">
function f1()
{
   return confirm("Are You Sure do you want to delete this Record?");
 }
</script>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="clearfix">
                                <span class="tablename">
                                    CONTACT US TABLE
                                </span>
                                    <!-- <div class="btn-group conter" id="b1" style="margin-right: 0.5em;">
                                        <a href='insertcity.php'>
                                        <button id="" class="btn-red" data-toggle="tooltip" data-placement="right" title="Add New">Add New <i class="icon-plus"></i></button></a>
                                    </div> -->
                                    <!-- <div class="btn-group conter" >
                                        <a href="updatebloodgrp.php?blood_grp_id=$row[blood_grp_id]">
                                        <button id="" class="btn-red">Update<i class="icon-plus"></i></button></a>
                                    </div> -->
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
                                            <th>Contact ID</th>
                                            <th>Full Name</th>
                                            <th>Last Name</th>
                                            <th>Email Id</th>
                                            <th>Mobile No</th>
                                            <th>City</th>
                                            <th>Message</th>
                                            <th>Acttion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql="select * from contactus";
    
                                        $result=mysqli_query($conn,$sql);
    
                                        if (!$result)
                                        {
                                            printf("Error: %s\n", mysqli_error($conn));
                                            exit();
                                        }
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['contact_id'] . "</td>";
                                            echo "<td>" . $row['fname'] . "</td>";
                                            echo "<td>" . $row['lname'] . "</td>";
                                            echo "<td>" . $row['email_id'] . "</td>";
                                            echo "<td>" . $row['mobile_no'] . "</td>";
                                            echo "<td>" . $row['city'] . "</td>";
                                            echo "<td>" . $row['message'] . "</td>";




                                            echo "<td>
                                           <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\" href=\"contact.php\"><img src=\"images\ision.png\" height=25px/></a>&nbsp; &nbsp


                                            <a data-toggle=\"tooltip\" onclick=\"return f1()\"data-placement=\"right\" title=\"Delete\" href=\"deletecontact.php?contact_id=$row[contact_id]\"><img src=\"images\delete.png\" height=40px/></a>&nbsp; &nbsp

                                              <a data-toggle=\"tooltip\" data-placement=\"right\" title=\"Response\" href=\"response.php?contact_id=$row[contact_id]\"><img src=\"images\sending.png\" height=40px/></a>
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



