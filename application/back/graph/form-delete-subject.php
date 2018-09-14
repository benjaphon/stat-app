<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();
$query = $db->delete("subject", "id='{$_GET['id']}'");
if($query == TRUE){
    $db->delete("turnover", "subject_id='{$_GET['id']}'");
    header("location:" . $baseUrl . "/back/graph");
}else{
    echo "error";
}
