<?php

//Variables
$name = $address = $email = $phoneN = $school = $degree = $yearD = $skills = $date = $job = $cName = $date = $jobDes = "";

if (isset($_POST['submit']) || isset($_POST['download'])) {
  
  $submitted = true;
  //Assign variables to sanitized form values
  $name = sanitizeString(INPUT_POST, "name");
  $address = sanitizeString(INPUT_POST, "address");
  $email = sanitizeString(INPUT_POST, "email");
  $phoneN = sanitizeString(INPUT_POST, "phoneN");
  $school = sanitizeString(INPUT_POST, "school");
  $degree = sanitizeString(INPUT_POST, "degree");
  $yearD = sanitizeString(INPUT_POST, "yearD");
  $skills = sanitizeString(INPUT_POST, "skills");
  $job = sanitizeString(INPUT_POST, "job");
  $cName = sanitizeString(INPUT_POST, "cName");
  $cAddress = sanitizeString(INPUT_POST, "cAddress");
  $date = sanitizeString(INPUT_POST, "date");
  $jobDes = sanitizeString(INPUT_POST, "jobDes");
}
if(isset($_POST['download'])) {
  require('pdfForResume.php');
  exit();
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
      <a href="index.php"><img src="Images/Logo_1.png" alt="Resumes R Us Logo"></a>
      <br>
      <br>
      <br>
      <a href="resume.php">New Resume</a>
      <br>
      <br>
      <a href="#">Thesaurus</a>
      <br>
      <br>
      <a href="templates.php">Templates</a>
      <br>
      <br>
      <a href="#">Job Ideas</a>
    </div>

    <div class="header">
      <a href="index.php"><img src="Images/Logo_2.png" alt="Resumes R Us Logo"></a>
      <br>
      <a href="login.php">Login</a>
      <a href="#">Make a Change</a>
      <a href="#">Tips</a>
      <a href="#">Cover Letter</a>
    </div>
    
    <div class="mainContent">
    <div id ="resume">
    <h1>TEMPLATES</h1>
    
  <form action="resume.php" method="post">

      <label for="name">Name:</label>
      <input type="text" name="name" id="name">
      <br>
      <label for="address">Address:</label>
      <input type="text" name="address" id="address">
      <br>
      <label for="email">Email:</label>
      <input type="text" name="email" id="email" >
      <br>
      <label for="phoneN">Phone Number:</label>
      <input type="text" name="phoneN" id="phoneN" >
      <br>
      <label for="school">School:</label>
      <input type="text" name="school" id="school" >
      <br>
      <label for="dergee">Degree:</label>
      <input type="text" name="degree" id="degree" >
      <br>
      <label for="yearD">Year of degree:</label>
      <input type="text" name="yearD" id="yearD" >
      <br>
      <label for="skills">List of Skills:</label>
      <textarea name="skills" id="skills" rows="5" cols="41"></textarea>
      <br>
      <label for="job">Job Title:</label>
      <input type="text" name="job" id="job" >
      <br>
      <label for="cName">Company Name:</label>
      <input type="text" name="cName" id="cName" >
      <br>
      <label for="date">Date:</label>
      <input type="text" name="date" id="date" >
      <br>
      <label for="jobDes">Job Descrpiton:</label>
      <textarea name="jobDes" id="jobDes" rows="10" cols="41"></textarea>
      <br>
      <label for="job">Job Title:</label>
      <input type="text" name="job" id="job" >
      <br>
      <label for="cName">Company Name:</label>
      <input type="text" name="cName" id="cName" >
      <br>
      <label for="date">Date:</label>
      <input type="text" name="date" id="date">
      <br>
      <label for="jobDes">Job Descrpiton:</label>
      <textarea name="jobDes" id="jobDes" rows="10" cols="41"></textarea>
      <br>
      <label for="job">Job Title:</label>
      <input type="text" name="job" id="job" ">
      <br>
      <label for="cName">Company Name:</label>
      <input type="text" name="cName" id="cName" >
      <br>
      <label for="date">Date:</label>
      <input type="text" name="date" id="date">
      <br>
      <label for="jobDes">Job Descrpiton:</label>
      <textarea name="jobDes" id="jobDes" rows="10" cols="41"></textarea>
      <br>
      <br>
      <input type="submit" name="submit" value="Add To Resume">
    </form>
</div>
<div id="resume">
  <?php
          // Check if form was submitted
          if (isset($submitted)) {
            // Trim main letter content to 2000 characters
            if (strlen($jobDes) > 2000) {
              $jobDes = substr($jobDes, 0, 2000);
          }
          
            // Display cover letter preview
           /* echo "
            <div class=\"info\" id=\"topInfo\">
              <p>$name</p>
              <p>$address</p>
              <p>$email</p>
              <p>$phoneN</p><br>
            </div>
            <br>
            <div class=\"info\">
              <p>$job</p>
              <p>$cName</p>
              <p>$date</p><br>
              <p>$jobdes</p>
            </div>
            <br>
            <p id=\"letterDate\">$date</p><br>
            <br>
            <p class=\"toFrom\">Dear $managerName,</p><br>
            <p id=\"mainLetter\">$letterContent</p><br>
            <p class=\"toFrom\">Sincerely,<br>$name</p>
            ";*/
          }
        ?>

      </div>
</div>
      <ol>
        <br>
        <li><a href="TemplateOne.php">Bussiness CV</a></li>
        <br>
        <li><a href="TemplateTwo.php">Creative CV</a></li>
        <br>
        <li><a href="TemplateThree.php">Artist CV</a></li>
      </ol>
      </div>
    </div>

  </div>

</body>
</html>