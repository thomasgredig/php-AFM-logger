<footer>
  <div class="container">
    <hr>
       <?php if (isset($_SESSION["name"])) { echo	"User: <strong>" . $_SESSION["name"] . "</strong>, "; } ?>
       Copyright &copy; 2021, Dr. T. Gredig,
       <a href="index.php" class="footerbtn">Home</a>
       <a href="tips.php" class="footerbtn">Tips</a>
       <a href="samples.php" class="footerbtn">Samples</a>
       <a href="users.php" class="footerbtn">Users</a>
       <a href="logout.php" class="footerbtn">Logout</a>

       <?php if (isAdmin()) {
          echo '<a href="newUser.php" class="footerbtn">New User</a>';
          echo 'DB: <strong>'.$db_host."</strong>";
        } ?>
  </div>
</footer>
