<?php 
//require 'config.php';
//require 'fu.php';
require './include/config.php';


//var_dump($_COOKIE['user_id']);
//die;


    if (isset($_SESSION['user'])) {

        unset($_SESSION['user']);
    }
   
    if (isset($_COOKIE['user_id'])) {
    unset($_COOKIE['user_id']);
    unset($_COOKIE['secret']);
    setcookie('user_id', null, -1, '/');
    setcookie('secret', null, -1, '/');
    }
//    return true;
//} else {
//    return false;
//}
    
    redirect("index.php");