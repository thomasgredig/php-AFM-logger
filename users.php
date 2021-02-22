<?php
	include "base/database.php";

	// Load all the Tips
	$query= "SELECT user.firstName as fName, user.lastName as lName, advisor.lastName as advisor, date_created as dt FROM user JOIN advisor ON user.groupID=advisor.ID ORDER BY date_created DESC";
	$SQLtip = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>AFM User List</title>
		<?php include "base/header.php"; ?>
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>AFM User List</h1>
				</div>
      </header>

      <main>
      <div class="container">

				<table>
					<tr><th>User Name <th>Advisor <th> Date  </tr>
					<?php
						while ($row = $SQLtip->fetch_assoc()) {
							echo "<tr><td>";
							echo $row['fName']." ".$row['lName']."&nbsp;  </td><td>";
							echo $row['advisor']." </td><td>";
							echo $row['dt']." </td></tr>";
						}
					?>
				</table>
		  </div>

	    </main>
			<?php include "base/footer.php"; ?>

		</div>
	</body>
</html>
