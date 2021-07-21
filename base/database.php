<?php
include "db.php";


# check user is logged in
if (!isset($_SESSION["userID"])) { header('Refresh: 0; URL = login.php'); exit;  }

$MSG_AFMheader = "Atomic Force Microscopy Logging";
?>
