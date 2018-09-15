<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $db = new database();
    $username = trim($_POST['username']);
    $condition = "username='{$username}'";
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $condition .= " AND id<>{$id}";
    }

    $value = array(
        "table" => "users",
        "condition" => $condition
    );
    $query = $db->select($value);

    if($db->rows($query) > 0){
        echo json_encode(array("status"=>false, "msg"=>"Username ซ้ำ"));
    } else {
        echo json_encode(array("status"=>true));
    }
    
    
}