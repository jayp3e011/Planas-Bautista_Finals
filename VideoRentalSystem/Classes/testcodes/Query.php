<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Query
 *
 * @author Administrator
 */
class Query {
    private $classname;
		private $propertySize;
		private $propertyName;
		private $connection;
		
		public function __construct($propertySize,$classname,$propertyName){
			$this->propertySize = $propertySize;
			$this->propertyName = split(',',$propertyName);
			$this->classname = $classname;
		}
		
		public function mysqlConnect($host,$user,$pass,$database){
			$this->connection = @mysql_connect($host,$user,$pass)or die('Unable to connect to database.');
			mysql_select_db($database);
		}
		
		public function create(){
			if(isset($_GET['btnCreate'])){
				$where=' WHERE ';
				$values = ' VALUES(';
				$error=false;
				for($i=0;$i<$this->propertySize;$i++){				
					if(strlen($_GET['txt'.$this->propertyName[$i]])==0){$error=true;break;}
					$where.=strtoupper($this->propertyName[$i]).' = "'.$_GET['txt'.$this->propertyName[$i]].'" ';
					$values.='"'.strtoupper($_GET['txt'.$this->propertyName[$i]]).'"';
					if($i<($this->propertySize-1)){$where.= ' OR ';$values.= ',';}
				}
				
				if($error){
					echo 'Please fill up the input fields properly!';
				}
				else
				{
                                    $sql =  'INSERT INTO '.$this->classname.' '.$values;
                                    mysql_query($sql);						
                                    echo 'One record created.';			
				}
			}
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get" role="form" class="form-horizontal" >';
			echo '<fieldset>';
			for($i=0;$i<$this->propertySize;$i++){
                            echo '<div class="form-group">';
                            echo '<div class="col-sm-4">';
                            echo '<label for="'.$this->propertyName[$i].'">'.strtoupper($this->propertyName[$i]).'</label>';
                            echo '<input type="text" class = "form-control" placeholder = "Text input" id="txt'.$this->propertyName[$i].'" name="txt'.$this->propertyName[$i].'" />';
                            echo '</div>';
                            echo '</div>';
			}
                        echo '<div class="form-group">';
                        echo '<div class="col-sm-offset-2 col-sm-6">';
                        echo '<button type="submit" class="btn btn-success" id="btnCreate" name="btnCreate">Create</button></div></div>';
                        echo '</fieldset>';
			echo '</form>';
                        echo '
				<script>
                                     $(document).ready(function () {
                                    document.getElementById("txtitem_no").value=null;
                                    document.getElementById("txtitem_no").attrib("readonly", readonly);}
				</script>';
			
		}
		
		public function read(){
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get" role="form" class="form-inline">';
                        echo '<fieldset>';
                        echo '<div class = "form-group">';
                        echo '<label for = "sr-only">Read Key Search</label>';
                       // echo '<div class="col-sm-4">';
			echo '<input type="text" class = "form-control" placeholder = "Text input" id="txtReadKey" name="txtReadKey" />';
			//echo '</div>';
                        echo '</div>';
                       // echo '<div class = "form-group">';
                     //   echo '<div class="col-sm-offset-1 col-sm-4">';
                        echo '<button type="submit" class="btn btn-success" id="btnRead" name="btnRead">Read</button>';
			echo '</fieldset>';
//			echo '<div class="col-sm-12">';
			echo '<div table-responsive"><table class="table-hover table-bordered">';
			echo '<tr><thead>';
			$where = ' ';
			if(isset($_GET['txtReadKey']))$where.=' WHERE ';
			for($i=0;$i<$this->propertySize;$i++){				
				echo '<th>'.strtoupper($this->propertyName[$i]).'</th>';								
				if(isset($_GET['txtReadKey'])){
					$where.=strtoupper($this->propertyName[$i]).' like "%'.$_GET['txtReadKey'].'%" ';
					if($i<($this->propertySize-1))$where.= ' OR ';
				}
			}				
			echo '</tr></thead><tbody>';
			
			$sql = 'SELECT * FROM '.$this->classname.' '.$where;
			$result = mysql_query($sql);
			while($rows=mysql_fetch_array($result)){
				echo '<tr>';
				for($i=0;$i<$this->propertySize;$i++){
					echo '<td>'.$rows[$i].'</td>';
				}
				echo '</tr>';
			}
			
			echo '</tbody></table></div>';
		}

		public function update(){
                        echo '<div class="col-sm-12 col-mid-12 col-lg-12">';
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get" role="form" class="form-inline">';
			echo '<fieldset>';
                        echo '<div class="form-group">';
//                        echo '<div class="col-sm-4">';
                        echo '<label class="sr-only">Update Key Search</label>';
                        echo '<input type="text" class="form-control" id="txtUpdateKey" name="txtUpdateKey placeholder="Enter Text">';
                        echo '</div>';
//                        echo '<div class="form-group">';
//                        echo '<div class="col-sm-offset-1 col-sm-6">';
                        echo '<button type="submit" id="btnUpdate" name="btnUpdate" class="btn btn-info">Search</button>';
//                        echo ' </div></div>';
                        echo '</fieldset>';			
			echo '</form>';

			if(isset($_GET['btnSaveUpdate'])){
				$set = ' SET ';
				$where = ' WHERE '.strtoupper($this->propertyName[0]).'="'.$_GET['txtUpdate0'].'"';
				for($i=1;$i<$this->propertySize;$i++){
					$set.=' '.strtoupper($this->propertyName[$i]).'="'.$_GET['txtUpdate'.$i].'"';
					if($i<($this->propertySize-1))$set.= ',';
				}
				$sql = 'UPDATE '.$this->classname.' '.$set.' '.$where;
				mysql_query($sql);
				//echo $sql;
				echo 'Record Updated.';
			}			
//                        echo '<div class="col-sm-12">';
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get" role="form" class="form-horizontal" >';
			echo '<fieldset>';
			for($i=0;$i<$this->propertySize;$i++){
                            echo '<div class="form-group">';
                            
                            echo '<div class="col-sm-4">';
                            echo '<label for="password">Update '.strtoupper($this->propertyName[$i]).'</label>';
                            echo '<input type="text" class="form-control" id="txtUpdate'.$i.'" name="txtUpdate'.$i.'" placeholder="Enter Text">';
                            echo '</div></div>';
			}
                        echo '<div class="form-group">';
                        echo '<div class="col-sm-offset-2 col-sm-6">';
                        echo '<button type="submit" id="btnSaveUpdate" name="btnSaveUpdate" class="btn btn-info">Update</button>';
                        echo ' </div></div>';
                        echo '</fieldset>';
			echo '</form>';
//                        echo '<div class="col-sm-12">';
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get">';
			echo '<div table-responsive"><table class="table-hover table-bordered">';
			echo '<thead><tr>';
			$where = ' ';
			if(isset($_GET['txtUpdateKey']))$where.=' WHERE ';
			for($i=0;$i<$this->propertySize;$i++){				
				echo '<th>'.strtoupper($this->propertyName[$i]).'</th>';								
				if(isset($_GET['txtUpdateKey'])){
					$where.=strtoupper($this->propertyName[$i]).' like "%'.$_GET['txtUpdateKey'].'%" ';
					if($i<($this->propertySize-1))$where.= ' OR ';
				}
			}				
			echo '<th>ACTION</th>';				
			echo '</tr></thead><tbody>';			
			echo '
				<script>
					function selectedUpdate(val){
						record = val.split(",");
						document.getElementById("txtUpdate0").value=record[0];
						document.getElementById("txtUpdate1").value=record[1];
						document.getElementById("txtUpdate2").value=record[2];
                                                document.getElementById("txtUpdate3").value=record[3];
                                                document.getElementById("txtUpdate4").value=record[4];
						document.getElementById("txtUpdate5").value=record[5];
						document.getElementById("txtUpdate6").value=record[6];
					}
				</script>
			';
			$sql = 'SELECT * FROM '.$this->classname.' '.$where;
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
			
			echo '</tbody></table></div>';
			echo '</form>';
                        echo '</div>';
		}
		
		public function delete(){	
                        echo '<div class="col-sm-12 col-mid-12 col-lg-12">';
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get" role="form" class="form-inline">';
			echo '<fieldset>';
                        echo '<div class="form-group">';
                      //  echo '<div class="col-sm-4">';
                        echo '<label for="password">Delete Key Search</label>';
                        echo '<input type="text" class="form-control" id="txtDeleteKey" name="txtDeleteKey placeholder="Enter Text">';
                        echo '</div>';
                   //     echo '<div class="form-group">';
                     //   echo '<div class="col-sm-offset-2 col-sm-6">';
                        echo '<button type="submit" id="btnDelete" name="btnDelete" class="btn btn-info">Search</button>';
                       // echo ' </div></div>';
                        echo '</fieldset>';			
			echo '</form>';
			if(isset($_GET['btnSaveDelete'])){				
				$where = ' WHERE '.strtoupper($this->propertyName[0]).'="'.$_GET['txtDelete0'].'"';				
				$sql = 'DELETE FROM '.$this->classname.' '.$where;
				mysql_query($sql);
				//echo $sql;
				echo 'Record Deleted.';
			}			
//                        echo '<div class="col-sm-12">';
                        echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get" role="form" class="form-horizontal" >';
			echo '<fieldset>';
			for($i=0;$i<$this->propertySize;$i++){
                            echo '<div class="form-group">';
                             echo '<div class="col-sm-4">';
                            echo '<label for="password">Update '.strtoupper($this->propertyName[$i]).'</label>';
                            echo '<input type="text" class="form-control" id="txtDelete'.$i.'" name="txtDelete'.$i.'" placeholder="Enter Text">';
                            echo '</div></div>';
			}
                        echo '<div class="form-group">';
                        echo '<div class="col-sm-offset-2 col-sm-6">';
                        echo '<button type="submit" id="btnSaveDelete" name="btnSaveDelete" class="btn btn-info">Delete</button>';
                        echo ' </div></div>';
                        echo '</fieldset>';
			echo '</form>';
//                        echo '<div class="col-sm-12">';
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get">';
                        echo '<div class="table-responsive">';
			echo '<table class="table-hover table-bordered">';
			echo '<thead><tr>';
			$where = ' ';
			if(isset($_GET['txtDeleteKey']))$where.=' WHERE ';
			for($i=0;$i<$this->propertySize;$i++){				
				echo '<th>'.strtoupper($this->propertyName[$i]).'</th>';								
				if(isset($_GET['txtDeleteKey'])){
					$where.=strtoupper($this->propertyName[$i]).' like "%'.$_GET['txtDeleteKey'].'%" ';
					if($i<($this->propertySize-1))$where.= ' OR ';
				}
			}				
			echo '<th>ACTION</th>';				
			echo '</tr></thead><tbody>';			
			echo '
				<script>
					function selectedDelete(val){
						record = val.split(",");
						document.getElementById("txtDelete0").value=record[0];
						document.getElementById("txtDelete1").value=record[1];
						document.getElementById("txtDelete2").value=record[2];
                                                document.getElementById("txtDelete3").value=record[3];
                                                document.getElementById("txtDelete4").value=record[4];
						document.getElementById("txtDelete5").value=record[5];
                                                document.getElementById("txtDelete6").value=record[6];
					}
				</script>
			';
			$sql = 'SELECT * FROM '.$this->classname.' '.$where;
			$result = mysql_query($sql);			
			$j=0;
			while($rows=mysql_fetch_array($result)){
				echo '<tr>';
				$record[$j]='';
				for($i=0;$i<$this->propertySize;$i++){
					echo '<td>'.$rows[$i].'</td>';					
					$record[$j].=$rows[$i].',';
				}
				echo '<td><input readonly type="button" value="Select" id="btnSelect" name="btnSelect" onclick="selectedDelete(\''.$record[$j++].'\')" /></td>';					
				echo '</tr>';
			}
			
			echo '</tbody></table></div>';
			echo '</form>';
                        echo '</div>';
		}		
}
