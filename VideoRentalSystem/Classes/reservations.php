<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reservations
 *
 * @author Administrator
 */
class reservations {
    //put your code here
    private $reservation_no;
    private $costumer_id;
    private $item_no;
    private $date;
    function __construct($reservation_no, $costumer_id, $item_no, $date) {
        $this->reservation_no = $reservation_no;
        $this->costumer_id = $costumer_id;
        $this->item_no = $item_no;
        $this->date = $date;
    }
    function getReservation_no() {
        return $this->reservation_no;
    }

    function getCostumer_id() {
        return $this->costumer_id;
    }

    function getItem_no() {
        return $this->item_no;
    }

    function getDate() {
        return $this->date;
    }

    function setReservation_no($reservation_no) {
        $this->reservation_no = $reservation_no;
        
    }

    function setCostumer_id($costumer_id) {
        $this->costumer_id = $costumer_id;
    }

    function setItem_no($item_no) {
        $this->item_no = $item_no;
    }

    function setDate($date) {
        $this->date = $date;
    }
    function connect($dBase, $server, $username, $password) {
       $conn = mysql_connect($server, $username, $password) OR DIE('Localhost connection error'.  mysql_error()); 
       mysql_select_db($dBase, $conn) OR DIE('Database connection error'.  mysql_error());
    }
    function insert()
    {
        $query="INSERT INTO reservations(reservation_no, costumer_id, item_no, date) VALUES('".$this->reservation_no."', '".$this->costumer_id."', '".$this->item_no."', '".$this->date."')";
        $result = mysql_query($query);
        if($result1)
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
        $upQuery= "UPDATE reservations SET costumer_id='".$this->costumer_id."', item_no='".$this->item_no."', date='".$this->date."' WHERE reservation_no=".$this->reservation_no."";
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

}
