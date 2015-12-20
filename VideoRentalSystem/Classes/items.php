<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of games
 *
 * @author Administrator
 */
class Items {
    //put your code here
    private $list_no;
    private $item_no;
    private $title;
    private $genre;
    private $description;
    private $price;
    private $rental_period;
    private $status;
    private $type;
        function __construct($list_no, $item_no, $title, $genre, $description, $price, $rental_period, $status, $type) {
        $this->list_no = $list_no;
        $this->item_no = $item_no;
        $this->title = $title;
        $this->genre = $genre;
        $this->description = $description;
        $this->price = $price;
        $this->rental_period = $rental_period;
        $this->status = $status;
        $this->type = $type;
    }
    function getType() {
        return $this->type;
    }

    function setType($type) {
        $this->type = $type;
    }

        function getList_no() {
        return $this->list_no;
    }

    function setList_no($list_no) {
        $this->list_no = $list_no;
    }

        function getItem_no() {
        return $this->item_no;
    }

    function getTitle() {
        return $this->title;
    }

    function getGenre() {
        return $this->genre;
    }

    function getDescription() {
        return $this->description;
    }

    function getPrice() {
        return $this->price;
    }

    function getRental_period() {
        return $this->rental_period;
    }

    function getStatus() {
        return $this->status;
    }

    function setItem_no($item_no) {
        $this->item_no = $item_no;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setRental_period($rental_period) {
        $this->rental_period = $rental_period;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function insert()
    {
        $query123="INSERT INTO itemlist(list_no, item_no, title, genre, description, price, rental_period, status, type) VALUES('".$this->list_no."', '".$this->item_no."', '".$this->title."', '".$this->genre."', '".$this->description."', '".$this->price."', '".$this->rental_period."', '".$this->status."', '".$this->type."')";
        $result123 = mysql_query($query123);
        if($result123)
        {
            echo "<script>alert('Item added');</script>";
        }
        else
        {
            echo "<script>alert('Error in Saving');</script>";
//            echo  mysql_error();
        }
    }
    function update()
    {
        $upQuery= "UPDATE itemlist SET item_no='".$this->item_no."' title='".$this->title."', genre='".$this->genre."', description='".$this->description."', price='".$this->price."', rental_period='".$this->rental_period."', status='".$this->status."', type='".$this->type."' WHERE list_no=".$this->list_no."";
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

    
