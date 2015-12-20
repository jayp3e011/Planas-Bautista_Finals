<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Status
 *
 * @author Administrator
 */
class Status {
     private $db;
    function __construct($DB_con)
    {
            $this->db = $DB_con;
    }
    function viewStatus($tbl, $status, $rep)
    {
            $tbl = "dvd";
            $where =  'WHERE status='.$status.'';
            if(isset($_POST['search']))
            {
                $tbl = $_POST['type'];
                $txtSearch=$_POST['txtSearch'];
                $where= 'WHERE title LIKE "%'.$txtSearch.'%" OR item_no LIKE "%'.$txtSearch.'%" AND status='.$status.'';
            }
        echo '<script type="text/javascript">
        function edit_id(val)
        {
            record = val.split(",");
            document.getElementById("title").value=record[1];
            alert(record[1]);
        }
        </script>';
        echo "<div class ='form-group table-responsive'>";
          echo "<table class ='table'>";        
          echo "<caption>Item LIst</caption>";
          echo "<thread><tr>";
          echo "<th>Item No.</th>";
          echo "<th>Title</th>";
          echo "<th>Genre</th>";
          echo "<th>Description</th>";
          echo "<th>Price</th>";
          echo "<th>Rental Period</th>";
          echo "<th>Status</th>";
          echo '<th>'.$rep.'</th>';
          echo "</tr></thread>";
          echo "<tbody> ";
          $j=0;
          $stat= "SELECT * FROM ".$tbl." ".$where."";
            $result = mysql_query($stat);
          while ($rowS=mysql_fetch_array($result,MYSQL_NUM)) {
              //$cos="SELECT * FROM costumer_accounts WHERE costumer_id='".."'";
              $record[$j]='';
              echo '<tr>';
            for($i=0;$i<7;$i++){
                    echo '<td>'.$rowS[$i].'</td>';
                    $record[$j].=$rowS[$i].',';
            }
           // echo '<tr><td>'.$rowS[0].'</td><td>'.$rowS[1].'</td><td>'.$rowS[2].'</td><td>'.$rowS[3].'</td><td>'.$rowS[4].'</td><td>'.$rowS[5].'</td><td>'.$rowS[6].'</td><td><input type="button" value="Select" id="btnSelect" name="btnSelect" onclick="edit_id(\''.$record[$j++].'\')" /></td></tr>';  
            echo '<td><input type="button" value="Select" id="btnSelect" name="btnSelect" onclick="edit_id(\''.$record[$j++].'\')" /></td></tr>';
          }
          echo "</tbody>";
          echo " </table>";
          echo "</div><br> ";
    }
    function changeStatus($tbl) 
    {
        if(isset($_GET['return']))
        {
             $itemNo=$_GET['return'];
             $status="availabe";
        }
        if(isset($_GET['rent']))
        {
             $itemNo=$_GET['rent'];
             $status="borrowed";
        }
        $change = "UPDATE FROM $tbl SET status='$status'WHERE item_no='$itemNo'";
        $result = mysql_query($change);
    }
    function searchStatus($tbl, $itemNo, $status)
    {
        $stat= "SELECT * FROM $tbl WHERE item_no='$itemNo' AND status='$status'";
        $result = mysql_query($stat);
        return $result;
    }
}
