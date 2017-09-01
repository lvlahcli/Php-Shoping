<?php
session_start();
ob_start();
require  __DIR__ . "/generic.php";

spl_autoload_register(function($classname){
    
    require __DIR__ ."/$classname.php";
    //echo "$classname";
});

register_shutdown_function(function (){
    global $pageTitle , $footer ;
    $content = ob_get_clean();
    include __DIR__ . '/../template/layout.php';
    
});
