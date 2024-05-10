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
      
      <h1>RESUME BUILDER</h1>
      <br>
      <br>
      <br>
      <p>
      <?php
      if(isset($_POST['submit']) || isset($_POST['download'])){
        //Get datd from from
        $submitted = true;
        $name = sanitizeString(INPUT_POST,"name");
        $address = sanitizeString(INPUT_POST,"address");
        $email = sanitizeString(INPUT_POST,"email");
        $phoneN = sanitizeString(INPUT_POST,"phoneN");
        $job = sanitizeString(INPUT_POST,"job");
        $school = sanitizeString(INPUT_POST, "school");
        $degree = sanitizeString(INPUT_POST, "degree");
        $yearD = sanitizeString(INPUT_POST, "yearD");
        $skills = sanitizeString(INPUT_POST, "skills");
        $cName = sanitizeString(INPUT_POST,"cName");
        $cAddress = sanitizeString(INPUT_POST, "cAddress");
        $date = sanitizeString(INPUT_POST,"date");
        $jobDes = sanitizeString(INPUT_POST,"jobDes");
?>

<?php
        /*echo "Name: " . $name . "<br>";
        echo "Address: " . $address . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Phone Number: " . $phoneN . "<br>";
        echo "School: " . $school . "<br>";
        echo "Degree: " . $degree . "<br>";
        echo "Year of degree: " . $yearD . "<br>";
        echo "Special Skills: " . $skills . "<br>";
        echo "Job: " . $job . "<br>";
        echo "Company Name: " . $cName . "<br>";
        echo "Company Address: " . $cAddress .  "<br>";
        echo "Date: " . $date . "<br>";
        echo "Job Descrpiton: " . $jobDes . "<br>";
       */
      }
      ?>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div id="resume">
<?php
      if(isset($submit)){
        if(strlen($letterContent) > 5000){
          $letterContent = substr($letterContent, 0, 5000);
        }
      }
      // Display Resume
            echo "
            <div class=\"info\" id=\"topInfo\">
              <p>$name</p>
              <p>$address</p>
              <p>$email</p>
              <p>$phoneN</p><br>
            </div>
            <br>
            <div>
            <h3>Education</h3>
              <p>$school</p>
              <p>$degree</p>
              <p>$yearD</p>
            </div>
            <br>
            <div>
            <h3>Skills</h3>
              <p>$skills</p>
            </div>
            <br>
            <div>
            <h3>Jobs:</h3>
            <p>$job</p>
            <p>$cName</p>
            <p>$cAddress</p>
            <p>$date</p>
            </div>
            <br>
            <br>
            <p id=\"date\">$date</p><br>
            <br>
            <p id=\"mainLetter\">$jobDes</p><br>
           
            
      ?>
            </div>
    </div>

    </form>
  </div>

</body>
</html>