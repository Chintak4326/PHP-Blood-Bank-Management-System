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
                                    COMPANY TABLE
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
                                            <th>Company ID</th>
                                            <th>Company Name</th>
                                            <th>Company Mobile No</th>
                                            <th>Company Email ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   <?php
                                        $sql="Select * from instablood";
    
                                        $result=mysqli_query($conn,$sql);
    
                                        if (!$result)
                                        {
                                            printf("Error: %s\n", mysqli_error($conn));
                                            exit();
                                        }
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['instablood_id'] . "</td>";
                                            echo "<td>" . $row['instablood_name'] . "</td>";
                                            echo "<td>" . $row['instablood_number'] . "</td>";
                                            echo "<td>" . $row['instablood_email'] . "</td>";
                                            echo "<td>
                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\" href=\"instablood.php\"><img src=\"images\ision.png\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"Update\" href=\"updateinstablood.php?instablood_id=$row[instablood_id]\"><img src=\"images\dit.jpg\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                                
                                            
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

    