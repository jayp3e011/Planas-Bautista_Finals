<?php
require_once 'database.php';
if($user->is_loggedin()!="")
{
	$user->redirect('Rent1.php');
}

if(isset($_POST['Sign']))
{
	$uname = $_POST['uname'];
	$upass = $_POST['pswd'];
		
	if($user->login($uname,$upass))
	{
		$user->redirect('test2.php');
	}
	else
	{
		$error = "Enter valid Username and Password!";
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
    <title>Login</title>

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
              <li class="active"><a href="index.php">Login<span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<br> <br><br><br><br>
    <div class="col-sm-1 col-mid-2 col-lg-3" >
    </div>
    <div class="col-sm-10 col-mid-8 col-lg-6"  style="background-color: rgba(0, 0, 245, 0.7); border-radius:20px;">
      <div class="row"  id="container">
        <div class="col-sm-12 col-mid-12 col-lg-12" id="container">
          <br><br>
          <form class="form-horizontal" id="registration" role="form" action="" method="POST">
              <fieldset>
                <div class="form-group"> 
                  <div class="control-label col-sm-12">
                           <legend id="a1" >Log in</legend>
                  </div>
                </div>
                <?php
                    if(isset($error))
                    {
                ?>
                 <div class="alert alert-danger">
                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                 </div>
                 <?php
                    }
                ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Employee ID</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword"class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="pswd" id="pswd" placeholder="Enter Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-3">
                     <!-- <span><?php echo $error; ?></span><br> -->
                    <button type="submit" name="Sign" class="form-control btn btn-info">Log-in</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
            <center><footer>&copyJaypee Bautista&trade;</footer></center>
          </div>
        </div>
       </div>
              <div class="col-sm-1 col-mid-2 col-lg-3">
            </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"><script>
      </body>
</html>
