<?php
	include "base/database.php";

	// Load all the Tips
	$query= "SELECT tip, user.firstName as fName, user.lastName as lName, advisor.lastName as advisor, sample.date_created as dt FROM sample JOIN user ON sample.userID=user.userID JOIN advisor ON user.groupID=advisor.ID ORDER BY sample.date_created DESC";
	$SQLtip = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>AFM Tips</title>
		<?php include "base/header.php"; ?>
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>AFM Tips</h1>
				</div>
      </header>

      <main>
      <div class="container">
				<h2>Last Used Tips</h2>
				<table>
					<tr><th>Tip <th>User <th> Advisor <th> Date </tr>
					<?php
						while ($row = $SQLtip->fetch_assoc()) {
							echo "<tr><td>";
							echo $row['tip']."&nbsp; </td><td>";
							echo $row['fName']." ".$row['lName']."&nbsp;  </td><td>";
							echo $row['advisor']." Group &nbsp;  </td><td>";
							echo $row['dt']."&nbsp;  </td></tr>";
						}
					?>
				</table>
		  </div>

	    </main>
			<?php include "base/footer.php"; ?>

		</div>
	</body>
</html>
