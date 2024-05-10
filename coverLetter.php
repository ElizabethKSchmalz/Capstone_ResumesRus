<?php 
session_start();
// Bring in the sanitization method
require "sanitize.php"; 

// Declare variables for the cover letter and assign them to an empty string
$name = $address = $email = $pNumber = $date = $managerName = $cName = $cAddress = $letterContent = "";

//Check if download or submit is pressed
if (isset($_POST['submit']) || isset($_POST['download'])) {
  
  $submitted = true;
  //Assign variables to sanitized form values
  $name = sanitizeString(INPUT_POST, "name");
  $address = sanitizeString(INPUT_POST, "address");
  $email = sanitizeString(INPUT_POST, "email");
  $pNumber = sanitizeString(INPUT_POST, "pNumber");
  $date = sanitizeString(INPUT_POST, "date");
  $managerName = sanitizeString(INPUT_POST, "managerName");
  $cName = sanitizeString(INPUT_POST, "cName");
  $cAddress = sanitizeString(INPUT_POST, "cAddress");
  $letterContent = sanitizeString(INPUT_POST, "letterContent");
}

// Bring in pdf code if download was pressed
if(isset($_POST['download'])) {
    require('generate_pdf.php');
    exit();
}
?>
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

      <div id="letterForm">
        <h2>Cover Letter</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          <label for="name">Name:</label>
          <input type="text" name="name" id="name" value="<?php echo $name; ?>">
          <br>

          <label for="address">Address:</label>
          <input type="text" name="address" id="address" value="<?php echo $address; ?>">
          <br>

          <label for="email">Email:</label>
          <input type="text" name="email" id="email" value="<?php echo $email; ?>">
          <br>

          <label for="pNumber">Phone Number:</label>
          <input type="text" name="pNumber" id="pNumber" value="<?php echo $pNumber; ?>">
          <br>

          <label for="date">Date:</label>
          <input type="text" name="date" id="date" value="<?php echo $date; ?>">
          <br>

          <label for="managerName">Hiring Manager Name:</label>
          <input type="text" name="managerName" id="managerName" value="<?php echo $managerName; ?>">
          <br>

          <label for="cName">Company Name:</label>
          <input type="text" name="cName" id="cName" value="<?php echo $cName; ?>">
          <br>

          <label for="cAddress">Company Address:</label>
          <input type="text" name="cAddress" id="cAddress" value="<?php echo $cAddress; ?>">
          <br>

          <label for="letterContent">Letter Content (2,000 Character Limit):</label>
          <textarea name="letterContent" id="letterContent" rows="10" cols="41"><?php echo $letterContent; ?></textarea>
          <br><br>

          <input type="submit" name="submit" value="&nbsp;Update Cover Letter&nbsp;">
          <input type="submit" name="download" value="&nbsp;Download&nbsp;">
        
        </form>
      </div>

      <div id="coverLetter">
        <?php

          // Check if form was submitted
          if (isset($submitted)) {
            // Trim main letter content to 2000 characters
            if (strlen($letterContent) > 2000) {
                $letterContent = substr($letterContent, 0, 2000);
            }

            // Display cover letter preview
            echo "
            <div class=\"info\" id=\"topInfo\">
              <p>$name</p>
              <p>$address</p>
              <p>$email</p>
              <p>$pNumber</p><br>
            </div>
            <br>
            <div class=\"info\">
              <p>$managerName</p>
              <p>$cName</p>
              <p>$cAddress</p><br>
            </div>
            <br>
            <p id=\"letterDate\">$date</p><br>
            <br>
            <p class=\"toFrom\">Dear $managerName,</p><br>
            <p id=\"mainLetter\">$letterContent</p><br>
            <p class=\"toFrom\">Sincerely,<br>$name</p>
            ";
          }
        ?>

      </div>

    </div>

  </div>

</body>
</html>