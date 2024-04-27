<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Resumes R Us</title>
</head>
<body>

  <div class="wrapper">

  <div class="sidebar">
      <a href="index.php"><h1>Resumes R Us</h1></a>
      <br>
      <br>
      <br>
      <a href="resume.php">New Resume</a>
      <br>
      <br>
      <a href="templates.php">Templates</a>
      <br>
      <br>
      <a href="coverLetter.php">Cover Letter</a>
      <br>
      <br>
      <a href="#">Thesaurus</a>
      <br>
      <br>
      <a href="tips.php">Tips</a>
      <br>
      <br>
      <a href="ideas.php">Job Ideas</a>
      <br>
      <br>
      <a href="#">Ideas for artful jobs</a>
      <br>
      <br>
      <a href="#">Make a Change</a>

      <div>
        <?php
          session_start(); 

          if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
              // User is logged in
              ?>
              <a href="logout.php">Logout</a> 
              <?php
          } else {
              // User is not logged in 
              ?>
              <a href="login.php">Login&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;</a>
              <a href="signup.php">Sign Up</a>
              <?php
          }
        ?>
      </div>
    </div>

    <div class="mainContent">

      <h1>TEMPLATES</h1>
      <!-- INSERT TEMPLATE CODE HERE -->

    </div>

  </div>

</body>
</html>