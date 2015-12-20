<?php
require_once 'database.php';
require_once 'items.php';
if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}
if(isset($_POST['add']))
{
    $itNo=$_POST['itNo'];
    $addType=$_POST['type1'];
    $addTitle=$_POST['title1'];
    $addGenre=$_POST['itemGenre'];
    $addDescription=$_POST['itemDescription'];
    $addPrice=$_POST['itemPrice'];
    $addStatus=$_POST['stats1'];
    $addRP=$_POST['itemRentalPeriod'];
    if (!isset($addType)) {
        $addError[] = "Type not found";
    }
    elseif (strlen($addTitle)<1) {
        $addError[] = "enter title";
    }
    elseif (strlen($itNo)<1) {
        $addError[] = "enter title";
    }
    elseif (strlen($addGenre)<1) {
        $addError[] = "enter genre";
    }
    elseif (strlen($addDescription)<1) {
        $addError[] = "enter description";
    }
    elseif (strlen($addPrice)<1) {
        $addError[] = "enter price";
    }
    elseif (strlen($addStatus)<1) {
        $addError[] = "enter status";
    }
    elseif (!isset($addRP)) {
        $addError[] = "status not found";
    }
    else {
        $addI = new Items(null, $itNo, $addTitle, $addGenre, $addDescription, $addPrice, $addRP, $addStatus, $addType);
        $addI->insert();
//        $addError[] = "null, $itNo, $addTitle, $addGenre, $addDescription, $addPrice, $addRP, $addStatus, $addType";
    }
}
if(isset($_POST['update']))
{
    $upType=$_POST['upType'];
    $upTitle=$_POST['upTitle'];
    $upGenre=$_POST['upGenre'];
    $upDescription=$_POST['upDescription'];
    $upPrice=$_POST['upPrice'];
    $upStatus=$_POST['upStatus'];
    $upNo=$_POST['upNo'];
    $upRP=$_POST['upRentalPeriod'];
    if (!isset($upType)) {
        $upError[] = "Type not found";
    }
    elseif (strlen($upTitle)<1) {
        $upError[] = "enter title";
    }
    elseif (strlen($upGenre)<1) {
        $upError[] = "enter genre";
    }
    elseif (strlen($upDescription)<1) {
        $upError[] = "enter description";
    }
    elseif (strlen($upPrice)<1) {
        $upError[] = "enter price";
    }
    elseif (strlen($upRP)<1) {
        $upError[] = "enter rentperiod";
    }
    elseif (!isset($upStatus)) {
        $upError[] = "status not found";
    }
    else {
        $upI = new Items($upType, $upNo, $upTitle, $upGenre, $upDescription, $upPrice, $upRP, $upStatus);
        $upI->update();
        
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
    <title>Inventory</title>

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
              <li><a href="Rent1.php">Rent</a></li>
              <li><a href="Return1.php">Return</a></li>
              <li><a href="Reservations1.php">Reserve</a></li>
              <li class="active"><a href="Items1.php">Items<span class="sr-only">(current)</span></a></li>
              <li><a href="Costumer1.php">Costumer</a></li>
              <li><a href="Inventory1.php">Inventory</a></li>
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
                   <li><a href="#view">View</a></li>
              </ul>
            <!-- </nav> -->
            <div id="scrl" data-spy="scroll" data-target="#prof" data-offset="0"  style="height:450px; overflow:hidden;">
            <!-- The navbar - The <a> elements are used to jump to a section in the scrollable area -->
              <div class="col-sm-12"  style="height:450px;">
               <div id="add" style="height:450px;overflow:auto;">
                  <h1>Add</h1>
                  <form class="form-inline" id="registration" role="form" action="" method="POST">
                    <fieldset>
                         <div class="form-group">
                          <label class="sr-only">Type</label>
                          <select class="form-control" name="searchType" id="searchType">
                              <option value="games">Game</option>
                              <option value="dvd">DVD</option>   
                        </div>
                      <div class="form-group">
                        <label class="sr-only">Search Item</label>
                          <input type="text" class="form-control" name="upSearchTxt" id="upSearchTxt" placeholder="Enter Description">
                        </div>
                          <button type="submit" name="upSearch" class="form-control btn btn-info">Search</button>
                    </fieldset>
                  </form><br/>
                  <div class="col-sm-4 col-lg-4 col-md-4">
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
              <label class="col-sm-3 control-label">Type</label>
              <div class="col-sm-8 ">
                  <select class="form-control" name="type1" id="type1">
                  <option value="games">Game</option>
                  <option value="dvd">DVD</option>
                </select>
              </div>
            </div>
                   <div class="form-group">
                  <label class="col-sm-3 control-label">Item No</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="itNo" id="itNo" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="title1" id="title1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemGenre"class="col-sm-3 control-label">Genre</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="itemGenre" id="itemGenre" placeholder="Enter Genre">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="itemDescription"class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="itemDescription" id="itemDescription" placeholder="Enter Description">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="itemPrice"class="col-sm-3 control-label">Price</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="itemPrice" id="itemPrice" placeholder="Enter Price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemRentalPeriod"class="col-sm-3 control-label">Rental Period</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="itemRentalPeriod" id="itemRentalPeriod" placeholder="Enter Rental Period">
                  </div>
                </div>
                <div class="form-group">
              <label class="col-sm-3 control-label">Status</label>
              <div class="col-sm-8 ">
                <select class="form-control" name="stats1"  id="itemStatus">
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
                   <!--WHERE item_no LIKE '%".$search."%' OR title LIKE '%".$search."%'-->
               
              </fieldset>
                  </form></div>
              
                  <?php
                   include_once 'Que.php';
                   $where=" ";
                   $sType="dvd";
                    if(isset($_POST['upSearch']))
                    {
                        $sTxt=$_POST['upSearchTxt'];
                        $sType=$_POST['searchType'];
                        if (strlen($sTxt)<1) {
                        $addError[] = "enter something";
                        }
                        elseif (isset($sType)) {
                        $addError[] = "invalid type";
                        }
                        else {
                            $where="-WHERE item_no LIKE '%".$sTxt."%' OR title LIKE '%".$sTxt."%'";
                        }
                    }
                    inventory($sType, $where);
                  ?>
                 
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <div id="update" style="height:450px;overflow:auto;">
                  <h1>Update</h1>
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
                  <form class="form-inline" id="registration" role="form" action="" method="POST">
                    <fieldset>
                      <div class="form-group">
                        <label class="sr-only">Search Item</label>
                          <input type="text" class="form-control" name="upSearchTxt1" id="upSearchTx1t" placeholder="Enter Description">
                        </div>
                          <button type="submit" name="upSearch1" class="form-control btn btn-info">Search</button>
                    </fieldset>
                  </form><br>
                  <div class="col-sm-4 col-lg-4 col-md-4"><form class="form-horizontal" id="registration" role="form" action="" method="POST">
                  <fieldset>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Type</label>
                  <div class="col-sm-8 ">
                      <select class="form-control" name="upType" id="upType">
                      <option value="games">Game</option>
                      <option value="dvd">DVD</option>
                    </select>
                  </div>
                </div> 
                      <div class="form-group">
                      <label for="upTitle" class="col-sm-3 control-label">List No.</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="upList" id="upNo" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="upTitle" class="col-sm-3 control-label">Item No.</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="upNo" id="upNo" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="upTitle" class="col-sm-3 control-label">Title</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="upTitle" id="upTitle" placeholder="Enter Title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="upGenre" class="col-sm-3 control-label">Genre</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="upGenre" id="upGenre" placeholder="Enter Genre">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="upDescription"class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="upDescription" id="upDescription" placeholder="Enter Description">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="upPrice"class="col-sm-3 control-label">Price</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="upPrice" id="upPrice" placeholder="Enter Price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="upRentalPeriod"class="col-sm-3 control-label">Rental Period</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="upRentalPeriod" id="upRentalPeriod" placeholder="Enter Rental Period">
                      </div>
                    </div>
                    <div class="form-group">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8 ">
                    <select class="form-control" name="upStatus" id="upStatus">
                      <option value="available">Available</option>
                      <option value="N/A">Not Available</option>
                    </select>
                  </div>
                </div>

                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-3">
                         <!-- <span><?php echo $error; ?></span><br> -->
                        <button type="submit" name="update" class="form-control btn btn-info">Update</button>
                      </div>
                    </div>

                  </fieldset>
                </form></div>
                   <?php
                   include_once 'Que.php';
                    if(isset($_POST['upSearch1']))
                    {
                        $sTxt1=$_POST['upSearchTxt1'];
                        if (strlen($sTxt1)<1) {
                        $upError[] = "enter something";
                        }
                        else {
                            readItem($sTxt1);

                        }
                    }
                  ?>
                  <script type="text/javascript">
                    function selectedUpdate(val){
                             records = val.split(",");
                            document.getElementById("itNo").value=records[0];
                            document.getElementById("title1").value=records[1];
                            document.getElementById("stats1").value=records[2];
                             document.getElementById("type1").value=<?php echo "$sType";?>;
                            record = val.split(",");
                            document.getElementById("upList").value=record[0];
                            document.getElementById("upNo").value=record[1];
                            document.getElementById("upTitle").value=record[2];
                            document.getElementById("upGenre").value=record[3];
                            document.getElementById("upDescription").value=record[4];
                            document.getElementById("upRentalPeriod").value=record[5];
                            document.getElementById("upStatus").value=record[6];
                            alert("wewewew");
                    }
                   </script>
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
