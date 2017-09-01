<?php

class DB {
    private static $instance ;
    private $databaseName = "purches";
    private $databaseUserName = "root";
    private $databasePassword = "";
    private $pdo ;




    private function __construct() {
        
        $this->pdo = new PDO("mysql:dbname=$this->databaseName", $this->databaseUserName , $this->databasePassword);
        
        
    }
    
    /**
     * 
     * @return \DB
     */
    
    static public function getInstance(){
        
        if(self::$instance == NULL){
            
            self::$instance = new DB();
            
        }
        
        return self::$instance;
    }
    
    /**
     * 
     * @return \PDO
     */
    
    static public function getPdo(){
        
        return self::getInstance()->pdo ;
        
    }
    
    
    static public function Checkdb($res , $xyz){
    
    if($res == FALSE){
        
        var_dump($xyz->errorInfo());
        exit();
        
    }
    
    
    
}
    
}
