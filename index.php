<?php

session_start();
/*
 * include file start
 */
require 'vendor/library/core.php';
require 'vendor/library/cons.php';
require 'vendor/library/database.php';
require 'vendor/library/security.php';
require 'vendor/library/thaidate.php';

$baseUrl = base_url();
$basePath = base_path();
$title = 'Stat App';

$onpage = isset($_GET['onpage']) ? $_GET['onpage'] : "back";
$url = isset($_GET['url']) ? $_GET['url'] : "home";
$a = isset($_GET['a']) ? $_GET['a'] : "index";

/*
 * logical programming
 */
if ($onpage == "back" AND $a != "login") {
    //Check Cookie 
    if(!isset($_COOKIE["member_id"])){
        //Check Session
        $security = new security();
        $security->check("admin");
    } else {
        //Load Data Once if use cookie
        if(!isset($_SESSION[_ss . 'levelaccess'])){

            $db = new database();
            $option_user = array(
                "table" => "users",
                "fields" => "id,username,user_type",
                "condition" => "id='{$_COOKIE["member_id"]}'"
            );
            $query_user = $db->select($option_user);
            $rows_user = $db->rows($query_user);
            if ($rows_user == 1) {
                //SET SESSION
                $rs_user = $db->get($query_user);
                $_SESSION[_ss . 'username'] = $rs_user['username'];
                $_SESSION[_ss . 'id'] = $rs_user['id'];
                $_SESSION[_ss . 'levelaccess'] = $rs_user['user_type'];
            }

        }
    }
}

if (file_exists("application/" . $onpage . "/" . $url . "/" . $a . ".php")) {
    require ("application/" . $onpage . "/" . $url . "/" . $a . ".php");
} else {
    header('location:' . $baseUrl);
}
