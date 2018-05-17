<?php


$db_host = "localhost";
$db_name = "bacarodb";
$db_user = "bacarodb_www";
$db_pass = "VSN9NKkQdb9jaBZZ";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}