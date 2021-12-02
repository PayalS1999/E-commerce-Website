<?php
session_start();
//destroy session
session_destroy();
//unset cookies
setcookie('seller_login', '', 0, "/");

header("Location: index.php");
?>