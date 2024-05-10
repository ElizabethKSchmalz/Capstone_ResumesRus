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
            <a href="signup.php">Sign Up</a> 
            <?php }?>
      </div>
    </div>

    <div class="mainContent">

      <div id="tipsList">
        <h2>Tips to Make a Good Resume</h2>
        <h3>-Be Concise. Limit the resume to one or two pages. Focus on the most important information that is relevant to the job you are applying for.</h3>
        <h3>-Highlight your key skills. Make sure to showcase all skills relevant to the job.</h3>
        <h3>-Carefully proofread. Make sure your resume is free of spelling and grammatical errors.</h3>
        <h3>-Research the company. Tweak your resume and cover letter to align with the company's culture and values.</h3>
        <h3>-Be Honest. Employers will easily detect inconsistencies.</h3>
        <h3>-Seek feedback. Don't hesitate to get feedback from mentors or professionals.</h3>
      </div>

    </div>

  </div>

</body>
</html>
