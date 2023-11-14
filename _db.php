<?php
session_start();
include("config.php");

define("DB_USERNAME", $db_user);
define("DB_PASSWORD", $db_pass);
define("DB_DATABASE", $db_name);
$db = mysqli_connect("localhost", DB_USERNAME, DB_PASSWORD, DB_DATABASE);
