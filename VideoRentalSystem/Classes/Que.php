<?php
//    class Que{
//        private $db;
//	
//        function __construct($DB_con)
//        {
//                $this->db = $DB_con;
//        }
        function readItem($search,  $status="")
        {
            echo '';
            echo '<div class="col-sm-8 col-md-8 col-lg-8">';
              echo "<div class ='form-group table-responsive'>";
              echo "<table class ='table'>";        
              echo "<caption>Student LIst</caption>";
              echo "<thread><tr>";
              echo "<th>List No.</th>";
              echo "<th>Item No.</th>";
              echo "<th>Title</th>";
              echo "<th>Genre</th>";
              echo "<th>Description</th>";
              echo "<th>Price</th>";
              echo "<th>Rental Period</th>";
              echo "<th>Status</th>";
              echo "<th>Type</th>";
              echo "<th>Aciion</th>";
              echo "</tr></thread>";
              echo "<tbody> ";
              echo '<script type="text/javascript">
                    function selectedUpdate(val){
                            record = val.split(",");
                            document.getElementById("upNo").value=record[0];
                            document.getElementById("upTitle").value=record[1];
                            document.getElementById("upGenre").value=record[2];
                            document.getElementById("upDescription").value=record[3];
                            document.getElementById("upPrice").value=record[4];
                            document.getElementById("upRentalPeriod").value=record[5];
                            document.getElementById("upStatus").value=record[6];
                            document.getElementById("upType").value=record[6];
                            alert("wewewew");
                    }
                   </script>';
                            $sql = "SELECT * FROM itemlist WHERE item_no LIKE '%".$search."%' OR title LIKE '%".$search."%' OR genre LIKE '%".$search."%' OR type LIKE '%".$search."%' OR description LIKE '%".$search."%' ".$status."";
                            $result = mysql_query($sql);			
                            $j=0;
                            while($rows=mysql_fetch_array($result)){
                                    echo '<tr>';
                                    $record[$j]='';
                                    for($i=0;$i<9;$i++){
                                            echo '<td>'.$rows[$i].'</td>';					
                                            $record[$j].=$rows[$i].',';
                                    }
                                    echo '<td><input type="button" value="Select" id="btnSelect" name="btnSelect" onclick="selectedUpdate(\''.$record[$j++].'\')" /></td>';					
                                    echo '</tr>';
                            }
              echo "</tbody>";
              echo " </table>";
              echo "</div></div><br> ";
        }
        function inventory($tbl, $search="")
        {
            echo '';
            echo '<div class="col-sm-8 col-md-8 col-lg-8">';
              echo "<div class ='form-group table-responsive'>";
              echo "<table class ='table'>";        
              echo "<caption>Student LIst</caption>";
              echo "<thread><tr>";
              echo "<th>Item No</th>";
              echo "<th>Title</th>";
              echo "<th>Status</th>";
              echo "<th>Aciion</th>";
              echo "</tr></thread>";
              echo "<tbody> ";
              echo '';
                            $sql = "SELECT * FROM ".$tbl."".$search."";
                            $result = mysql_query($sql);			
                            $j=0;
                            while($rows=mysql_fetch_array($result)){
                                    echo '<tr>';
                                    $record[$j]='';
                                    for($i=0;$i<3;$i++){
                                            echo '<td>'.$rows[$i].'</td>';					
                                            $record[$j].=$rows[$i].',';
                                    }
                                    echo '<td><input type="button" value="Select" id="btnSelect" name="btnSelect" onclick="selectedUpdate(\''.$record[$j++].'\')" /></td>';					
                                    echo '</tr>';
                            }
              echo "</tbody>";
              echo " </table>";
              echo "</div></div><br> ";
        }
        function readCustomer($search)
        {
            echo '<div class="col-sm-4 col-lg-4 col-md-4"><form class="form-horizontal" id="registration" role="form" action="" method="POST">
                        <fieldset>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="fname1" id="fname1" placeholder="Enter Employee ID">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="lname1"class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="lname1" id="lname1" placeholder="Enter Password">
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="address1"class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="address1" id="address1" placeholder="Enter Password">
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="telNo1"class="col-sm-3 control-label">Telephone No.</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="telNo1" id="telNo1" placeholder="Enter Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-3">
                               <!-- <span><?php echo $error; ?></span><br> -->
                              <button type="submit" name="update" class="form-control btn btn-info">Update</button>
                            </div>
                          </div>

                        </fieldset>
                      </form>';
            echo '</div><div class="col-sm-8 col-md-8 col-lg-8">';
              echo "<div class ='form-group table-responsive'>";
              echo "<table class ='table'>";        
              echo "<caption>Student LIst</caption>";
              echo "<thread><tr>";
              echo "<th>Customer ID</th>";
              echo "<th>FirstName</th>";
              echo "<th>Lastname</th>";
              echo "<th>Address</th>";
              echo "<th>Tel No.</th>";
              echo "<th>Select</th>";
              echo "</tr></thread>";
              echo "<tbody> ";
              echo '<script type="text/javascript">
                    function selectedUpdate(val){
                            record = val.split(",");
                            document.getElementById("fname1").value=record[1];
                            document.getElementById("lname1").value=record[2];
                            document.getElementById("address1").value=record[3];
                            document.getElementById("telNo1").value=record[4];
                            alert("wewewew");
                    }
                   </script>';
                            $sql = "SELECT * FROM customer_accounts WHERE customer_id LIKE '%".$search."%' OR first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%' OR address LIKE '%".$search."%'";
                            $result = mysql_query($sql);			
                            $j=0;
                            while($rows=mysql_fetch_array($result)){
                                    echo '<tr>';
                                    $record[$j]='';
                                    for($i=0;$i<5;$i++){
                                            echo '<td>'.$rows[$i].'</td>';					
                                            $record[$j].=$rows[$i].',';
                                    }
                                    echo '<td><input type="button" value="Select" id="btnSelect" name="btnSelect" onclick="selectedUpdate(\''.$record[$j++].'\')" /></td>';					
                                    echo '</tr>';
                            }
              echo "</tbody>";
              echo " </table>";
              echo "</div></div><br> ";
        }
        function table($search)
        {
            $where=' ';
            echo '</div><div class="col-sm-8 col-md-8 col-lg-8">';
              echo "<div class ='form-group table-responsive'>";
              echo "<table class ='table'>";        
              echo "<caption>Student LIst</caption>";
              echo "<thread><tr>";
              echo "<thCustomer ID</th>";
              echo "<th>FirstName</th>";
              echo "<th>Lastname</th>";
              echo "<th>Address</th>";
              echo "<th>Tel No.</th>";
              echo "</tr></thread>";
              echo "<tbody> ";
              echo '<script type="text/javascript">
                    function selectedUpdate(val){
                            record = val.split(",");
                            document.getElementById("fname1").value=record[1];
                            document.getElementById("lname1").value=record[2];
                            document.getElementById("address1").value=record[3];
                            document.getElementById("telNo1").value=record[4];
                            alert("wewewew");
                    }
                   </script>';
                            $sql = "SELECT * FROM ".$tbl." ".$where."";
                            $result = mysql_query($sql);			
                            $j=0;
                            while($rows=mysql_fetch_array($result)){
                                    echo '<tr>';
                                    $record[$j]='';
                                    for($i=0;$i<$size;$i++){
                                            echo '<td>'.$rows[$i].'</td>';					
                                            $record[$j].=$rows[$i].',';
                                    }
                                    echo '<td><input type="button" value="Select" id="btnSelect" name="btnSelect" onclick="selectedUpdate(\''.$record[$j++].'\')" /></td>';					
                                    echo '</tr>';
                            }
              echo "</tbody>";
              echo " </table>";
              echo "</div></div><br> ";
        }
   // }