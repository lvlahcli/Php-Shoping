<?php
class Goodesclass {
    
    function Show(){
 
    
    $query = "SELECT goods.* , catagory.catname FROM goods LEFT JOIN catagory ON catagory.id = goods.cat ";
    $res= DB::getPdo()->query($query);
    
    DB::Checkdb($res, $res);
    
    return $res->fetchAll(PDO::FETCH_ASSOC);
    
}



}
