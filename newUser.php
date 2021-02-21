<?php
	include "base/db.php";
  $errorMsg = '';

	// load all advisors:
	$query = "SELECT * FROM advisor";
	$SQLadvisor = $mysqli->query($query) or die($mysqli->error.__LINE__);

  if (isset($_POST['username']) && isset($_POST['email']) && !empty($_POST['pwd'])) {
		$pwd = $_POST['pwd'];
		if (strlen($pwd)<=5) {
			$errorMsg = "<p>Password is too short.</p>";
			next;
		}
		// make query to add user
		$pwd =  password_hash($pwd, PASSWORD_BCRYPT);
		$username	= $_POST['username'];
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $errorMsg = "<p>Invalid email format.</p>";
			next;
		}
		// username, password, email all good, save in DB
		$query = "INSERT INTO `user` (`userID`, `name`, `pwd`, `email`, `date_created`)" .
			" VALUES (NULL, '". $username ."', '" . $pwd . "', '". $email . "', CURRENT_TIMESTAMP);";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		header('Refresh: 0; URL = login.php');
	} else {
	  $errorMsg = '<p>Insufficient arguments.</p>';
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Add New User</title>
		<?php include "base/header.php"; ?>
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>Add New User</h1>
				</div>
      </header>
      <main>
	      <div class="container">
					<?php if (strlen($errorMsg)>0) { echo '<div class="error">'.$errorMsg.'</div>'; } ?>
					<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method = "post">
						<table><tr><td>
						New Username: <br>
							<input type="text" name="username"><br>
						Email Address: <br>
						  <input type="text" name="email"><br>
						New Password: <br>
							<input type="password" name="pwd"><br>
						</td><td> &nbsp; </td><td>
							First Name: <br>
								<input type="text" name="firstName"><br>
							Last Name: <br>
								<input type="text" name="lastName"><br>
							Group: <br>
							<select name='advisorID'>
								<?php
									while ($row = $SQLadvisor->fetch_assoc()) {
								  	echo "<option value='" . $row['ID'] . "'>" . $row['lastName'] . "</option>\n";
									}
								?>
							</select>
						</td></tr>
					</table>
						<input type="submit" value="Add User" class="submitButton">
					</form>
	    	</div>

    	</main>

		<?php include "base/footer.php"; ?>
	</div>
</body>
</html>
