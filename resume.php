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
    <a href="login.php">Login</a>
    <a href="signup.php">Sign Up</a>
    <?php
}
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

  <div class="wrapper">

    <div class="sidebar">
      <a href="index.php"><img src="Images/Logo.png" alt="Resumes R Us Logo"></a>
      <a href="resume.php">New Resume</a>
      <a href="#">Thesaurus</a>
      <a href="#">Ideas for artful jobs</a>
      <a href="templates.php">Templates</a>
      <a href="#">Job Ideas</a>
    </div>

    <div class="header">
      <a href="#">Login</a>
      <a href="#">Make a Change</a>
      <a href="#">Tips</a>
      <a href="#">Cover Letter</a>
    </div>

    <div class="mainContent">
      
      <h1>RESUME BUILDER</h1>
      <!-- INSERT RESUME BUILDER CODE HERE -->

    </div>


  </div>

</body>
</html>