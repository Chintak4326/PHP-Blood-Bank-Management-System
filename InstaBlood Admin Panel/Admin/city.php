
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
                        <!-- <div class="header">
                            <div class="clearfix">
                                <span class="tablename">
                                    CITY TABLE
                                </span>
                                    <div class="btn-group conter" id="b1" style="margin-right: 0.5em;">
                                        <a href='insertcity.php'>
                                        <button id="" class="btn-red" data-toggle="tooltip" data-placement="right" title="Add New">Add New <i class="icon-plus"></i></button></a>
                                    </div>
                            </div>
                        </div> -->
                         <div class="header">
                            <div class="clearfix">
                                <span class="tablename">
                                    CITY TABLE
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
                                            <th>City ID</th>
                                            <th>City Name</th>
                                            <th>State Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   <?php
                                        $sql="select c.id,c.name,s.name as state_name_table from city c inner join state s
                                              on c.state_id=s.id";


    
                                        $result=mysqli_query($conn,$sql);
    
                                        if (!$result)
                                        {
                                            printf("Error: %s\n", mysqli_error($conn));
                                            exit();
                                        }
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['state_name_table'] . "</td>";
                                            echo "<td>
                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\" href=\"city.php\"><img src=\"images\ision.png\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"Update\" href=\"updatecity.php?id=$row[id]\"><img src=\"images\dit.jpg\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"Delete\" href=\"deletecity.php?id=$row[id]\"><img src=\"images\delete.png\" height=25px/></a> 
                                            
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

