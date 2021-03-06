<?php
include('BdService.php');
include('./model/UserModel.php');
class UserController  
{
    private $con;
    public function __construct() {
        $this->con = new BdService();
    }
    public function obtenerUsuarioByEmail($email)
    {
        $user=null;
        $result = $this->con->pdo->query("SELECT * from usuario where email='".$email."';");
        $result= $result->FETCHALL(PDO::FETCH_ASSOC)[0];
        if(null!=$result){
            $user = new UserModel();
            $user->email = $result['email'];
            $user->pass = $result['pass'];
            $user->tipousuario = $result['tipousuario'];
            return $user;
        }
    }
    public function userCount()
    {
        $result = $this->con->pdo->query("SELECT COUNT(*) as count from usuario ;");
        $result= $result->FETCHALL(PDO::FETCH_ASSOC)[0];
        return $result;
    }
}
