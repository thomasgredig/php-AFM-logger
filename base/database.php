<?php
include "db.php";
date_default_timezone_set("America/Los_Angeles");

if (!isset($_SESSION["userID"])) { header('Refresh: 0; URL = login.php'); }

function getUserID() { return $_SESSION["userID"]; }
function isAdmin() { if (getUserID()<1000) return TRUE; else return FALSE; }
?>
