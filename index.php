<?php 
include_once('./global.php');
if(!isset($_SESSION['auth'])&&!isset($_SESSION)){
    session_start();
    $_SESSION['auth'] = false;
}
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case $domain.'/' :
            require __DIR__ . '/view/home.php';
        break;
    case $domain.'' :
            require __DIR__ . '/view/home.php';
        break;
    case $domain.'/login' :
        if(!isset($_SESSION['auth'])&&!isset($_SESSION)&&$_SESSION['auth']){
            require __DIR__ . '/view/dashboard.php';
        }else{
            require __DIR__ . '/view/login.php';
        }
        break;
    case $domain.'/dashboard' :
        if($_SESSION['auth']){
            require __DIR__ . '/view/dashboard.php';
        }else{
            require __DIR__ . '/view/login.php';
        }
            break;
    case $domain.'/cerrarSesion' :
            require __DIR__ . '/view/home.php';
            session_destroy();
            break;
    default:
        http_response_code(404);
        require __DIR__ . '/view/404.php';
        break;
}
?>  