<?php

function guest_routes(){
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
}

function auth_routes(){
    $page = $_GET['page']??'home';
    switch($page){
        case 'home':
            do_home();
        break;
        default:
            do_not_found();
        break;
    }
}