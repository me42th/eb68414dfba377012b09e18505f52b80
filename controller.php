<?php

function do_register(){
    if($_POST['person']??false){
        unset($_POST['person']['password-confirm']);
        crud_create($_POST['person']);
        header("Location: /?page=login");
    } else {
        render_view('register');
    }
}

function do_login(){
    render_view('login');
}

function do_not_found(){
    http_response_code(404);
    render_view('not_found');
}