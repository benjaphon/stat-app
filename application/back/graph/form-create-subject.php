<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set('Asia/Bangkok');
    $db = new database();
    $values = array(
        "name" => trim($_POST['subject_name']),
        "chart_type" => trim($_POST['chart_type']),
        "description" => trim($_POST['description']),
        "created_by" => $_SESSION[_ss . 'id'],
        "modified_by" => $_SESSION[_ss . 'id'],
        "created_at" => date('Y-m-d H:i:s'),
        "modified_at" => date('Y-m-d H:i:s')
    );
    $query = $db->insert("subject", $values);

    if ($query) {
        header('location:'.$baseUrl.'/back/graph/update/'.$db->insert_id());
    }
}