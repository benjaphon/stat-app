<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set('Asia/Bangkok');
    $db = new database();
    $values = array(
        "name" => trim($_POST['subject_name']),
        "chart_type" => trim($_POST['chart_type']),
        "modified_by" => $_SESSION[_ss . 'id'],
        "modified_at" => date('Y-m-d H:i:s')
    );
    $query = $db->update("subject", $values, "id={$_POST['id']}");

    if ($query) {
        header('location:'.$baseUrl.'/back/graph/update/'.$_POST['id']);
    }
}