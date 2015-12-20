<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rentals
 *
 * @author Administrator
 */
class rentals {
    //put your code here
    private $transaction_no;
    private $item_no;
    private $title;
    private $customer_id;
    private $borrow_date;
    private $return_date;
    function __construct($transaction_no, $customer_id,  $title, $item_no, $return_date, $borrow_date) {
        $this->transaction_no = $transaction_no;
        $this->item_no = $item_no;
        $this->title = $title;
        $this->customer_id = $customer_id;
        $this->borrow_date = $borrow_date;
        $this->return_date = $return_date;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = $title;
    }

        function getTransaction_no() {
        return $this->transaction_no;
    }

    function getCustomer_id() {
        return $this->customer_id;
    }

    function getItem_no() {
        return $this->item_no;
    }

    function getBorrow_date() {
        return $this->borrow_date;
    }

    function getReturn_date() {
        return $this->return_date;
    }

    function setTransaction_no($transaction_no) {
        $this->transaction_no = $transaction_no;
    }

    function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

    function setItem_no($item_no) {
        $this->item_no = $item_no;
    }

    function setBorrow_date($borrow_date) {
        $this->borrow_date = $borrow_date;
    }

    function setReturn_date($return_date) {
        $this->return_date = $return_date;
    }
    function insert()
    {
        $query="INSERT INTO `rentals`(`transaction_no`, `costumer_id`, `title`, `item_no`, `borrow_date`, `return_date`) VALUES('".$this->transaction_no."', '".$this->customer_id."', '".$this->title."', '".$this->item_no."', '".$this->borrow_date."', '".$this->return_date."')";
        $result = mysql_query($query);
        $up = "UPDATE itemlist SET status='borrowed' WHERE list_no='".$this->item_no."'";
        $resup = mysql_query($up);
        if($result && $resup)
        {
            echo "<script>alert('Item rented');</script>";
        }
        else
        {
            echo "<script>alert('Error in Saving');</script>";
//            echo mysql_error();
        }
    }
    function update()
    {
        $upQuery= "UPDATE rentals SET customer_id='".$this->customer_id."', item_no='".$this->item_no."', borrow_date='".$this->borrow_date."', return_date='".$this->return_date."' WHERE transaction_no=".$this->transaction_no."";
        $update = mysql_query($upQuery);
        if($update)
        {
            echo "<script>alert('Item returned');</script>";
        }
        else
        {
            echo "<script>alert('Error in Updating');</script>";
        }
    }

}