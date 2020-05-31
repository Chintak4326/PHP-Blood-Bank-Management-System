
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
                        <!-- <div class="header">
                            <div class="clearfix">
                                <span class="tablename">
                                    STATE TABLE
                                </span>
                                    <div class="btn-group conter" id="b1" style="margin-right: 0.5em;">
                                        <a href='insertstate.php'>
                                        <button id="" class="btn-red" data-toggle="tooltip" data-placement="right" title="Add New">Add New <i class="icon-plus"></i></button></a>
                                    </div>
                                    
                            </div>
                        </div> -->
                         <div class="header">
                            <div class="clearfix">
                                <span class="tablename">
                                    STATE TABLE
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
                                            <th>State ID</th>
                                            <th>State Name</th>
                                             <th>Country Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   <?php
                                        
                                        $sql="select s.id,s.name as state_name_table,co.name as country_tab_name from state s,country co
                                                where s.country_id=co.id";
    
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
                                             echo "<td>" . $row['state_name_table'] . "</td>";
                                             echo "<td>" . $row['country_tab_name']."</td>";
                                             
                                            echo "<td>
                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"View\" href=\"state.php\"><img src=\"images\ision.png\" height=25px/></a>&nbsp; &nbsp; &nbsp;
                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"Update\" href=\"updatestate.php?id=$row[id]\"><img src=\"images\dit.jpg\" height=25px/></a>&nbsp; &nbsp; &nbsp;

                                                <a  data-toggle=\"tooltip\" data-placement=\"right\" title=\"Delete\" href=\"deletestate.php?id=$row[id]\"><img src=\"images\delete.png\" height=25px/></a> 
                                               
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

