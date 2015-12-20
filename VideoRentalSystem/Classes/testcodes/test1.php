<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>jaypee sign up form</title>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Jaypee Bautista</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="main-nav nav navbar-nav">
          <li><a href="login1.php">Home</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="friends.php">Friends</a></li>
          <li class="active"><a href="signup.html">Sign Up<span class="sr-only">(current)</span></a></li>
        </ul>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
  <br>
  <div class="col-sm-1 col-mid-2 col-lg-3">
  </div>
  <div class="col-sm-10 col-mid-8 col-lg-6">
    <div class="container">
      <div class="row">
        <br><br>
        <form class="form-horizontal" id="registration" role="form" action="" method="POST" enctype="multipart/form-data">
          <fieldset>
            <div class="form-group"> 
              <div class="comtrol-label col-sm-6">
                 <legend>Registration Form</legend>
              </div>
            </div>
            <div class = "form-group">
              <label for ="firstname" class="col-sm-2 control-label">Item No.</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="itemNo" id="itemNo" placeholder="Enter First Name">
              </div>
            </div>
            <div class="form-group">
              <label for="lastname"class="col-sm-2 control-label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Last Name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Genre</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="genre" id="genre" placeholder="Enter E-mail address">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="description" id="description" placeholder="Enter username">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword"class="col-sm-2 control-label">Price</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="price" id="price" placeholder="Enter Password">
                </div>
              </div>
              <div class="form-group">
                <label for="password"class="col-sm-2 control-label">Rental</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="rental" id="rental" placeholder="Re-enter Password">
                </div>
              </div>
              <div class="form-group">
                <label for="password"class="col-sm-2 control-label">Status</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="status" id="status" placeholder="Re-enter Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                  <button type="submit" name="Sign" class="btn btn-info">Sign-Up</button>
                </div>
              </div>
          </fieldset>
        </form>
        <?php
        require_once 'dvd.php';
            if (isset($_POST['Sign']))
            {
                if(strlen($_POST['title'])>0)
                {
                    $title=$_POST['title'];
                }
                else {
                    $title=FALSE;
                    echo '<script>alert("need title")</script>';
                }
                if(strlen($_POST['genre'])>0)
                {
                    $genre=$_POST['genre'];
                }
                else {
                    $genre=FALSE;
                    echo '<script>alert("need genre")</script>';
                }
                if(strlen($_POST['description'])>0)
                {
                    $description=$_POST['description'];
                }
                else {
                    $description=FALSE;
                    echo '<script>alert("need description")</script>';
                }
                if(strlen($_POST['price'])>0)
                {
                    $price=$_POST['price'];
                }
                else {
                    $price=FALSE;
                    echo '<script>alert("need price")</script>';
                }
                if(strlen($_POST['rental'])>0)
                {
                    $rental_period=$_POST['rental'];
                }
                else {
                    $rental_period=FALSE;
                    echo '<script>alert("need rental_period")</script>';
                }
                if(strlen($_POST['status'])>0)
                {
                    $status=$_POST['status'];
                }
                else {
                    $status=FALSE;
                    echo '<script>alert("need status")</script>';
                }
                $form = new dvd('null',$title, $genre, $description, $price, $rental_period, $status);
                $form->connect("video_rental", "localhost", "root", "");
                $form->insert();
            }
        ?>
      </div>
      <footer>&copyJaypee Bautista&trade;</footer>
    </div>
  </div>
  <div class="col-sm-1 col-mid-2 col-lg-3">
  </div>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <script>
   // $('#pdffile').change(function(){
   //    $('#subfile').val($(this).val());
   //  });
  </script>
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"><script>
  </body>
</html>
