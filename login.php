<?php
	include "base/db.php";
  $errorMsg = '';

  if (isset($_POST['username']) && !empty($_POST['pwd'])) {
		$name = $_POST['username'];

		// find user in DB
		$query = "SELECT * FROM user WHERE name='" . $name . "'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		if ($result) {
				$IP = $_SERVER['REMOTE_ADDR'];
				if ($row = $result->fetch_assoc()) {
					$pwdCorrect = FALSE;
					if (password_verify($_POST['pwd'], $row['pwd'])) {
						$pwdCorrect = TRUE;
					}
					if ($pwdCorrect) {
						$userID = $row['userID'];
						$_SESSION["userID"] = $userID;
						$_SESSION["name"] = $row['firstName'] . " " . $row['lastName'];
						$useragent=$_SERVER['HTTP_USER_AGENT'];
						$query = "INSERT INTO `user_log` (`userID`, `IP`, `type`, `info`, `date_created`) " .
									"VALUES ( $userID, '$IP', 0, '$useragent', CURRENT_TIMESTAMP);";
						$mysqli->query($query) or die($mysqli->error.__LINE__);
						header('Refresh: 0; URL = index.php');
					} else {
						$errorMsg = 'Cannot verify credentials. Username and password are case-sensitive.';

						$query = "INSERT INTO `user_log` (`userID`, `IP`, `type`, `info`, `date_created`) ".
									"VALUES ('0', '$IP', '2', '$name', CURRENT_TIMESTAMP);";
						$mysqli->query($query) or die($mysqli->error.__LINE__);
					}
				} else {
					$errorMsg = '<p>Email or ID not found, contact administrator.</p>';

					$query = "INSERT INTO `user_log` (`userID`, `IP`, `type`, `info`, `date_created`) ".
								"VALUES ('0', '$IP', '3', '$name', CURRENT_TIMESTAMP);";
					$mysqli->query($query) or die($mysqli->error.__LINE__);
				}
     } else {
        $errorMsg = '<p>Username not found.</p>';

				$query = "INSERT INTO `user_log` (`userID`, `IP`, `type`, `info`, `date_created`) ".
							"VALUES ('0', '$IP', '4', '$name', CURRENT_TIMESTAMP);";
				$mysqli->query($query) or die($mysqli->error.__LINE__);
     }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
		<?php include "base/header.php"; ?>
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1><?php echo $MSG_AFMheader; ?></h1>
				</div>
      </header>
      <main>
	      <div class="container">
					<?php if (strlen($errorMsg)>0) { echo '<div class="error">'.$errorMsg.'</div>'; } ?>
					<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method = "post">
						Username: <br>
							<input type="text" name="username"><br>
						Password: <br>
							<input type="password" name="pwd"><br>
						<input type="submit" value="Login" class="submitButton">
					</form>
	    	</div>
    	</main>

		
	</div>
</body>
</html>
