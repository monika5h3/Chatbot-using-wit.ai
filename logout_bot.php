<?php
require_once("database/config.php");
require_once "database/functions.php";
session_start();
session_unset();
session_destroy();
header("location:login_bot.php");

?>