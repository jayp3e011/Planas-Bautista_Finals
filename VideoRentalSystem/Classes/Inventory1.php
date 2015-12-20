<?php
require_once "database.php";
require_once "invetory.php";
//if($user->is_loggedin()=="")
//{
//	$user->redirect('index.php');
//}
if(isset($_POST['add']))
{
   $title= $_POST['title'];
   $stats= $_POST['stats'];
   $type= $_POST['type'];
   if (strlen($title)<1) {
       $addError[] = "Enter Title";
   }
    elseif (!isset($stats)) {
       $addError[] = "Enter status";
   }
   elseif (!isset($type)) {
       $addError[] = "Enter type";
   }
    else {
       $add= new inventory($type, NULL, $title, $stats);
       $add->insert();
   }
}
if(isset($_POST['update']))
{
    $itNo= $_POST['itNo'];
   $title1= $_POST['title1'];
   $stats1= $_POST['stats1'];
   $type1= $_POST['type1'];
   if (strlen($title1)<1) {
       $addError[] = "Enter Title";
   }
   elseif (strlen($itNo)<1) {
       $addError[] = "Enter No.";
   }
    elseif (!isset($stats1)) {
       $addError[] = "Enter status";
   }
   elseif (!isset($type1)) {
       $addError[] = "Enter type";
   }
    else {
       $add= new inventory($type1, $itNo, $title1, $stats1);
       $add->insert();
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
    <title>Add Inventory</title>

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
            <li><a href="#">Rent</a></li>
            <li><a href="#">Return</a></li>
            <li><a href="#">Reserve</a></li>
            <li><a href="#">Items</a></li>
            <li class="active"><a href="#">Inventory<span class="sr-only">(current)</span></a></li>
             <li><a href="#">Costumer</a></li>
            
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
                  <!-- <li><a href="#delete">Delete</a></li> -->
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
                                   <legend id="a1" >Add Inventory</legend>
                          </div>
                        </div>
                        <div class="form-group">
                      <label class="col-sm-3 control-label">Type</label>
                      <div class="col-sm-8 ">
                        <select class="form-control" name="type">
                          <option value="games">Game</option>
                          <option value="dvd">DVD</option>
                        </select>
                      </div>
                    </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Title</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Employee ID">
                          </div>
                        </div>
                        <div class="form-group">
                      <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-8 ">
                        <select class="form-control" name="stats">
                          <option value="available">Available</option>
                          <option value="N/A">Not Available</option>
                        </select>
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
                        <div class="form-group">
                            <label class="sr-only">Type</label>
                            <select class="form-control" name="searchType1">
                              <option value="games">Game</option>
                              <option value="dvd">DVD</option>   
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Search Item</label>
                            <input type="text" class="form-control" name="upSearchTxt1" id="upSearchTxt" placeholder="Enter Description" />
                        </div>
                          <button type="submit" name="upSearch1" class="form-control btn btn-info">Search</button>
                    </fieldset>
                  </form><br/>
                  <div class="col-sm-4 col-lg-4 col-md-4">
                      
                  <form class="form-horizontal" id="registration" role="form" action="" method="POST">
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
                          <label class="col-sm-3 control-label">Item No.</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="itNo" id="itNo" readonly="readonly">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Title</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="title1" id="title1" />
                          </div>
                        </div>
                        <div class="form-group">
                      <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-8 ">
                        <select class="form-control" name="stats1">
                          <option value="availabe">Available</option>
                          <option value="N/A">Not Available</option>
                          <option value="damage">Damage</option>
                          <option value="lost">Lost</option>
                        </select>
                      </div>
                    </div>
                        <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-3">
                             <!-- <span><?php echo $error; ?></span><br> -->
                            <button type="submit" name="update" class="form-control btn btn-info">Add</button>
                          </div>
                        </div>
                        </fieldset>
                  </form></div>
                  <?php
                   include_once 'Que.php';
                   $where1=" ";
                   $sType1="dvd";
                    if(isset($_POST['upSearch1']))
                    {
                        $sTxt1=$_POST['upSearchTxt1'];
                        $sType1=$_POST['searchType1'];
                        if (strlen($sTxt1)<1) {
                        $addError[] = "enter something";
                        }
                        elseif (isset($sType1)) {
                        $addError[] = "invalid type";
                        }
                        else {
                            $where1="-WHERE item_no LIKE '%".$sTxt1."%' OR title LIKE '%".$sTxt1."%'";
                            
                        }
                        inventory($sType1, $where1);
                    }
//                    inventory($sType, $where);
                  ?>
                  <script type="text/javascript">
                    function selectedUpdate(val){
                            record = val.split(",");
                            document.getElementById("itNo").value=record[0];
                            document.getElementById("title1").value=record[1];
                            document.getElementById("stats1").value=record[2];
                            alert("wewewew");
                    }
                   </script>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <!-- <div id="delete" style="height:450px;overflow:auto;">
                  <h1>Delete</h1>
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div> -->
<!--                <div id="view" style="height:450px;overflow:auto;">
                  <h1>View Form</h1>
                  <?php
//                    echo "<div class ='table-responsive'>";
//                    echo "<table class ='table'>";        
//                    echo "<caption id='a1'>Form LIst</caption>";
//                    echo "<thread><tr>";
//                    echo "<th>Student ID</th>";
//                    echo "<th>Subject</th>";
//                    echo "<th>School Year</th>";
//                    echo "<th>View</th>";
//                    echo "</tr></thread>";
//                    echo "<tbody> ";
//                    $filter='student_usn';
//                    if ($user=='teachers') {
//                      $filter='teacher_id';
//                    }
//                   $icFormView_sql= mysql_query("SELECT * FROM requests WHERE ".$filter."= '$uname_session' AND request_stat='ok' ",$connection);
//                    if ($icFormView_sql) 
//                    {
//                      while ($icFormView_row = mysql_fetch_array($icFormView_sql,MYSQL_NUM)) {
//                        echo "<tr><td>$icFormView_row[1]</td><td>$icFormView_row[3]</td><td>$icFormView_row[5]</td><td><a id='a1' href='icTemp1.php?reqNo=$icFormView_row[0]' target='blank_'>CLICK TO VIEW</a></td></tr>";
//                      }
//                    }
//                    echo "</tbody>";
//                    echo " </table>";
//                    echo "</div><br> ";
                  ?>
                </div>
              </div>
            </div>
          </div>
      </div>-->
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
