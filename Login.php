<?php

require './include/config.php';

$email = filter_input(INPUT_POST, "user");
$password = filter_input( INPUT_POST , "pass");
$remember =(int)filter_input(INPUT_POST, "rem");

if (IsPost()){

    
    $log = new userclass();
    $log->Setemail($email);
    $log->Setpassword($password);
    $log->Remember($remember);
    if($log->login()){
        
        if (isset($_SESSION['ref_address'])){
            redirect($_SESSION['ref_address']);  
            }else{
            redirect("index.php");}
        
        
    } else {
        
        $message = "EMAIL OR PASSWORD IS NOT Correct";
        AddFlashMessage($message);
        
    }   
}
?>



<html>
 <head>
    <body>
        
        <?php showFlashMessages(); ?>
        <form method="POST">
            EMAIL:<input type="text" name="user"><br>
            Password:<input type="text" name="pass"><br>
            Remember:<input type="checkbox" name="rem" value=1><br>
            <input type="submit" value="LOG IN">
            
            
        </form>
    </body>        
</head>
</html>
