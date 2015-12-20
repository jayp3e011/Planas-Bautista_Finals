<?php
require_once "database.php";
require_once "customer.php";
//if($user->is_loggedin()=="")
//{
//	$user->redirect('index.php');
//}
if(isset($_POST['add']))
{
   $fname= $_POST['fname'];
   $lname= $_POST['lname'];
   $address= $_POST['address'];
   $telNo= $_POST['telNo'];
   if (strlen($telNo)<1) {
       $addError[] = "Enter Tel No.";
   }
    elseif (strlen($fname)<1) {
       $addError[] = "Enter Firstname";
   }
    elseif (strlen($lname)<1) {
       $addError[] = "Enter Lastname";
   }
    elseif (strlen($address)<2) {
       $addError[] = "Enter Address";
   }
    else {
       $add= new Customer(NULL, $fname, $lname, $address, $telNo);
       $add->insert();
   }
}
if(isset($_POST['update']))
{
   $fname1= $_POST['fname1'];
   $lname1= $_POST['lname1'];
   $address1= $_POST['address1'];
   $telNo1= $_POST['telNo1'];
   if (strlen($telNo1)<1) {
       $addError[] = "Enter Tel No.";
   }
    elseif (strlen($fname1)<1) {
       $addError[] = "Enter Firstname";
   }
    elseif (strlen($lname1)<1) {
       $addError[] = "Enter Lastname";
   }
    elseif (strlen($address1)<2) {
       $addError[] = "Enter Address";
   }
    else {
       $up= new customer(NULL, $fname1, $lname1, $address1, $telNo1);
       $up->insert();
   }
}
    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Costumer</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>

  <body id="bg">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="og0.png" height="10" class="img-responsive"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="main-nav nav navbar-nav">
              <li><a href="Rent.php">Rent</a></li>
              <li><a href="Return.php">Return</a></li>
              <li><a href="Reservations.phpe">Reserve</a></li>
              <li><a href="Items.phpI">Items</a></li>
              <li><a href="Inventory.phpI">Inventory</a></li>
              <li class="active"><a href="Costumer.php">Costumer<span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<br> <br><br><br><br>
    <div class="col-sm-2 col-mid-1" >
    </div>
    <div class="col-sm-10 col-mid-11 col-lg-12" style="background-color: rgba(0, 0, 245, 0.7); border-radius:20px;">
      <div class="container-fuid" style="position:relative">
        <div class="row">
          <br><br>
         <!-- The scrollable area -->
          <div class="col-sm-12 col-mid-12 col-lg-12">
            <!-- <nav class="navbar navbar-inverse" id="prof"> -->
              <ul class="nav nav-pills navbar-inverse" id="prof">
                <li><a href="#add">add</a></li>
                 <li><a href="#update">Update</a></li>
                  <li><a href="#delete">Delete</a></li>
                   <li><a href="#view">View</a></li>
              </ul>
            <!-- </nav> -->
            <div id="scrl" data-spy="scroll" data-target="#prof" data-offset="0"  style="height:450px; overflow:hidden;">
            <!-- The navbar - The <a> elements are used to jump to a section in the scrollable area -->
              <div class="col-sm-12"  style="height:450px;">
               <div id="add" style="height:450px;overflow:auto;">
                  <h1>Add</h1>
                  <form class="form-horizontal" id="registration" role="form" action="" method="POST">
                    <fieldset>
                         <?php
			if(isset($addError))
			{
			 	foreach($addError as $addError)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $addError; ?>
                     </div>
                     <?php
				}
			} ?>
                      <div class="form-group"> 
                        <div class="control-label col-sm-12">
                                 <legend id="a1" >Add Costumer</legend>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Employee ID">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lname"class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Password">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="address"class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="address" id="address" placeholder="Enter Password">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="telNo"class="col-sm-3 control-label">Telephone No.</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="telNo" id="telNo" placeholder="Enter Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                           <!-- <span><?php echo $error; ?></span><br> -->
                          <button type="submit" name="add" class="form-control btn btn-info">Add</button>
                        </div>
                      </div>
                     
                    </fieldset>
                  </form>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <div id="update" style="height:450px;overflow:auto;">
                  <h1>Update</h1>
                  <form class="form-inline" id="registration" role="form" action="" method="POST">
                    <fieldset>
                        <?php
			if(isset($upError))
			{
			 	foreach($upError as $upError)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $upError; ?>
                     </div>
                     <?php
				}
			} ?>
                      <div class="form-group">
                        <label class="sr-only">Search Item</label>
                          <input type="text" class="form-control" name="upSearchTxt" id="upSearchTxt" placeholder="Enter Description">
                        </div>
                          <button type="submit" name="upSearch" class="form-control btn btn-info">Search</button>
                    </fieldset>
                  </form><br>
                  
                   <?php
                   include_once 'Que.php';
                    if(isset($_POST['upSearch']))
                    {
                        $sTxt=$_POST['upSearchTxt'];
                        if (strlen($sTxt)<1) {
                        $upError[] = "enter rentperiod";
                        }
                        else {
                            readCustomer($sTxt);

                        }
                    }
                  ?>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <div id="delete" style="height:450px;overflow:auto;">
                  <h1>Delete</h1>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <div id="view" style="height:450px;overflow:auto;">
                  <h1>View Form</h1>
                  <?php
                    echo "<div class ='table-responsive'>";
                    echo "<table class ='table'>";        
                    echo "<caption id='a1'>Form LIst</caption>";
                    echo "<thread><tr>";
                    echo "<th>Student ID</th>";
                    echo "<th>Subject</th>";
                    echo "<th>School Year</th>";
                    echo "<th>View</th>";
                    echo "</tr></thread>";
                    echo "<tbody> ";
                    $filter='student_usn';
                    if ($user=='teachers') {
                      $filter='teacher_id';
                    }
                   $icFormView_sql= mysql_query("SELECT * FROM requests WHERE ".$filter."= '$uname_session' AND request_stat='ok' ",$connection);
                    if ($icFormView_sql) 
                    {
                      while ($icFormView_row = mysql_fetch_array($icFormView_sql,MYSQL_NUM)) {
                        echo "<tr><td>$icFormView_row[1]</td><td>$icFormView_row[3]</td><td>$icFormView_row[5]</td><td><a id='a1' href='icTemp1.php?reqNo=$icFormView_row[0]' target='blank_'>CLICK TO VIEW</a></td></tr>";
                      }
                    }
                    echo "</tbody>";
                    echo " </table>";
                    echo "</div><br> ";
                  ?>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <center><footer>&copyJaypee Bautista&trade;</footer></center>
          </div>
        </div>
       </div>
              <div class="col-sm-2 col-mid-1">
            </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"><script>
      </body>
</html>
