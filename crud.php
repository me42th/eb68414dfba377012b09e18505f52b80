<?php

function crud_create($user){
    $data = file_get_contents(DATA_LOCATION);
    $data = json_decode($data);
    $data[] = $user;
    $data = json_encode($data);
    file_put_contents(DATA_LOCATION,$data);
}

function crud_restore($email){
    $data = file_get_contents(DATA_LOCATION);
    $data = json_decode($data);
    foreach($data as $item){
        if($item->email === $email){
            return $item;
        }
    }
    return false;
}