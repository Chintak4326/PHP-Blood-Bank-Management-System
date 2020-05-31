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
                            <div class="row clearfix">
                                <span class="tablename">
                                    BLOOD GROUP TABLE
                                </span>
                                    <div class="btn-group conter" id="b1" style="margin-right: 0.5em;">
                                        <a href='insertbloodgrp.php'>
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
                                            <th>Blood Group ID</th>
                                            <th>Blood group Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    <?php
                                        $sql="Select * from bloodgroup";
    
                                        $result=mysqli_query($conn,$sql);
    
                                        if (!$result)
                                        {
                                            printf("Error: %s\n", mysqli_error($conn));
                                            exit();
                                        }
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['blood_grp_id'] . "</td>";
                                            echo "<td>" . $row['blood_grp_name'] . "</td>";

                                         

                                            echo "<td>
                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\" href=\"bloodgrp.php\"><img src=\"images\ision.png\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"Update\" href=\"updatebloodgrp.php?blood_grp_id=$row[blood_grp_id]\"><img src=\"images\dit.jpg\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"Delete\" href=\"deletebloodgrp.php?blood_grp_id=$row[blood_grp_id]\"><img src=\"images\delete.png\" height=25px/></a> 
                                            
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
            <!-- #END# Exportable Table -->
        </div>
    </section>

   
