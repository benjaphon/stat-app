<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $db = new database();
    
    if($_GET['geo_id']<>0){
      $condition = "GEO_ID = {$_GET['geo_id']}";
    }else{
      $condition = "1=1";
    }
    
    $option = array(
      "table" => "provinces",
      "condition" => $condition
    );
    $query = $db->select($option);
    
    $json = [];
    while ($row = $db->get($query)) {
          $json[$row['PROVINCE_ID']] = $row['PROVINCE_NAME'];
    }

    echo json_encode($json);
}
