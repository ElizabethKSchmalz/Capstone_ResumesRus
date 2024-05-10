<?php
session_start(); // Start or resume a session
require 'sanitize.php';
require 'dbConnect.php';
require 'callQuery.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$signupSubmit = sanitizeString(INPUT_POST, 'signupSubmit');

if (isset($_POST['signupSubmit'])) {

    $password = sanitizeString(INPUT_POST,'password');
    $confirmPassword = sanitizeString(INPUT_POST, 'confirmPassword');
    $firstName = sanitizeString(INPUT_POST, 'firstName');
    $lastName = sanitizeString(INPUT_POST, 'lastName');
    $email = sanitizeString(INPUT_POST, 'email');


    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        $errorMessages[] = "Please fill in all required fields.";
    }

    if ($password !== $confirmPassword) {
        $errorMessages[] = "Passwords do not match.";
    }

    if (empty($errorMessages)) {
        try {
            $pdo->beginTransaction(); 

            // Check for existing email 
            $query = "SELECT email FROM users WHERE email = ?";
            $stmt = $pdo->prepare($query); 
            $stmt->execute([$email]); 

            if ($stmt->rowCount() > 0) {
                throw new Exception("An account with this email already exists.");
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
            echo $hashedPassword;

            // Insert User
            $query = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$firstName, $lastName, $email, $hashedPassword]);

            // Commit changes
            $pdo->commit();

            $_SESSION['authenticated'] = true; 
            header("Location: login.php"); 
            exit; 

        } catch (PDOException $ex) {
            $pdo->rollBack();
            error_log("Database Error: " . $ex->getMessage()); 
            echo "Error creating account. Please try again."; 

        } catch (Exception $ex) {
            // Handle general exceptions 
            $pdo->rollBack();
            echo $ex->getMessage();
        }
    } else {
       echo $errorMessages;
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ResumesRUs Signup Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="index.php"><h1 id="topLeftHeader">Resumes R Us</h1></a>
    <h2>Create your <span id="logoFont">Resumes R Us</span> account!</h2>

    <form action="" method="post"> <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" required><br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword" id="confirmPassword" required><br><br>

        <input type="submit" name="signupSubmit" value="Sign Up">
    </form>
</body>
</html>
