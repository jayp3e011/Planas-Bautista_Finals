<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Administrator
 */
class USER {
    private $db;
	
    function __construct($DB_con)
    {
            $this->db = $DB_con;
    }
    function login($username, $password)
    {
        session_start();
        $log = "SELECT * FROM user_accounts WHERE username='$username' AND password='$password'";
        $result = mysql_query($log);
        //$row=  mysql_affected_rows($result);
        if ($result)
        {
            $auth = mysql_fetch_array($result);
            $_SESSION['username'] = $username;
            $_SESSION['user'] = $auth[4];
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    function is_loggedIn()
    {
        if(isset($_SESSION['user']))
        {
                return true;
        }
    }
    public function redirect($url)
    {
            header("Location: $url");
    }
    public function logout()
    {
            session_destroy();
            return true;
    }
}
?>
