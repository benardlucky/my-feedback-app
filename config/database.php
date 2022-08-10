<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'benard');
define('DB_PASS', '123456');
define('DB_NAME', 'feedback_app');

//create a connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//check connection
if($conn->connect_error){
    die('connection fail ' . $conn->connect_error);
}
// echo connected succefully?