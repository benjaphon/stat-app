<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new database();

    if($_POST['geo_id']<>0){
        $select_geo = ", geo.GEO_NAME";
        $query_geo = "AND geo.GEO_ID = {$_POST['geo_id']} ";
        $group_geo = ", geo.GEO_ID";
    }else{
        $select_geo = "";
        $query_geo = "";
        $group_geo = "";
    }

    if($_POST['province_id']<>0){
        $select_pro = ", pro.PROVINCE_NAME";
        $query_pro = "AND pro.PROVINCE_ID = {$_POST['province_id']} ";
        $group_pro = ", pro.PROVINCE_ID";
    }else{
        $select_pro = "";
        $query_pro = "";
        $group_pro = "";
    }

    if(!empty($_POST['year'])){
        $select_year = ", turn.operating_year";
        $query_year = "AND turn.operating_year = {$_POST['year']} ";
        $group_year = ", turn.operating_year";
    }else{
        $select_year = "";
        $query_year = "";
        $group_year = "";
    }

    $query = "SELECT turn.operating_year, SUM(turn.operating_budget) AS SUM_RESULT_YEAR {$select_geo} {$select_pro} {$select_year} FROM subject ";
    $query .= "LEFT JOIN turnover AS turn ON turn.subject_id = subject.id ";
    $query .= "LEFT JOIN geography AS geo ON geo.GEO_ID = turn.geo_id ";
    $query .= "LEFT JOIN provinces AS pro ON pro.PROVINCE_ID = turn.province_id ";

    $query .= "WHERE subject_id = {$_POST['subject_id']} {$query_geo} {$query_pro} {$query_year} ";

    $query .= "GROUP BY subject.id, turn.operating_year {$group_geo} {$group_pro} {$group_year} ";
    
    $result = $db->query($query);
    
    $json = [];
    $json_x = [];
    $json_y = [];
    $x_name = 'operating_year';
    $y_name = 'SUM_RESULT_YEAR';

    

    while ($row = $db->get($result)) {
        array_push($json_x, $row['operating_year']);
        array_push($json_y, $row['SUM_RESULT_YEAR']);
    };
    $json[$x_name] = $json_x;
    $json[$y_name] = $json_y;
    echo json_encode($json);
}
