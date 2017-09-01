<?php

function isPost(){
    
    return filter_input(INPUT_SERVER, "REQUEST_METHOD")== "POST";
    
}

function redirect($url){
    
    header("Location:$url");
    exit();
    
}

function AddFlashMessage($message) {
    if (!isset($_SESSION['flash-messages'])) {
        $_SESSION['flash-messages'] = [];
    }
    $_SESSION['flash-messages'][] = $message;
}


function showFlashMessages() {
    if (isset($_SESSION['flash-messages'])) {
        echo "<ul>";
        foreach ($_SESSION['flash-messages'] as $message) {
            echo "<li>" . $message . "</li>";
        }
        unset($_SESSION['flash-messages']);
        echo "</ul>";
    }
}
