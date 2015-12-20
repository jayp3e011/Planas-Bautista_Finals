<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer_accounts
 *
 * @author Administrator
 */
class Customer {
    //put your code here
    private $customer_id;
    private $first_name;
    private $last_name;
    private $address;
    private $tel_no;
    function __construct($customer_id, $first_name, $last_name, $address, $tel_no) {
        $this->customer_id = $customer_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->tel_no = $tel_no;
    }
    function getCustomer_id() {
        return $this->customer_id;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getAddress() {
        return $this->address;
    }

    function getTel_no() {
        return $this->tel_no;
    }

    function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setTel_no($tel_no) {
        $this->tel_no = $tel_no;
    }
    function insert()
    {
        $query="INSERT INTO `customer_accounts`(`customer_id`, `first_name`, `last_name`, `address`, `tel_no`) VALUES('".$this->customer_id."', '".$this->first_name."', '".$this->last_name."', '".$this->address."', '".$this->tel_no."')";
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
        $upQuery= "UPDATE customer_acccounts SET first_name='".$this->first_name."', last_name='".$this->last_name."', address='".$this->address."', tel_no='".$this->tel_no."' WHERE customer_id=".$this->customer_id."";
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
