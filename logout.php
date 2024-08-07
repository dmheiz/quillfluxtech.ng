<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: launching.php");
exit;
