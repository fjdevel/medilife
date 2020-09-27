<?php 
include_once('./global.php');

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case $domain.'/' :
        if($_SESSION['auth']){
            require __DIR__ . '/view/dashboard.php';
        }else{
            require __DIR__ . '/view/home.php';
        }
        
        break;
    case $domain.'' :
        if($_SESSION['auth']){
            require __DIR__ . '/view/dashboard.php';
        }else{
            require __DIR__ . '/view/home.php';
        }
        break;
    case $domain.'/login' :
        if($_SESSION['auth']){
            require __DIR__ . '/view/dashboard.php';
        }else{
            require __DIR__ . '/view/login.php';
        }
        break;
    case $domain.'/dashboard' :
            require __DIR__ . '/view/dashboard.php';
            break;
    default:
        http_response_code(404);
        require __DIR__ . '/view/404.php';
        break;
}
?>  