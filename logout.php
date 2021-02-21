<?php // logout by clearing session variable
   session_start();
   unset($_SESSION["userID"]);
   session_destroy();
   header('Refresh: 1; URL = login.php');
?>
