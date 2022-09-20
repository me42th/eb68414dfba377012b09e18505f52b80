<?php

function do_register(){
    if($_POST['person']??false){
        register_post();
    } else {
        register_get();
    }
}

function register_get(){
    render_view('register');
}

function register_post(){
    $validation_errors = validate_register($_POST['person']);
    if(count($validation_errors) == 0){
        unset($_POST['person']['password-confirm']);
        $_POST['person']['mail_validation'] = false;
        crud_create($_POST['person']);
        $email = $_POST['person']['email'];
        $url = APP_URL."?page=mail-validation&token=";
        $url .= ssl_crypt($email);
        send_mail($email,"Ative a conta",$url);
        header("Location: /?page=login&from=register");
    } else {
        $messages = [
            'validation_errors' => $validation_errors
        ];
        render_view('register', $messages);
    }
}

function do_login(){
    $messages = [];
    switch(@$_GET['from']){
        case 'register':
            $messages['success'] = "Você ainda precisa confirmar o email!";
        break;
    }
    render_view('login',$messages);
}

function do_validation(){
    echo "wip";
}

function do_not_found(){
    http_response_code(404);
    render_view('not_found');
}