<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new database();
    $password = salt_pass($_POST['password']);
    $option_user = array(
        "table" => "users",
        "fields" => "id,username,user_type",
        "condition" => "username='{$_POST['username']}' AND password='{$password}'"
    );
    $query_user = $db->select($option_user);
    $rows_user = $db->rows($query_user);
    if ($rows_user == 1) {

        //SET SESSION
        $rs_user = $db->get($query_user);
        $_SESSION[_ss . 'username'] = $rs_user['username'];
        $_SESSION[_ss . 'id'] = $rs_user['id'];
        $_SESSION[_ss . 'levelaccess'] = $rs_user['user_type'];

        //SET COOKIE INCASE REMEMBER CHECKED
        if(!empty($_POST["remember"])) {
            setcookie("member_id", $rs_user["id"], time() + (86400 * 30), "/");
        } else {
            if(isset($_COOKIE["member_id"])) {
                setcookie("member_id", "", time() - 3600, "/");
            }
        }

        header('location:'.$baseUrl.'/back/home/index');
    }else{
        header('location:'.$baseUrl.'/back/user/login');
    }

}