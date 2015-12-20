<?php
class inventory {
    //put your code here
    private $tbl;
    private $item_no;
    private $title;
    private $status;
    function __construct($tbl, $item_no, $title, $status) {
        $this->tbl = $tbl;
        $this->item_no = $item_no;
        $this->title = $title;
        $this->status = $status;
    }
    function getTbl() {
        return $this->tbl;
    }

    function getItem_no() {
        return $this->item_no;
    }

    function getTitle() {
        return $this->title;
    }

    function getStatus() {
        return $this->status;
    }

    function setTbl($tbl) {
        $this->tbl = $tbl;
    }

    function setItem_no($item_no) {
        $this->item_no = $item_no;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        function insert()
    {
        $query="INSERT INTO ".$this->tbl."(item_no, title, status) VALUES('".$this->item_no."', '".$this->title."', '".$this->status."')";
        $result = mysql_query($query);
        if($result)
        {
            echo "<script>alert('Item added');</script>";
        }
        else
        {
            echo "<script>alert('Error in Saving');</script>";
        }
    }
    function update()
    {
        $upQuery= "UPDATE ".$this->tbl." SET title='".$this->title."', genre='".$this->genre."', description='".$this->description."', price='".$this->price."', rental_period='".$this->rental_period."', status='".$this->status."' WHERE item_no=".$this->item_no."";
        $update = mysql_query($upQuery);
        if($update)
        {
            echo "<script>alert('Item updated');</script>";
        }
        else
        {
            echo "<script>alert('Error in Updating');</script>";
        }
    }
    function read($search)
    {
          echo "<div class ='form-group table-responsive col-sm-6'>";
          echo "<table class ='table'>";        
          echo "<caption>Student LIst</caption>";
          echo "<thread><tr>";
          echo "<th>Item No</th>";
          echo "<th>Title</th>";
          echo "<th>Genre</th>";
          echo "<th>Description</th>";
          echo "<th>Price</th>";
          echo "<th>Rental Period</th>";
          echo "<th>Status</th>";
          echo "</tr></thread>";
          echo "<tbody> ";
          echo '
				<script>
					function selectedUpdate(val){
						record = val.split(",");
						document.getElementById("itemNo").value=record[0];
						document.getElementById("title").value=record[1];
						document.getElementById("genre").value=record[2];
                                                document.getElementById("description").value=record[3];
                                                document.getElementById("price").value=record[4];
                                                document.getElementById("rentalPeriod").value=record[5];
                                                document.getElementById("status").value=record[6];
					}
				</script>
			';
			$sql = "SELECT * FROM dvd WHERE item_no='".$search."'";
			$result = mysql_query($sql);			
			$j=0;
			while($rows=mysql_fetch_array($result)){
				echo '<tr>';
				$record[$j]='';
				for($i=0;$i<$this->propertySize;$i++){
					echo '<td>'.$rows[$i].'</td>';					
					$record[$j].=$rows[$i].',';
				}
				echo '<td><input type="button" value="Select" id="btnSelect" name="btnSelect" onclick="selectedUpdate(\''.$record[$j++].'\')" /></td>';					
				echo '</tr>';
			}
          echo "</tbody>";
          echo " </table>";
          echo "</div><br> ";
    }

}
