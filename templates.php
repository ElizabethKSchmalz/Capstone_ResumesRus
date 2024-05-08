<?php 
// Bring in the sanitization method
require "sanitize.php"; 

// Declare variables for the cover letter and assign them to an empty string
$name = $address = $email = $pNumber = $date = $managerName = $cName = $cAddress = "";


function sanitizeValue($value) {
  return htmlspecialchars(strip_tags($value));
}


if (isset($_POST['submit']) || isset($_POST['download'])) {
  
  $submitted = true;
  //Assign variables to sanitized form values
  $name = sanitizeString(INPUT_POST, "name");
  $address = sanitizeString(INPUT_POST, "address");
  $email = sanitizeString(INPUT_POST, "email");
  $pNumber = sanitizeString(INPUT_POST, "pNumber");
  $startDate1 = sanitizeString(INPUT_POST, "startDate1");
  $endDate1 = sanitizeString(INPUT_POST, "endDate1");
  $cName1 = sanitizeString(INPUT_POST, "cName1");
  $cAddress1 = sanitizeString(INPUT_POST, "cAddress1");
  $schoolName = sanitizeString(INPUT_POST, "schoolName");
  $degree = sanitizeString(INPUT_POST, "degree");
  $fieldOfStudy = sanitizeString(INPUT_POST, "fieldOfStudy");
  $eduStartDate = sanitizeString(INPUT_POST, "eduStartDate");
  $eduEndDate = sanitizeString(INPUT_POST, "eduEndDate");

  $cNames = array_map('sanitizeValue', $_POST['cName']);
  $cAddresses = array_map('sanitizeValue', $_POST['cAddress']);
  $startDates = array_map('sanitizeValue', $_POST['startDate']);
  $endDates = array_map('sanitizeValue', $_POST['endDate']);
  $jobTitles = array_map('sanitizeValue', $_POST['jobTitle']);
  $letterContent = isset($_POST['letterContent']) && is_array($_POST['letterContent']) 
    ? array_map('sanitizeValue', $_POST['letterContent']) 
    : array();

  //Check if download or submit is pressed
}

// Bring in pdf code if download was pressed
if(isset($_POST['download'])) {
    require('pdfForResume.php');
    exit();
}
?>
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

      <div id="letterForm">
        <h2>Resume</h2>

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

          <label for="schoolName">School Name:</label>
          <input type="text" name="schoolName" value="<?php echo $schoolName; ?>">
          <br>

          <label for="degree">Degree Type:</label>
          <input type="text" name="degree" id="degree" value="<?php echo $degree; ?>">
          <br>

          <label for="fieldOfStudy">Field of Study:</label>
          <input type="text" name="fieldOfStudy" id="fieldOfStudy" value="<?php echo $fieldOfStudy; ?>">
          <br>

          <label for="eduStartDate">Start Date:</label>
          <input type="text" name="eduStartDate" id="eduStartDate" value="<?php echo $eduStartDate; ?>">
          <br>

          <label for="eduEndDate">End Date:</label>
          <input type="text" name="eduEndDate" id="eduEndDate" value="<?php echo $eduEndDate; ?>">
          <br>

          <div id="workExperience">
              <div class="job">

              <label for="jobTitle[]">Job Title:</label>
              <input type="text" name="jobTitle[]" id="jobTitle1" value="<?php echo isset($jobTitle[0]) ? $jobTitle[0] : ''; ?>">
              <br>

              <label for="cName[]">Company Name:</label>
              <input type="text" name="cName[]" id="cName1" value="<?php echo isset($cName[0]) ? $cName[0] : ''; ?>">
              <br>

              <label for="cAddress[]">Company Address:</label>
              <input type="text" name="cAddress[]" id="cAddress1" value="<?php echo isset($cAddress[0]) ? $cAddress[0] : ''; ?>">
              <br>

              <label for="startDate[]">Start Date:</label>
              <input type="text" name="startDate[]" id="startDate1" value="<?php echo isset($startDate[0]) ? $startDate[0] : ''; ?>">
              <br>

              <label for="endDate[]">End Date:</label>
              <input type="text" name="endDate[]" id="endDate1" value="<?php echo isset($endDate[0]) ? $endDate[0] : ''; ?>">
              <br>

              <label for="jobDescription">Descripton/Responsibilities:</label>
              <textarea name="letterContent[]" id="letterContent1" rows="5" cols="38"><?php echo isset($letterContent[0]) ? $letterContent[0] : ''; ?></textarea>
              <br><br>
              </div>
          </div>

          
          <br>
          <br>


          <input type="submit" name="submit" value="&nbsp;Update Resume&nbsp;">
          <input type="submit" name="download" value="&nbsp;Download&nbsp;">
          <br>
          <br>
          <button type="button" id="addJob">Add another job</button>
        
        </form>
      </div>

      <div id="resume">
        <?php

          // Check if form was submitted
          if (isset($submitted)) {
           
            
            echo "
              <header id=\"topInfo\">
                  <h1>{$name}</h1>
                  <br>
                  <p>{$address}</p>
                  <p>Email: {$email}</p>
                  <p>Phone: {$pNumber}</p>
                  <br>
              </header>
              <hr>
              <section id=\"education\">
                <h2>Education</h2>
                <h3 id=\"schoolName\">{$schoolName}</h3>
                <p><strong>Degree:</strong> {$degree}</p>
                <p><strong>Field of Study:</strong> {$fieldOfStudy}</p>
                <p><strong>Duration:</strong> {$eduStartDate} - {$eduEndDate}</p>
              </section>
              <section id=\"experience\">
                  <h2>Work Experience</h2>
                  ";
                for ($i = 0; $i < count($cNames); $i++) {
                 echo "
                  <p><strong>Job Title:</strong> {$jobTitles[$i]}</p>
                  <p><strong>Company:</strong> {$cNames[$i]}</p>
                  <p><strong>Location:</strong> {$cAddresses[$i]}</p>
                  <p><strong>Duration:</strong> {$startDates[$i]} - {$endDates[$i]}</p>
                  <br>
                  <p><strong>Description of responsibilities or achievements</strong></p>
                  <br>
                  <ul class=\"workDesc\">
                      <li>$letterContent[$i]</li>
                  </ul>
                  <hr>
                  <br>
              ";
                }
                echo "</section>";
            // Display resume preview
            }
            
            ?>

      </div>

    </div>

  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="addJob.js"></script>
</body>
</html>