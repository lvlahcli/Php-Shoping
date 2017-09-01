<?php
require './include/config.php';

Userclass::islogin();

//echo '<pre>';
//var_dump($_SERVER);
//die;

$Show = new Goodesclass();
$Result = $Show->Show();



?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 
        
        <?php 
        //var_dump($_SESSION);
        
        showFlashMessages(); ?>
        <?php  if(Userclass::islogin()){ ?> <a href="Add.php">ADD</a>&nbsp;
        <a href="upload.php"> UPLOAD PHOTO </a>&nbsp;
        <a href="logout.php"> Logout </a>
        <?php }else { ?>
        <a href="login.php"> SignIN </a> &nbsp;
        <a href="signup.php"> SignUP </a>
        <?php } ?>
        
        <?php foreach ($Result as $value) {
            
            
     echo "<li> ({$value['name']})- ({$value['catname']}) <a href='edit.php?id={$value['id']}'>(Edit , Delete)</a> </li>";
            
        } ?>
        
    </body>
</html>
