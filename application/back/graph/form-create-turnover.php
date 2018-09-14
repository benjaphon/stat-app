<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set('Asia/Bangkok');
    $db = new database();
    $values = array(
        "subject_id" => $_POST['subject_id'],
        "geo_id" => $_POST['geography'],
        "province_id" => $_POST['province'],
        "operating_year" => trim($_POST['year']),
        "operating_budget" => $_POST['budget'],
        "created_by" => $_SESSION[_ss . 'id'],
        "modified_by" => $_SESSION[_ss . 'id'],
        "created_at" => date('Y-m-d H:i:s'),
        "modified_at" => date('Y-m-d H:i:s')
    );
    $query = $db->insert("turnover", $values);
    if($query){
        echo $db->insert_id();
    }

}