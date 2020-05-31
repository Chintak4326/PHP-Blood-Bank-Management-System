<?php
//including the database connection file
require_once("db_connect.php");
require_once('PHPMailer/class.phpmailer.php');
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if(isset($_POST['fname']))
	{
		
		$username = mysqli_real_escape_string($conn,$_POST['fname']);
		$to = mysqli_real_escape_string($conn,$_POST['email_id']);
		$inq = mysqli_real_escape_string($conn,$_POST['message']);
		$anss = mysqli_real_escape_string($conn,$_POST['answer']);
		
		
				$message = "<h3>Dear, ".$username."</h3>you ask us <br><h3>Q.".$inq.".</h3> <br> <h3>For it response our answer is<h3> ".$anss."";
				$subject = "Response For Inquiry";		
				$mailSent = send_mail($to, $message, $subject);
				if ($mailSent) {
					echo "<script>
								window.location='contact.php';
					      </script>";
				} else {
					
				}
				$array = array('status' => '200' , 'details' => $arr);
			}	
			
		
		
	 else {
		echo "some thing wrong";
	}	 
}


 
//getting id of the data from url
if(isset($_GET['contact_id']))
{
$id1 = $_GET['contact_id'];
 
//selecting the row from table
$sql1="Select * from contactus where contact_id = '".$id1."'";
$result=mysqli_query($conn,$sql1);

$row1 = mysqli_fetch_array($result);
 }
?>


<!DOCTYPE html>
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">

      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Inquiry Response</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="" method="post" name="f1">
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
									<input type="text" class="span6" name="fname" value="<?php echo $row1['fname']?>">
     
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
									<input type="email" class="span6" name="email_id" value="<?php echo $row1['email_id']?>">
     
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Inquiry</label>
                                <div class="controls">
                                    <textarea class="span6 " rows="3" name="message"  id="exampleInputPassword1" placeholder="message"><?php echo $row1['message']?></textarea>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label">Answer</label>
                                <div class="controls">
                                    <textarea class="span6 " rows="3" name="answer"  id="exampleInputPassword1" placeholder=""><!-- <?php echo $row1['anss']?> --></textarea>
                                </div>
                            </div>
							
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href='contact.php'><button type="button" class="btn">Cancel</button></a>
                            </div>
							
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>

</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
		if (isset($_POST["answer"]))
		{
			$a=$_POST["answer"];

				
			if($a!='')
			{				
				$update_sql="update contact set ans='".$a."'where contact_id = '".$id1."'";
				
	
				$result=mysqli_query($conn,$update_sql);
		if($result)
				{
					
					 echo "<meta http-equiv='refresh' content='3;url=contact.php'>";

				}
			}
			else
			{
					echo "Value is null";
			}
		}
		else
		{
				echo "Value not set";
		}
}

?>


</html>
