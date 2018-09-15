<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $db = new database();
    $password = salt_pass($_POST['new_password']);
    $value = array(
        "username" => trim($_POST['username']),
        "password" => $password,
        "user_type" => trim($_POST['user_type'])
    );
    $query = $db->update("users", $value, "id='{$_POST['id']}'");
    if ($query) {
        echo json_encode(array("status"=>true));
    }else{
        echo json_encode(array("status"=>false, "msg"=>"บันทึกไม่สำเร็จ"));
    }
}