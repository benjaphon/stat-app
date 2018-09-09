<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $db = new database();
    $password = salt_pass($_POST['password']);
    $value_user = array(
        "firstname" => trim($_POST['firstname']),
        "lastname" => trim($_POST['lastname']),
        "username" => trim($_POST['username']),
        "password" => $password,
        "email" => trim($_POST['email']),
        "phone" => trim($_POST['phone']),
        "address" => trim($_POST['address']),
        "district" => trim($_POST['district']),
        "province" => trim($_POST['province']),
        "postcode" => trim($_POST['postcode']),
        "user_type" => trim($_POST['user_type'])
    );
    $query_user = $db->insert("users", $value_user);

    if ($query_user == TRUE) {
        header("location:" . $baseUrl . "/back/user");
    }
    mysql_close();
}