<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-mid-12 col-lg-12">
                    <form class="form-horizontal" role="form" style="padding:none;">
                   <fieldset>
                        <?php
                        // put your code here
                        include 'GUI.php';
                        addInputTxt('uname', 'col-sm-2', 'Username');
                        addInputTxt('pswd', 'col-sm-2', 'Password');
                        addInputTxt('fName', 'col-sm-2', 'Firstname');
                        addInputTxt('lName', 'col-sm-2', 'Lastname');
                        addInputTxt('emai', 'col-sm-2', 'E-mail');
                        addButton('btn btn-success', 'Submit', 'col-sm-offset-2 col-sm-4', 'Sign Up');
                        ?>
                    </fieldset>
        </form>  
                    <?php
                        require_once 'Status.php';
                        require_once 'database.php';
                    $q = new Status($db);
                    $q->viewStatus('dvd', 'available', 'Return');
                    ?>
                    <?php
                        require_once("Query.php");

                        $crud_book = new Query(7, 'dvd', 'item_no,title,genre,description,price,rental_period,status');
                        $crud_book->mysqlConnect('localhost', 'root', '', 'video_rental');

                        $crud_book->create();
                        echo "<hr/>";

                        $crud_book->read();
                        echo "<hr/>";

                        $crud_book->update();
                        echo "<hr/>";

                        $crud_book->delete();
                        echo "<hr/>";

                    ?>

                </div>
            </div>
        </div>
       
    </body>
</html>
