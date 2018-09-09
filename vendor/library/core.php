<?php

function base_url() {
    return "http://borbaimai.thddns.net:5530/4F2OMJUW";
}

function base_path() {
    return $_SERVER['DOCUMENT_ROOT'] . "/4F2OMJUW";
}

function salt_pass($pass) {
    return md5("borbaimaisoft" . $pass);
}
