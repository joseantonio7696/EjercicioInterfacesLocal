<?php
session_start();
session_unset();
session_destroy();
$url = "../";
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);
exit(); 
?>