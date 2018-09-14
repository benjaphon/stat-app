<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();
$query = $db->delete("turnover", "id='{$_GET['id']}'");

