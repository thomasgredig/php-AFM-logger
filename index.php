<?php
	include "base/database.php";
	// load all AFM modes:
	$query = "SELECT * FROM AFMmode";
	$SQLmode = $mysqli->query($query) or die($mysqli->error.__LINE__);

	// save the sample, if needed
	if (isset($_POST['samplename'])) {
		$sampleName = $_POST['samplename'];
		$tip = $_POST['tip'];
		if (isset($_POST['newTip'])) $newTip = 1; else $newTip = 0;
		$modeID = $_POST['modeID'];
		$description = $_POST['description'];

		$query= "INSERT INTO `sample` (`ID`, `name`, `tip`, `newTip`, `modeID`, `userID`, `machineID`, `description`, `date_created`) " .
		"VALUES (NULL, '" . $sampleName . "', '" . $tip . "', '" . $newTip . "', '" . $modeID.
		"', '" . getUserID() . "', '1', '". $description . "', CURRENT_TIMESTAMP);";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		if ($result) $errorMsg = "<p>Sample added.</p>";
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>AFM Logger</title>
		<?php include "base/header.php"; ?>
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>AFM Logger</h1>
				</div>
      </header>

      <main>
      <div class="container">

				<?php if (strlen($errorMsg)>0) { echo '<div class="error">'.$errorMsg.'</div>'; } ?>

				<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method = "post">

					Sample Name: <br>
						<input type="text" name="samplename"><br>

					Mode: <br>
					<select name='modeID'>
						<?php
							while ($row = $SQLmode->fetch_assoc()) {
								echo "<option value='" . $row['ID'] . "'>" . $row['longName'] . "</option>\n";
							}
						?>
					</select> <br>

					Tip: <br>
						<input type="text" name="tip">
						<input type="checkbox" name="newTip"> brand new Tip
						<br>

					Description: <br>
						<textarea id="description" name="description" rows="8" cols="50"></textarea><br>

					<input type="submit" value="Add Sample" class="submitButton">
				</form>

		  </div>

	    </main>
			<?php include "base/footer.php"; ?>

		</div>
	</body>
</html>
