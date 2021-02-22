<?php
	include "base/database.php";

	// Load all the Tips
	$query= "SELECT sample.name as sampleName, tip, description, user.firstName as fName, user.lastName as lName, sample.date_created as dt FROM sample JOIN user ON sample.userID=user.userID ORDER BY sample.date_created DESC";
	$SQLtip = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>AFM Sample List</title>
		<?php include "base/header.php"; ?>
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>AFM Sample List</h1>
				</div>
      </header>

      <main>
      <div class="container">

				<table>
					<tr><th>Sample Name <th>Tip <th> User <th> Description <th> Date </tr>
					<?php
						while ($row = $SQLtip->fetch_assoc()) {
							echo "<tr><td>";
							echo $row['sampleName']."&nbsp; </td><td>";
							echo $row['tip']." &nbsp;  </td><td>";
							echo $row['fName']." ".$row['lName']."&nbsp;  </td><td>";
							echo $row['description']." </td><td>";
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
