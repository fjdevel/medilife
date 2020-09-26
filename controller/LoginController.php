<?php
    include_once('UserController.php');
    class LoginController{
        const HASH = PASSWORD_BCRYPT; 
        const COST = 12;
        public function autenticar($email,$pass)
        {
            $controller = new UserController();
            $response =$controller->obtenerUsuarioByEmail($email);
            $passw = $response->pass;
            if($response=!null){
                if(password_verify($pass,$passw)){
                     return true;
                }
            }
        }
    }
?>