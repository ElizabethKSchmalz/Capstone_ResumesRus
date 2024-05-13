<?php
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Resumes R Us</title>
</head>
<body>

  <?php
    require "dbConnect.php";
  ?>

  <div class="wrapper">

    <div class="sidebar">
      <a href="index.php" id="logoFont"><h1>Resumes R Us</h1></a>
      <br>
      <br>
      <br>
      <a href="templates.php">New Resume</a>
      <br>
      <br>
      <a href="coverLetter.php">Cover Letter</a>
      <br>
      <br>
      <a href="thesaurus.php">Thesaurus</a>
      <br>
      <br>
      <a href="tips.php">Tips</a>
      <div>
        <?php 
          if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
            // User is logged in
            ?>
            <a href="logout.php">Logout</a> 
            <?php
          } else {
            // User is not logged in 
            ?>
            <a href="login.php">Login | </a>
            <a href="signUp.php">Sign Up</a> 
            <?php }?>
      </div>
    </div>

    <div class="mainContent">
      <h1>Welcome to Resumes R Us!</h1>
      <p>Are you ready to create a standout resume that gets noticed by employers? 
        Look no further! <span id="logoFont">Resumes R Us</span> is your one-stop destination for crafting professional 
        resumes that highlight your skills and experience.</p>
      <p>With our easy to use resume builder, built-in thesaurus for choosing the perfect words, 
        and tips on resume writing, you'll have everything you need to land your dream job.</p>
      <p>Get started today and take the first step towards a successful career!</p>

      <a href="templates.php"><button id="resumeButton"><p>Make my Resume!</p></button></a>

    </div>

  </div>

</body>
</html>