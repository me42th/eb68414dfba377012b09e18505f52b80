<?php
$page = $_GET['page']??'login';
switch($page){
    case 'login':
        do_login();
    break;
    case 'register':
        do_register();
    break;
    case 'mail-validation':
        do_validation();
    break;
    default:
        do_not_found();
    break;
}