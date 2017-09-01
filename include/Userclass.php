<?php

class Userclass {
    
    
    private $email , $password , $firstname , $lastname , $remember ;

    public function Setemail($email) {
        
        $this->email = $email;
        
    }
    public function Setpassword($password) {
        
        $this->password = $password;
        
    }
    
    
    
    public function Setfirstname($fisrtname) {
        
        $this->firstname = $fisrtname;
        
    }
    public function Setlastname($lastname) {
        
        $this->lastname = $lastname;
        
    }
    public function Remember($remember = FALSE) {
        
        $this->remember = $remember;
        
    }
            
    
    function autoHash($pass){
        global $salt;
        
        return sha1($pass . $salt);
    
        
    }
    
    static function islogin() {

        if (isset($_SESSION['user'])) {

            return TRUE;
        }
        $c = new userclass();
        return $c->isLoginByCoockie();
    }

    function getloginuser() {

        return $_SESSION['user'];
    }

    static function checkLogin() {
    if (!isLogin()) {
        $_SESSION['ref_address'] = filter_input(INPUT_SERVER, 'REQUEST_URI');
        redirect("Signpage.php");
    }
}
            
    
    function isLoginByCoockie(){
        
        $userid = filter_input(INPUT_COOKIE, "user_id" , FILTER_SANITIZE_NUMBER_INT);
        $secret = filter_input(INPUT_COOKIE, "secret");
        
//        var_dump($userid);
//        var_dump($secret);
//        die();
        
        if (empty($userid) || empty($secret)){
            return FALSE;
        }
        
        $user = $this->GetUser($userid);
        
//        var_dump($user['password']);
//        die;
        
        if($user == FALSE){
          
            return FALSE;
          
        }
        if($secret == $this->autoHash($user['password'])){
            $_SESSION['user'] = $user;
            return TRUE;
        }
        return FALSE;
        
        
    }
    
    function GetUser($id) {
       
        $query = "SELECT * FROM users WHERE id=?";
        $res = DB::getPdo()->prepare($query);
        $A = $res->execute([$id]);
        DB::Checkdb($res, $A);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    function login(){
    
    $query = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = DB::getPdo()->prepare($query);
    $res = $stmt->execute([
        ":email" => $this->email ,
        "password" => $this->password 
            ]);
            DB::Checkdb($res, $stmt);
    if($stmt->rowCount() == 1){ 
        $user = $stmt->fetch();
        $_SESSION['user'] = $user;
       // AddFlashMessage("SALAM SESION");
        if($this->remember){   
           $id = $_SESSION['user']['id'];
           $secret =   $this->autoHash($_SESSION['user']['password']);
           setcookie("user_id", $id, time() + 3600 * 24 * 365 , "/" );
           setcookie("secret", $secret, time() + 3600 * 24 *365 , "/");
           //var_dump($_COOKIE);
          // die;
           //AddFlashMessage(var_dump($_COOKIE));
        }
    return TRUE;} else {  return FALSE;   }             
}

}
