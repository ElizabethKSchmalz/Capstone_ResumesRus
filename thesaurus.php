<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Thesaurus</title>
  <link rel="stylesheet" href="css/style.css">
</head>
  <body class="thBody">
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
    <h1 id="thH1">Online Thesaurus</h1>
    <input type="text" id="wordInput" placeholder="Enter your word">
    <button id="searchButton">Find Synonyms</button>    
    <div id="results"></div>
    <script src="thesaurusScript.js"></script>
  </div>
</body>
</html>
