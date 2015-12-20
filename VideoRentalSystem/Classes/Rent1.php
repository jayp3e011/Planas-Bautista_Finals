<?php
require_once 'database.php';
require_once 'rentals.php';
//if($user->is_loggedin()!="")
//{
//	$user->redirect('index.php');
//}
if(isset($_POST['rent']))
{
    $itemNo=$_POST['itemNo'];
    $title=$_POST['title'];
    $customer=$_POST['customer'];
    $date=$_POST['date'];
    if (strlen($itemNo)<1) {
        $addError[] = "enter no.";
    }
//    elseif (strlen($customer)<1) {
//        $addError[] = "enter costumer";
//    }
    elseif (strlen($title)<1) {
        $addError[] = "enter title";
    }
    elseif (strlen($date)<1) {
        $addError[] = "enter date";
    }
    else {
        $check="SELECT customer_id FROM customer_accounts WHERE customer_id=".(int)$customer."";
        $res=  mysql_query($check);
        if ($res) {
            $addI =new rentals(NULL, $customer, $title, $itemNo, $date, 'N/A') ;
            $addI->insert();
        }
        else {
            $addError[]= "Customer is not a member. $customer";
        }
        
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
    <title>Rent Items </title>

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
              <li class="active"><a href="Rent1.php">Rent<span class="sr-only">(current)</span></a></li>
              <li><a href="Return1.php">Return</a></li>
              <li><a href="Reservations1.php">Reserve</a></li>
              <li><a href="Items1.php">Items</a></li>
              <li><a href="Customer1.phpC">Costumer</a></li>
              <li><a href="Inventory1.php">Inventory</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<br> <br><br><br><br>
    <div class="col-sm-2 col-mid-1" >
    </div>
    <div class="col-sm-10 col-mid-11 col-lg-12"  style="background-color: rgba(0, 0, 245, 0.7); border-radius:20px;">
      <div class="row"  id="container">
        <div class="col-sm-12 col-mid-12 col-lg-12" id="container">
          <br><br>
              <div class="col-sm-4 col-lg-4 col-md-4">
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
                  <form class="form-inline" id="registration" role="form" action="" method="POST">
                    <fieldset>
                      <div class="form-group">
                        <label class="sr-only">Search Item</label>
                          <input type="text" class="form-control" name="upSearchTxt" id="upSearchTxt" placeholder="Enter Description">
                        </div>
                          <button type="submit" name="upSearch" class="form-control btn btn-info">Search</button>
                    </fieldset>
                  </form><br>
                   
                     
                      <form class="form-horizontal" id="registration" role="form" action="" method="POST">
                  <fieldset>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Item No.</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="itemNo" id="itemNo" readonly="readonly">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-3 control-label">Title</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="title" id="title" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword"class="col-sm-3 control-label">Costumer</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="customer" id="customer" placeholder="Enter Costmer ID">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword"class="col-sm-3 control-label">Date Borrowed</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="date" id="date" value="<?php echo date("m/d/y");?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-3">
                        <button type="submit" name="rent" class="form-control btn btn-info">Rent</button>
                      </div>
                    </div>
                   
                  </fieldset>
                      </form>
                  
              </div>
                     <?php
                   include_once 'Que.php';
                    if(isset($_POST['upSearch']))
                    {
                        $sTxt=$_POST['upSearchTxt'];
                        if (strlen($sTxt)<1) {
                        $upError[] = "enter rentperiod";
                        }
                        else {
                            readItem($sTxt, "AND status='available'");

                        }
                    }
                  ?>  <script type="text/javascript">
                    function selectedUpdate(val){
                            record = val.split(",");
                            document.getElementById("itemNo").value=record[0];
                            document.getElementById("title").value=record[2];
//                            document.getElementById("upGenre").value=record[2];
//                            document.getElementById("upDescription").value=record[3];
//                            document.getElementById("upPrice").value=record[4];
//                            document.getElementById("upRentalPeriod").value=record[5];
//                            document.getElementById("upStatus").value=record[6];
//                            document.getElementById("upType").value=\''.$tbl.'\';
//                            alert("wewewew");
                    }
                   </script>
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
