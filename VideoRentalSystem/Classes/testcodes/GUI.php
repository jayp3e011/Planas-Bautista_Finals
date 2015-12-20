<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GUI
 *
 * @author Administrator
 */
//class GUI {
//    //put your code here
//    function __construct() {
//        
//    }
    function addInputTxt($name,$class, $label)
    {
        echo '<div class = "form-group">';
        echo '<label for ="'.$name.'" class="col-sm-1 control-label">'.$label.'</label>';
        echo '<div class="'.$class.'">';
        echo '<input type="text" class="form-control" name="'.$name.'" id="'.$name.'" placeholder="Enter '.$name.'">';
        echo '</div></div>';
    }
    function addButton($class, $name, $pos, $label)
    {
        echo '<div class="form-group">';
        echo '<div class="'.$pos.'">';
        echo '<button type="submit" name="'.$name.'" class="'.$class.'">'.$label.'</button>';
        echo '</div></div>';
    }

//}
