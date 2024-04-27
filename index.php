<?php session_start(); ?>
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
      <div>
        <h1>Welcome to <div id="logoFont">Resumes R Us!</div></h1>
        <h3>Top ten ways to get the job</h3>
        <ol>
          <li>Dress like a bunny</li>
          <li>Use dance moves to impress them</li>
          <li>Eat a mummy</li>
          <li>Wear shoes four sizes to big</li>
        </ol>
        <p>*Other fun information*</p>
      </div>
      <div>
        <h3>How to get a SugarMama and other ways to fill in the job gap.</h3>
        <p>Go where they go to wine and chocolate shops, start conversations. Once conversations happen try to make a friendship</p>
      </div>
      <div>
        <h3>Advice Column</h3>
        <p>How to tell your boss they are a whale</p>
        <p>~~~~~~~~~~~~~~</p>
        <p>~~~~~~~~~~~~~~</p>
        <p>~~~~~~~~~~~~~~</p>
        <p>~~~~~~~~~~~~~~</p>
        <p>~~~~~~~~~~~~~~</p>
        <p>~~~~~~~~~~~~~~</p>
        <p>~~~~~~~~~~~~~~</p>
      </div>

    </div>

    <footer>
      <h2>*Ads for how to be your best self*</h2>
    </footer>

  </div>

</body>
</html>
